# AARRS (AI‑Assistant‑Ready Repository Specification)

AARRS ist ein **Core-Template** (Denkanstoß + Werkzeugkasten), um GitHub-Repositories so zu ergänzen, dass KI‑Assistenten (und Menschen) sie **schneller verstehen, sicherer verbessern und konsistenter dokumentieren** können.

> Fokus: **Integration in bestehende Repos** (z. B. WordPress, Magento) – kein Showcase-Repo.

## Warum?
KI ist nur so gut wie ihr Kontext. In vielen Projekten fehlt:
- ein klarer Einstiegspunkt („Wie funktioniert dieses Repo?“),
- explizite Regeln/Constraints,
- wiederverwendbare Rollenprompts,
- maschinenlesbare Metadaten.

AARRS liefert dafür eine minimalistische, erweiterbare Struktur.

## Quickstart
1. Starte hier: `docs/ai/README.md`
2. Repo-Kontext: `docs/ai/repo_context.md`
3. Guardrails: `docs/ai/constraints.md`
4. Backlog: `backlog.md`

## Was ist in diesem Repo?
- `docs/ai/` – AI‑Hub: Kontext, Constraints, Prompts
- `templates/` – Copy‑&‑Paste‑Artefakte für Downstream-Repos
- `examples/` – kleine, minimale Beispiele/Integrationen
- `tools/` – später: Audit/Score/Init (optional)
- `docs/research/` – Ausarbeitungen (A/B/C/D)
- `docs/design/` – Architektur & Entscheidungslog

## Nicht‑Ziele
- Kein „muss“-Standard für alle.
- Kein Vendor-Lock-in.
- Keine Automatisierung um der Automatisierung willen (Actions sind optional).

## Status
MVP / Iteration. Siehe `backlog.md` und `GitHub-Actions-ToDo.md`.

## English version
See `README-EN.md`.