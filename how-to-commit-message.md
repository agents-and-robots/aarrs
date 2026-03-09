# AARRS Commit Messages – How to write context-rich commits

Ziel: Commit-Messages sollen **für Menschen UND KI-Assistenten** maximalen Kontext liefern, damit:
- Änderungen schnell verstanden werden,
- spätere Analysen (z. B. Migration nach WordPress/Magento) leichter werden,
- automatisierte Zusammenfassungen/Changelogs zuverlässiger sind.

## Grundprinzipien

1. **Intent > Aktivität**
    - Nicht nur *was* du getan hast, sondern *warum*.
2. **Template-Kontext**
    - Immer denken: „Wie wirkt sich das auf Downstream-Integration aus?“
3. **Kleine, atomare Commits**
    - Ein Commit = ein klarer Gedanke / eine klar abgrenzbare Änderung.
4. **Maschinenlesbar**
    - Konsistente Struktur hilft KI (und Menschen) beim Parsen.

## Empfohlenes Format (AARRS)

### Subject (1 Zeile)
Nutze (weitgehend) Conventional Commits:

`<type>(<scope>): <summary>`

**Types (Empfehlung):**
- `feat`: neues Template-Feature / neue Capability
- `fix`: Bugfix / Korrektur
- `docs`: Doku-only Änderungen
- `chore`: Struktur, Meta-Dateien, Refactoring ohne Verhaltensänderung
- `refactor`: Umstrukturierung mit gleicher Funktion
- `test`: Tests hinzufügen/ändern
- `ci`: GitHub Actions / CI-spezifisch

**Scopes (Beispiele):**
- `aarrs`, `docs-ai`, `prompts`, `templates`, `tools`, `examples`, `research`, `ci`

**Summary (Regeln):**
- Imperativ (z. B. „add“, „update“, „remove“)
- 50–72 Zeichen, wenn möglich
- Nenne das Zielartefakt (z. B. „docs/ai guardrails“, „repo skeleton“)

### Body (empfohlen)
Nutze 3 Blöcke, in dieser Reihenfolge:

1. **Context / Why**
    - Warum wurde das geändert?
2. **What changed**
    - Stichpunkte der wichtigsten Änderungen
3. **Impact**
    - Auswirkungen auf Template/Integration/Backwards compatibility
    - Optional: Follow-ups / offene ToDos

**Body-Regeln:**
- Bulletpoints sind ausdrücklich erwünscht
- Keine Romane: lieber kurz + präzise
- Wenn Annahmen gemacht wurden: als Annahmen markieren

## Beispiele

### Beispiel: Struktur initialisieren
```text
chore(aarrs): initialize core template skeleton (docs/ai, research, design)

Context:
- Establish a minimal, reusable baseline for integrating AARRS into existing repositories.

What changed:
- Add docs/ai entrypoints (README, repo context, guardrails, prompts)
- Add placeholder directories for research/design/templates/examples/tools
- Add backlog and GitHub Actions TODO (automation deferred)

Impact:
- No behavior change; repository now has a stable structure to iterate on.
```

### Beispiel: Prompt verbessern
```text
docs(prompts): clarify researcher output format and constraints

Context:
- Ensure AI outputs are deterministic and reviewable across models.

What changed:
- Add explicit output sections (summary/observations/recommendations/open questions)
- Tighten vendor-neutral guardrails

Impact:
- Improved consistency for AI-assisted research tasks.
```

### Beispiel: Template-Artefakt hinzufügen
```text
feat(templates): add baseline docs/ai bundle for downstream repos

Context:
- Provide drop-in AARRS docs/ai set for projects like WordPress/Magento.

What changed:
- Add templates/docs/ai/* skeleton with minimal defaults

Impact:
- Downstream repos can copy the bundle with minimal adaptation.
```

## Git Commit-Template verwenden (`.gitmessage`)

Damit du die AARRS-Struktur nicht jedes Mal neu schreiben musst, kannst du Git eine Vorlage verwenden lassen.

### 1) `.gitmessage` im Repo anlegen
Lege im Repo eine Datei `.gitmessage` an (siehe Vorschlagsinhalt unten).

### 2) Git konfigurieren (repo-lokal empfohlen)
Repo-lokal (nur dieses Projekt):
```bash
git config commit.template .gitmessage
```

Global (für alle Repos):
```bash
git config --global commit.template /absolute/path/to/.gitmessage
```

### 3) Commit erstellen
```bash
git commit
```

Dein Editor öffnet dann automatisch die Vorlage.

### Vorschlag für `.gitmessage`
```text
<type>(<scope>): <summary>

Context:
- <why is this change necessary?>

What changed:
- <bullet 1>
- <bullet 2>

Impact:
- <downstream/integration impact?>
- <breaking? yes/no + note>

Optional:
- Refs: #<issue>
- AARRS-Score-Impact: <dimension +/-N>
```

## Anti-Patterns (bitte vermeiden)
- „update stuff“, „changes“, „fix“, „wip“ ohne Kontext
- Sehr große Commits, die mehrere Themen mischen
- Nur Dateilisten ohne „Why“ (KI und Menschen verlieren den Sinn)

## Optional: Trailer (für spätere Automatisierung)
Wenn ihr später Automatisierung/Issues verknüpft:

- `Refs: #123`
- `Relates-to: docs/ai/repo_context.md`
- `AARRS-Score-Impact: documentation +10`