# Prompts (AARRS)

Diese Prompts sind als **Rollen-Templates** gedacht. Ziel: reproduzierbare Ergebnisse statt „Prompt‑Glück“.

## Nutzung
1. Rolle auswählen (z. B. `researcher.md`)
2. Repo-Kontext lesen (`../repo_context.md`)
3. Constraints lesen (`../constraints.md`)
4. Gemeinsames Ausgabeformat in `output-format.md` anwenden
5. Auftrag ausführen und Output in der angegebenen Struktur liefern

## Gemeinsames Ausgabeformat
- `output-format.md` definiert eine Standard-Markdownstruktur für alle Rollen.
- Rollenprompts dürfen zusätzliche Abschnitte ergänzen, aber die Pflichtabschnitte nicht entfernen.

## Rollen (geplant)
- `researcher.md` – Patterns/Best Practices extrahieren, Reports schreiben
- `reviewer.md` – Reviews entlang Guardrails, Risiken & Trade-offs
- `documenter.md` – Doku konsistent erstellen/aktualisieren
- `implementer.md` – kleine, sichere Änderungen mit Plan (**implemented**)
