# AARRS Init Tool — Spec v1 (LAMP-first, framework-open)

**Status:** draft / spec  
**Goal:** Define the minimal, stable contract for `tools/aarrs-init.php` so that:
- onboarding is a **no-brainer** (default writes files),
- outputs are **LLM-tauglich** (facts vs assumptions, file paths),
- tooling remains **framework-open** (WordPress/Magento/Shopware/Joomla + generic legacy),
- future ports (Node/Python) can generate the same outputs.

---

## 1) Inventory JSON Schema (minimal, stable)

### 1.1 Output files
- `docs/ai/inventory.md` (human + LLM readable)
- `docs/ai/inventory.json` (machine readable)

### 1.2 JSON top-level shape
- `aarrs_version`: `"v1"`
- `generated_at`: ISO 8601 UTC timestamp
- `generator`: tool metadata
- `repo.detected_files[]`, `repo.detected_dirs[]`: facts (path checks)
- `detections[]`: framework/tooling detections with evidence + assumptions
- `modules[]`: best-effort modules/extensions/custom areas with evidence
- `tooling`: ecosystem hints (composer/node/containers/ci)
- `notes[]`: info/warn notes

### 1.3 Rules (facts vs assumptions)
- Facts must be backed by filesystem checks.
- Interpretations must be labeled as assumptions.

---

## 2) Marker convention (non-destructive updates)

### 2.1 Goal
Allow reruns to update generated sections without overwriting hand-written content.

### 2.2 Marker blocks
- Inventory:
    - `<!-- AARRS:inventory:start -->`
    - `<!-- AARRS:inventory:end -->`
- Next steps:
    - `<!-- AARRS:next-steps:start -->`
    - `<!-- AARRS:next-steps:end -->`

### 2.3 Update mode (v1)
- `markers` only: update inside known marker blocks; if missing, insert once.

---

## 3) Profiles & detectors (LAMP-first, framework-open)

### 3.1 Profiles (v1)
- `generic-lamp` (default)
- `wordpress`
- `magento`
- `shopware`
- `joomla`

Profiles only add:
- module discovery rules,
- tailored TODO hints,
- tailored next steps.

### 3.2 Minimal detectors (generic-lamp)
- `composer.json`, `vendor/`, `phpunit.xml*`
- `package.json`, lockfiles
- `docker-compose.yml`, `Dockerfile`, `.lando.yml`
- `.github/workflows/*`
- README/CONTRIBUTING/CHANGELOG

### 3.3 WordPress modules
- `wp-content/plugins/*`
- `wp-content/mu-plugins/*`
- `wp-content/themes/*`

---

## 4) Generated files (v1)
- `docs/ai/README.md` (+ optional `README-EN.md`)
- `docs/ai/repo_context.md` (+ optional `repo_context-EN.md`)
- `docs/ai/inventory.md`
- `docs/ai/inventory.json`
- `docs/ai/next-steps.md`

All updates are non-destructive via marker blocks.