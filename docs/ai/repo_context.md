# Repository Context (AARRS Core Template)

## Ziel
Dieses Repository stellt ein **Core-Template** bereit, um bestehende Repositories so zu ergänzen/strukturieren, dass KI-Assistenten:
- schneller Kontext aufbauen,
- bessere Vorschläge machen,
- Dokumentation strukturierter erzeugen,
- und Maintainer im Alltag entlasten.

**Wichtig:** Es geht primär um einen *Denkanstoß* + praxistaugliche Vorlage — nicht um ein „du musst“-Standardwerk.

## Nicht-Ziele
- Kein Showcase für ein einzelnes Produkt oder eine Codebase.
- Kein Tooling, das nur mit einem Modell/Provider funktioniert.

## Zielgruppen
- Maintainer von OSS- und Unternehmens-Repos
- Teams, die KI für Review/Doku/Refactoring einsetzen
- Tool-Builder, die auf AARRS aufsetzen wollen

## Arbeitsweise (für KI)
Wenn du eine Aufgabe bekommst:
1. Stelle klärende Fragen (max. 7), falls nötig.
2. Lege einen Plan in kleinen, reviewbaren Schritten vor.
3. Liefere Output als Template/Artefakt (Dateivorschläge, Checklisten, Strukturen).
4. Nenne Risiken/Trade-offs.
5. Warte auf menschliches Go für Änderungen mit Impact.

## Wichtige Dateien
- `.aarrs.yaml` – Meta-Konfiguration
- `docs/ai/constraints.md` – Guardrails/Constraints
- `docs/ai/prompts/` – Rollenprompts
- `backlog.md` – Arbeitspakete