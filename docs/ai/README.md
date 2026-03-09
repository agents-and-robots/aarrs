# AI‑Zentrale (AARRS)

Diese Dokumente sind der **Einstiegspunkt** für Menschen und KI‑Assistenten.
**Start hier:** `how-to-use.md` (DE) / `how-to-use-EN.md` (EN)  
**AI‑Einstieg:** `docs/ai/README.md` (siehe “First‑run (10 Minuten)”)

## First‑run (10 Minuten) — Kanonische Reihenfolge
Wenn du neu hier bist (Mensch oder KI), nutze diese Reihenfolge:

1. `how-to-use.md` (praktischer Einstieg / Integration)
2. `repo_context.md` (Ziele, Architektur, Konventionen)
3. `constraints.md` (Guardrails + “small diff” Standard)
4. `instruction-priority.md` (falls Anweisungen kollidieren)
5. `legacy-playbook.md` (wenn Legacy/gewachsen)
6. `prompts/` (Rolle wählen, Output-Format beachten)

> Hinweis: **Lesereihenfolge ≠ Konfliktpriorität.**  
> Bei widersprüchlichen Anweisungen gilt `instruction-priority.md` (Constraints sind dann “Quelle der Wahrheit”).
> 
## Wenn du KI bist: so arbeitest du hier
1. Lies zuerst `repo_context.md`.
2. Beachte `constraints.md` strikt.
3. Lies `instruction-priority.md`, falls es widersprüchliche Anweisungen gibt.
4. Wenn du in Legacy-Code arbeitest: nutze `legacy-playbook.md`.
5. Wähle eine Rolle aus `prompts/`.
6. Liefere Ergebnisse als **Markdown** (klar, kurz, mit Annahmen & offenen Fragen).
7. Bei Unsicherheit: **fragen statt raten**.

## Wenn du Mensch bist: so nutzt du AARRS
- Nutze `docs/ai/*` als wiederverwendbares Bundle.
- Kopiere später Inhalte aus `templates/` in dein Ziel-Repo (z. B. WordPress/Magento).
- Halte Regeln klein, konkret und auditierbar.

## Prinzipien
- **Core-Template:** downstream integrierbar
- **Vendor-neutral:** keine Provider-Bindung
- **Human-in-the-loop:** KI schlägt vor, Menschen entscheiden
- **Small diffs:** kleine PRs/Commits, klare Änderungen
- **Traceability:** Entscheidungen kurz dokumentieren

## Dateien (Kurzbeschreibung)
- `repo_context.md` – Was ist das Projekt, Ziele/Nicht‑Ziele, Arbeitsweise
- `constraints.md` – Guardrails: was KI darf/nicht darf, Qualitätsgrenzen
- `instruction-priority.md` – Konfliktauflösung + Sprachregeln (DE canonical / EN synced)
- `legacy-playbook.md` – Legacy-Workflow: Orientierung, Risiken, Small-Diff-Slicing
- `prompts/` – Rollenprompts (Researcher, Reviewer, Documenter, …)
- `evaluation.md` – (optional) Scorecards/Checks für AI‑Readiness

## English version
See `README-EN.md`.