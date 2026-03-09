<?php
/**
 * AARRS Init (v1)
 *
 * No-brainer initializer for AI onboarding in legacy/LAMP repositories.
 * - Default is APPLY (writes files, non-destructive)
 * - Supports --dry-run
 * - Creates docs/ai/ automatically
 * - Generates:
 *   - docs/ai/README.md (+ optional README-EN.md)
 *   - docs/ai/repo_context.md (+ optional repo_context-EN.md)
 *   - docs/ai/inventory.md + docs/ai/inventory.json
 *   - docs/ai/next-steps.md
 *
 * Principles:
 * - Facts vs assumptions
 * - Marker-based updates only (non-destructive)
 * - Framework-open via profiles (generic-lamp default)
 */

declare(strict_types=1);

const AARRS_TOOL_VERSION = '0.1.0';
const AARRS_SPEC_VERSION = 'v1';

const MARKER_INVENTORY_START = '<!-- AARRS:inventory:start -->';
const MARKER_INVENTORY_END   = '<!-- AARRS:inventory:end -->';

const MARKER_NEXT_STEPS_START = '<!-- AARRS:next-steps:start -->';
const MARKER_NEXT_STEPS_END   = '<!-- AARRS:next-steps:end -->';

final class Cli
{
    /** @return array{options: array<string, mixed>, args: string[]} */
    public static function parse(array $argv): array
    {
        array_shift($argv);

        $options = [
            'mode' => 'apply', // apply|dry-run
            'profile' => 'generic-lamp',
            'lang' => 'de', // de|en
            'bilingual' => false,
            'output_dir' => 'docs/ai',
            'write_inventory_md' => true,
            'write_inventory_json' => true,
            'force' => false,
        ];

        $args = [];
        foreach ($argv as $a) {
            if ($a === '--dry-run') $options['mode'] = 'dry-run';
            elseif ($a === '--apply') $options['mode'] = 'apply';
            elseif (str_starts_with($a, '--profile=')) $options['profile'] = substr($a, strlen('--profile='));
            elseif ($a === '--bilingual') $options['bilingual'] = true;
            elseif (str_starts_with($a, '--lang=')) $options['lang'] = substr($a, strlen('--lang='));
            elseif (str_starts_with($a, '--output-dir=')) $options['output_dir'] = rtrim(substr($a, strlen('--output-dir=')), '/');
            elseif ($a === '--force') $options['force'] = true;
            elseif ($a === '-h' || $a === '--help') {
                self::printHelp();
                exit(0);
            } else {
                $args[] = $a;
            }
        }

        return ['options' => $options, 'args' => $args];
    }

    public static function printHelp(): void
    {
        $help = <<<TXT
AARRS Init (v1) — no-brainer AI onboarding initializer

Usage:
  php tools/aarrs-init.php [options]

Defaults:
  --apply (writes files; non-destructive)
  --profile=generic-lamp
  --lang=de
  --output-dir=docs/ai

Options:
  --dry-run             Show what would be written (no changes)
  --apply               Write/update files (default)
  --profile=<name>      generic-lamp|wordpress|magento|shopware|joomla
  --lang=en             Generate EN files where applicable
  --bilingual           Generate DE + EN files where applicable
  --output-dir=<path>   Default: docs/ai
  --force               Proceed even if repository markers are weak

Notes:
  - Non-destructive: updates only inside AARRS marker blocks.
  - Inventory is best-effort. Verify assumptions before acting.

TXT;
        fwrite(STDOUT, $help);
    }
}

final class Fs
{
    public static function isFile(string $path): bool { return is_file($path); }
    public static function isDir(string $path): bool { return is_dir($path); }

    public static function ensureDir(string $dir, bool $dryRun, array &$report): void
    {
        if (self::isDir($dir)) return;
        $report[] = ['action' => 'mkdir', 'path' => $dir];
        if ($dryRun) return;
        mkdir($dir, 0777, true);
    }

    public static function read(string $path): ?string
    {
        if (!self::isFile($path)) return null;
        return file_get_contents($path);
    }

    public static function write(string $path, string $content, bool $dryRun, array &$report): void
    {
        $exists = self::isFile($path);
        $report[] = ['action' => $exists ? 'write:update' : 'write:create', 'path' => $path, 'bytes' => strlen($content)];
        if ($dryRun) return;

        $dir = dirname($path);
        if (!self::isDir($dir)) mkdir($dir, 0777, true);

        file_put_contents($path, $content);
    }
}

final class Markers
{
    public static function upsertBlock(string $content, string $start, string $end, string $blockBody): string
    {
        $block = $start . "\n" . rtrim($blockBody) . "\n" . $end;

        $sPos = strpos($content, $start);
        $ePos = strpos($content, $end);

        if ($sPos !== false && $ePos !== false && $ePos > $sPos) {
            $before = substr($content, 0, $sPos);
            $after = substr($content, $ePos + strlen($end));
            return rtrim($before) . "\n\n" . $block . "\n" . ltrim($after);
        }

        // No marker block yet — append at end with spacing
        return rtrim($content) . "\n\n" . $block . "\n";
    }
}

final class Detect
{
    /** @return array{detected_files: array<int, array{path:string,type:string}>, detected_dirs: array<int, array{path:string,type:string}>, tooling: array<string,mixed>, detections: array<int, array<string,mixed>>, modules: array<int, array<string,mixed>>, notes: array<int, array{level:string,message:string}>} */
    public static function scan(string $root): array
    {
        $detectedFiles = [];
        $detectedDirs = [];
        $detections = [];
        $modules = [];
        $notes = [];

        $presentFile = function(string $p) use (&$detectedFiles): bool {
            if (is_file($p)) {
                $detectedFiles[] = ['path' => $p, 'type' => 'file'];
                return true;
            }
            return false;
        };
        $presentDir = function(string $p) use (&$detectedDirs): bool {
            if (is_dir($p)) {
                $detectedDirs[] = ['path' => $p, 'type' => 'dir'];
                return true;
            }
            return false;
        };

        // Ecosystem basics
        $composer = $presentFile('composer.json');
        $packageJson = $presentFile('package.json');

        $lockfiles = [];
        foreach (['package-lock.json', 'pnpm-lock.yaml', 'yarn.lock'] as $lf) {
            if ($presentFile($lf)) $lockfiles[] = $lf;
        }

        $dockerCompose = $presentFile('docker-compose.yml');
        $dockerfile = $presentFile('Dockerfile');
        $lando = $presentFile('.lando.yml');

        // CI detection
        $ghWorkflows = [];
        if (is_dir('.github/workflows')) {
            $presentDir('.github/workflows');
            $files = glob('.github/workflows/*.yml') ?: [];
            $files = array_merge($files, glob('.github/workflows/*.yaml') ?: []);
            foreach ($files as $wf) {
                if (is_file($wf)) {
                    $ghWorkflows[] = $wf;
                    $detectedFiles[] = ['path' => $wf, 'type' => 'file'];
                }
            }
        }

        // Docs/meta
        foreach (['README.md', 'README-EN.md', 'CONTRIBUTING.md', 'CHANGELOG.md'] as $doc) {
            $presentFile($doc);
        }

        // WordPress detection
        $isWp = false;
        if ($presentDir('wp-content')) {
            $isWp = true;
            $detections[] = [
                'id' => 'wordpress',
                'confidence' => 'high',
                'evidence' => [['path' => 'wp-content', 'reason' => 'directory exists']],
                'assumptions' => []
            ];

            // WP modules
            $modules = array_merge($modules, self::scanWpModules('wp-content/plugins', 'wordpress-plugin'));
            $modules = array_merge($modules, self::scanWpModules('wp-content/mu-plugins', 'wordpress-mu-plugin'));
            $modules = array_merge($modules, self::scanWpModules('wp-content/themes', 'wordpress-theme'));
        }

        // Generic “custom code” hints (best-effort)
        foreach (['app', 'src', 'custom', 'extensions', 'modules', 'plugins'] as $dir) {
            if ($presentDir($dir)) {
                $modules[] = [
                    'kind' => 'custom-code-area',
                    'name' => $dir,
                    'path' => $dir,
                    'evidence' => [['path' => $dir, 'reason' => 'top-level directory exists']]
                ];
            }
        }

        $tooling = [
            'php' => [
                'composer' => ['present' => $composer, 'path' => $composer ? 'composer.json' : null],
                'phpunit' => ['present' => (bool)(glob('phpunit.xml*') ?: []), 'path' => self::firstGlob('phpunit.xml*')],
            ],
            'node' => [
                'package_json' => ['present' => $packageJson, 'path' => $packageJson ? 'package.json' : null],
                'lockfiles' => $lockfiles,
            ],
            'containers' => [
                'docker_compose' => ['present' => $dockerCompose, 'path' => $dockerCompose ? 'docker-compose.yml' : null],
                'dockerfile' => ['present' => $dockerfile, 'path' => $dockerfile ? 'Dockerfile' : null],
                'lando' => ['present' => $lando, 'path' => $lando ? '.lando.yml' : null],
            ],
            'ci' => [
                'github_actions' => ['present' => count($ghWorkflows) > 0, 'workflows' => $ghWorkflows],
            ],
        ];

        $notes[] = ['level' => 'info', 'message' => 'Inventory is best-effort. Verify assumptions before acting.'];
        if ($isWp) {
            $notes[] = ['level' => 'info', 'message' => 'WordPress detected. Plugin/theme inventory was generated from wp-content/.'];
        }

        return [
            'detected_files' => self::uniquePaths($detectedFiles),
            'detected_dirs' => self::uniquePaths($detectedDirs),
            'tooling' => $tooling,
            'detections' => $detections,
            'modules' => self::uniqueModules($modules),
            'notes' => $notes,
        ];
    }

    /** @return array<int, array{kind:string,name:string,path:string,evidence:array<int,array{path:string,reason:string}>}> */
    private static function scanWpModules(string $base, string $kind): array
    {
        $out = [];
        if (!is_dir($base)) return $out;

        $entries = scandir($base);
        if ($entries === false) return $out;

        foreach ($entries as $e) {
            if ($e === '.' || $e === '..') continue;
            $p = $base . '/' . $e;

            if (is_dir($p)) {
                $out[] = [
                    'kind' => $kind,
                    'name' => $e,
                    'path' => $p,
                    'evidence' => [['path' => $p, 'reason' => 'directory exists']]
                ];
            } elseif (is_file($p)) {
                // for mu-plugins single-file plugins
                $out[] = [
                    'kind' => $kind,
                    'name' => $e,
                    'path' => $p,
                    'evidence' => [['path' => $p, 'reason' => 'file exists']]
                ];
            }
        }
        return $out;
    }

    private static function firstGlob(string $pattern): ?string
    {
        $g = glob($pattern) ?: [];
        return count($g) > 0 ? $g[0] : null;
    }

    /** @param array<int, array{path:string,type:string}> $items */
    private static function uniquePaths(array $items): array
    {
        $seen = [];
        $out = [];
        foreach ($items as $it) {
            $k = $it['path'];
            if (isset($seen[$k])) continue;
            $seen[$k] = true;
            $out[] = $it;
        }
        return $out;
    }

    /** @param array<int, array<string,mixed>> $mods */
    private static function uniqueModules(array $mods): array
    {
        $seen = [];
        $out = [];
        foreach ($mods as $m) {
            $k = ($m['kind'] ?? '') . '::' . ($m['path'] ?? '');
            if (isset($seen[$k])) continue;
            $seen[$k] = true;
            $out[] = $m;
        }
        return $out;
    }
}

final class Render
{
    /** @param array<string,mixed> $inventory */
    public static function inventoryJson(array $inventory, array $opts): string
    {
        $payload = [
            'aarrs_version' => AARRS_SPEC_VERSION,
            'generated_at' => gmdate('c'),
            'generator' => [
                'tool' => 'tools/aarrs-init.php',
                'tool_version' => AARRS_TOOL_VERSION,
                'profile' => $opts['profile'],
                'lang' => ($opts['bilingual'] ? 'bilingual' : $opts['lang']),
                'write_mode' => ($opts['mode'] === 'dry-run' ? 'dry-run' : 'apply'),
                'update_mode' => 'markers',
            ],
            'repo' => [
                'root' => '.',
                'detected_files' => $inventory['detected_files'],
                'detected_dirs' => $inventory['detected_dirs'],
            ],
            'detections' => $inventory['detections'],
            'modules' => $inventory['modules'],
            'tooling' => $inventory['tooling'],
            'notes' => $inventory['notes'],
        ];

        return json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
    }

    /** @param array<string,mixed> $inventory */
    public static function inventoryMd(array $inventory): string
    {
        $lines = [];
        $lines[] = '# Inventory (AARRS) — generated';
        $lines[] = '';
        $lines[] = 'This inventory is **best-effort** and intended for humans + LLMs.';
        $lines[] = '';
        $lines[] = '## Detections';
        if (count($inventory['detections']) === 0) {
            $lines[] = '- (none)';
        } else {
            foreach ($inventory['detections'] as $d) {
                $lines[] = '- **' . $d['id'] . '** (confidence: ' . $d['confidence'] . ')';
                foreach ($d['evidence'] as $ev) {
                    $lines[] = '  - evidence: `' . $ev['path'] . '` — ' . $ev['reason'];
                }
                if (isset($d['assumptions']) && count($d['assumptions']) > 0) {
                    foreach ($d['assumptions'] as $a) {
                        $lines[] = '  - Assumption: ' . $a;
                    }
                }
            }
        }

        $lines[] = '';
        $lines[] = '## Modules (best-effort)';
        if (count($inventory['modules']) === 0) {
            $lines[] = '- (none detected)';
        } else {
            foreach ($inventory['modules'] as $m) {
                $lines[] = '- **' . $m['kind'] . '**: `' . $m['path'] . '`';
            }
        }

        $lines[] = '';
        $lines[] = '## Tooling';
        $lines[] = '- PHP composer: ' . ($inventory['tooling']['php']['composer']['present'] ? 'present' : 'not detected');
        $lines[] = '- PHP phpunit: ' . ($inventory['tooling']['php']['phpunit']['present'] ? 'present' : 'not detected');
        $lines[] = '- Node package.json: ' . ($inventory['tooling']['node']['package_json']['present'] ? 'present' : 'not detected');
        $lines[] = '- Containers: ' . self::containersSummary($inventory['tooling']['containers']);
        $lines[] = '- GitHub Actions: ' . ($inventory['tooling']['ci']['github_actions']['present'] ? 'present' : 'not detected');

        if ($inventory['tooling']['ci']['github_actions']['present']) {
            foreach ($inventory['tooling']['ci']['github_actions']['workflows'] as $wf) {
                $lines[] = '  - `' . trim($wf) . '`';
            }
        }

        $lines[] = '';
        $lines[] = '## Notes';
        foreach ($inventory['notes'] as $n) {
            $lines[] = '- [' . $n['level'] . '] ' . $n['message'];
        }

        $lines[] = '';
        return implode("\n", $lines);
    }

    /** @param array<string,mixed> $containers */
    private static function containersSummary(array $containers): string
    {
        $parts = [];
        foreach (['docker_compose' => 'docker-compose', 'dockerfile' => 'Dockerfile', 'lando' => 'lando'] as $k => $label) {
            if (!empty($containers[$k]['present'])) $parts[] = $label;
        }
        return count($parts) ? implode(', ', $parts) : 'not detected';
    }

    /** @param array<string,mixed> $inventory */
    public static function repoContextInventoryBlockMd(array $inventory): string
    {
        $lines = [];
        $lines[] = '## Inventory (generated)';
        $lines[] = '';
        $lines[] = 'This section is generated by `tools/aarrs-init.php`.';
        $lines[] = '';
        $lines[] = '- Inventory files: `docs/ai/inventory.md`, `docs/ai/inventory.json`';
        $lines[] = '- Update policy: marker-based (non-destructive)';
        $lines[] = '';
        $lines[] = '### Modules (paths)';
        if (count($inventory['modules']) === 0) {
            $lines[] = '- (none detected)';
        } else {
            foreach ($inventory['modules'] as $m) {
                $lines[] = '- `' . $m['path'] . '` (' . $m['kind'] . ')';
            }
        }
        $lines[] = '';
        $lines[] = '### Tooling hints';
        $lines[] = '- composer.json: ' . ($inventory['tooling']['php']['composer']['present'] ? '`composer.json`' : '(not detected)');
        $lines[] = '- package.json: ' . ($inventory['tooling']['node']['package_json']['present'] ? '`package.json`' : '(not detected)');
        $lines[] = '- CI (GitHub Actions): ' . ($inventory['tooling']['ci']['github_actions']['present'] ? 'present' : 'not detected');
        $lines[] = '';
        $lines[] = '### Notes';
        foreach ($inventory['notes'] as $n) {
            $lines[] = '- [' . $n['level'] . '] ' . $n['message'];
        }
        $lines[] = '';
        return implode("\n", $lines);
    }

    public static function aiReadmeDe(): string { return Templates::aiReadmeDe(); }
    public static function aiReadmeEn(): string { return Templates::aiReadmeEn(); }

    /** @param array<string,mixed> $inventory */
    public static function nextStepsDe(array $inventory): string
    {
        return self::nextStepsBlockDe($inventory);
    }

    /** @param array<string,mixed> $inventory */
    private static function nextStepsBlockDe(array $inventory): string
    {
        $steps = [];

        $steps[] = [
            'title' => 'Repo Context vervollständigen (Ziele/Nicht‑Ziele + Architektur)',
            'why' => 'Ohne diese Basis muss KI raten, und Onboarding wird langsam.',
            'files' => ['docs/ai/repo_context.md'],
            'scope' => 'docs-only, small diff',
        ];

        $hasComposer = (bool)$inventory['tooling']['php']['composer']['present'];
        $hasTests = (bool)$inventory['tooling']['php']['phpunit']['present'];
        if ($hasComposer && !$hasTests) {
            $steps[] = [
                'title' => 'Minimal-Validierung definieren (mind. 1 Check pro Änderungstyp)',
                'why' => 'Legacy-Optimierungen ohne Validierung sind riskant. Start: “minimum one check”.',
                'files' => ['docs/ai/constraints.md', 'docs/ai/repo_context.md'],
                'scope' => 'docs-only, small diff',
            ];
        } else {
            $steps[] = [
                'title' => 'Validation-Workflow dokumentieren (lokal + CI)',
                'why' => 'Damit Vorschläge reproduzierbar und reviewbar sind.',
                'files' => ['docs/ai/repo_context.md'],
                'scope' => 'docs-only, small diff',
            ];
        }

        if (count($inventory['modules']) > 0) {
            $steps[] = [
                'title' => 'Customizations/Modules markieren (Hotspots + Ownership)',
                'why' => 'LLMs und Junior-Dev Workflows profitieren von klaren Grenzen und Zuständigkeiten.',
                'files' => ['docs/ai/repo_context.md', 'docs/ai/inventory.md'],
                'scope' => 'small diff',
            ];
        }

        $steps[] = [
            'title' => 'Erste Implementer-Task durchführen (1 kleiner PR-Vorschlag)',
            'why' => 'Schnellster Proof: ein reviewbarer Patch im “small diff” Rahmen.',
            'files' => ['docs/ai/prompts/implementer.md'],
            'scope' => '≤3 Dateien, ≤150 LOC',
        ];

        $lines = [];
        $lines[] = '## Recommended next steps (generated)';
        $lines[] = '';
        $lines[] = 'Diese Liste ist best-effort und basiert auf `docs/ai/inventory.*`.';
        $lines[] = '';
        $i = 1;
        foreach ($steps as $s) {
            $lines[] = $i . ') **' . $s['title'] . '**';
            $lines[] = '- Why: ' . $s['why'];
            $lines[] = '- Files: ' . implode(', ', array_map(fn($f) => '`' . $f . '`', $s['files']));
            $lines[] = '- Scope: ' . $s['scope'];
            $lines[] = '';
            $i++;
            if ($i > 7) break;
        }

        return implode("\n", $lines);
    }
}

final class Templates
{
    public static function aiReadmeDe(): string
    {
        return <<<MD
# AI‑Zentrale (AARRS)

Diese Dokumente sind der **Einstiegspunkt** für Menschen und KI‑Assistenten.

## First‑run (10 Minuten) — Kanonische Reihenfolge
Wenn du neu hier bist (Mensch oder KI), nutze diese Reihenfolge:

1. `how-to-use.md` (praktischer Einstieg / Integration)
2. `docs/ai/repo_context.md` (Ziele, Architektur, Konventionen)
3. `docs/ai/constraints.md` (Guardrails + “small diff” Standard)
4. `docs/ai/instruction-priority.md` (falls Anweisungen kollidieren)
5. `docs/ai/legacy-playbook.md` (wenn Legacy/gewachsen)
6. `docs/ai/prompts/` (Rolle wählen, Output-Format beachten)

> Hinweis: **Lesereihenfolge ≠ Konfliktpriorität.**  
> Bei widersprüchlichen Anweisungen gilt `docs/ai/instruction-priority.md`.

## Wenn du KI bist: so arbeitest du hier
1. Lies zuerst `repo_context.md`.
2. Beachte `constraints.md` strikt.
3. Wenn du in Legacy-Code arbeitest: nutze `legacy-playbook.md`.
4. Wähle eine Rolle aus `prompts/`.
5. Liefere Ergebnisse als **Markdown** (klar, kurz, mit Annahmen & offenen Fragen).
6. Bei Unsicherheit: **fragen statt raten**.

## Wenn du Mensch bist: so nutzt du AARRS
- Nutze `docs/ai/*` als wiederverwendbares Bundle.
- Passe `repo_context.md` und `constraints.md` an dein Projekt an.
- Nutze `inventory.*` und `next-steps.md` als Einstieg, um schnell die größten Lücken zu finden.

## English version
See `README-EN.md`.

MD;
    }

    public static function aiReadmeEn(): string
    {
        return <<<MD
# AI Hub (AARRS)

These documents are the **entry point** for humans and AI assistants.

## First run (10 minutes) — Canonical order
If you are new here (human or AI), use this order:

1. `how-to-use.md` (practical entry / integration)
2. `docs/ai/repo_context.md` (goals, architecture, conventions)
3. `docs/ai/constraints.md` (guardrails + “small diff” default)
4. `docs/ai/instruction-priority.md` (if instructions conflict)
5. `docs/ai/legacy-playbook.md` (if legacy/grown)
6. `docs/ai/prompts/` (pick a role, follow the output format)

> Note: **reading order ≠ conflict priority.**  
> If instructions conflict, follow `docs/ai/instruction-priority.md`.

## If you are an AI: how to work here
1. Read `repo_context.md` first.
2. Follow `constraints.md` strictly.
3. If working in legacy code: use `legacy-playbook.md`.
4. Pick a role from `prompts/`.
5. Provide results as **Markdown** (clear, concise, with assumptions & open questions).
6. If unsure: **ask instead of guessing**.

## If you are a human: how to use AARRS
- Treat `docs/ai/*` as a reusable bundle.
- Adapt `repo_context.md` and `constraints.md` to your project.
- Use `inventory.*` and `next-steps.md` to quickly identify the biggest gaps.

MD;
    }

    public static function repoContextTemplateDe(): string
    {
        return <<<MD
# Repo Context (AARRS) — DE (canonical)

> Dieses Dokument ist der wichtigste Kontext für Menschen und KI.
> Schreibe lieber kurze, klare Sätze als lange Texte.

## Ziele (Goals)
- TODO: Was ist das Ziel dieses Repos?

## Nicht‑Ziele (Non-goals)
- TODO: Was ist explizit nicht Ziel?

## Architektur / Module Map
- TODO: Wie ist das Repo grob strukturiert (Ordner, Module, Extensions)?
- TODO: Wo ist “custom code” vs. vendor/framework?

## Lokales Setup (Local dev)
- TODO: Wie startet man das Projekt lokal?
- TODO: Docker/Lando? PHP/Composer? Node? Datenbank?

## Validierung (Testing / Validation)
- TODO: Was ist das Minimum, um Änderungen zu validieren?
  - docs change:
  - code change:
  - config change:

## Deployment / Release (optional)
- TODO: Wie wird deployed? Gibt es Releases?

## Ownership / Escalation
- TODO: Wen fragt man bei Unklarheiten (Module owner)?
- TODO: Wann braucht es “human go”?

<!-- AARRS:inventory:start -->
<!-- AARRS:inventory:end -->

MD;
    }

    public static function repoContextTemplateEn(): string
    {
        return <<<MD
# Repo Context (AARRS) — EN (synced)

> This document is the most important context for humans and AI.
> Prefer short, clear sentences over long text.

## Goals
- TODO: What is the goal of this repo?

## Non-goals
- TODO: What is explicitly not a goal?

## Architecture / Module map
- TODO: How is the repo structured (folders, modules, extensions)?
- TODO: Where is “custom code” vs vendor/framework?

## Local dev setup
- TODO: How do you run this locally?
- TODO: Docker/Lando? PHP/Composer? Node? Database?

## Testing / validation
- TODO: What is the minimum to validate changes?
  - docs change:
  - code change:
  - config change:

## Deployment / release (optional)
- TODO: How is this deployed? Are there releases?

## Ownership / escalation
- TODO: Who to ask when unclear (module owners)?
- TODO: When do you need explicit “human go”?

<!-- AARRS:inventory:start -->
<!-- AARRS:inventory:end -->

MD;
    }

    public static function nextStepsDeBase(): string
    {
        return <<<MD
# Next steps (AARRS) — generated

Diese Datei ist ein **automatisch generierter** Startpunkt, basierend auf dem aktuellen Repo-Zustand.
Sie soll Menschen und KI helfen, schnell die **nächsten kleinen, sicheren Schritte** zu finden.

MD;
    }
}

// ---- main ----

['options' => $opts] = Cli::parse($argv);
$dryRun = ($opts['mode'] === 'dry-run');

$report = [];

$outputDir = $opts['output_dir'];
Fs::ensureDir($outputDir, $dryRun, $report);

$inventory = Detect::scan('.');
$inventoryJson = Render::inventoryJson($inventory, $opts);
$inventoryMd = Render::inventoryMd($inventory);

$paths = [
    'inventory_json' => $outputDir . '/inventory.json',
    'inventory_md' => $outputDir . '/inventory.md',
    'next_steps_de' => $outputDir . '/next-steps.md',
    'ai_readme_de' => $outputDir . '/README.md',
    'repo_context_de' => $outputDir . '/repo_context.md',
];

Fs::write($paths['inventory_json'], $inventoryJson, $dryRun, $report);
Fs::write($paths['inventory_md'], $inventoryMd, $dryRun, $report);

// AI README (DE)
Fs::write($paths['ai_readme_de'], Render::aiReadmeDe(), $dryRun, $report);

// repo_context.md: create if missing, else marker-update only
$existingRepoContext = Fs::read($paths['repo_context_de']);
$repoContextDe = $existingRepoContext ?? Templates::repoContextTemplateDe();

// ✅ FIX: only insert the generated inventory section body (not a full doc)
$repoContextDe = Markers::upsertBlock(
    $repoContextDe,
    MARKER_INVENTORY_START,
    MARKER_INVENTORY_END,
    Render::repoContextInventoryBlockMd($inventory)
);

Fs::write($paths['repo_context_de'], $repoContextDe, $dryRun, $report);

// next-steps.md: create/update via markers
$existingNextSteps = Fs::read($paths['next_steps_de']) ?? Templates::nextStepsDeBase();
$nextStepsDe = Markers::upsertBlock(
    $existingNextSteps,
    MARKER_NEXT_STEPS_START,
    MARKER_NEXT_STEPS_END,
    Render::nextStepsDe($inventory) // now returns block only ✅
);
Fs::write($paths['next_steps_de'], $nextStepsDe, $dryRun, $report);

// Language options
if ($opts['lang'] === 'en' || $opts['bilingual']) {
    $aiReadmeEnPath = $outputDir . '/README-EN.md';
    $repoContextEnPath = $outputDir . '/repo_context-EN.md';

    Fs::write($aiReadmeEnPath, Render::aiReadmeEn(), $dryRun, $report);

    $existingRepoContextEn = Fs::read($repoContextEnPath);
    $repoContextEn = $existingRepoContextEn ?? Templates::repoContextTemplateEn();

    // ✅ FIX: only inventory section body
    $repoContextEn = Markers::upsertBlock(
        $repoContextEn,
        MARKER_INVENTORY_START,
        MARKER_INVENTORY_END,
        Render::repoContextInventoryBlockMd($inventory)
    );

    Fs::write($repoContextEnPath, $repoContextEn, $dryRun, $report);
}

// Summary
fwrite(STDOUT, "AARRS Init v" . AARRS_TOOL_VERSION . " (" . ($dryRun ? "dry-run" : "apply") . ")\n");
fwrite(STDOUT, "Output dir: " . $outputDir . "\n\n");

fwrite(STDOUT, "Planned/Applied actions:\n");
foreach ($report as $r) {
    $line = "- " . $r['action'] . " " . $r['path'];
    if (isset($r['bytes'])) $line .= " (" . $r['bytes'] . " bytes)";
    fwrite(STDOUT, $line . "\n");
}

fwrite(STDOUT, "\nDone.\n");