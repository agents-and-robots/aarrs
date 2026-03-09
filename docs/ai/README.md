# AI‑Zentrale (AARRS)

Diese Dokumente sind der **Einstiegspunkt** für Menschen und KI‑Assistenten.

## Wenn du KI bist: so arbeitest du hier
1. Lies zuerst `repo_context.md`.
2. Beachte `constraints.md` strikt.
3. Wähle eine Rolle aus `prompts/`.
4. Liefere Ergebnisse als **Markdown** (klar, kurz, mit Annahmen & offenen Fragen).
5. Bei Unsicherheit: **fragen statt raten**.

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
- `prompts/` – Rollenprompts (Researcher, Reviewer, Documenter, …)
- `evaluation.md` – (optional) Scorecards/Checks für AI‑Readiness

## English version
See `README-EN.md`.