# Constraints / Guardrails (AARRS)

Kurzregeln für Menschen & KI, damit Beiträge konsistent, sicher und wiederverwendbar bleiben.

> **Sprachhinweis:** Diese DE-Version ist canonical. EN-Version siehe `constraints-EN.md` (synced).

## Must
- **Template-first:** Änderungen müssen downstream (z. B. WordPress/Magento) sinnvoll integrierbar sein.
- **Vendor-neutral:** Keine Provider- oder Modell-Lock-ins im Wording oder in der Struktur.
- **Small diffs (Default):** Bevorzuge kleine, reviewbare Änderungen statt großer Umstrukturierungen.  
  **Standard (ohne extra Begründung):**
    - ≤ **3 Dateien** geändert **und**
    - ≤ **150 LOC** (added+deleted)  
      Wenn darüber: kurz begründen (Warum nötig? Risiken? Rollback?).
- **Traceability:** Größere Entscheidungen gehören in `docs/design/decision-log.md` (kurz, nachvollziehbar).

## Must not
- Keine Breaking Changes an der Grundstruktur ohne vorherigen Plan im Backlog/Roadmap.
- Keine “magischen” Auto-Fixes ohne Erklärung (immer kurz begründen: Warum? Trade-off?).
- Keine **Secrets/PII** in Issues, Commits, Dokus oder Prompts. Keine Tokens/Passwörter/API-Keys einfügen.

## Quality bar
- Dateien sollen **klar benannt**, **auffindbar** und **kurz einleitend** sein (1–3 Sätze reichen oft).
- Wenn etwas unklar ist: **offene Fragen explizit notieren** statt zu raten.
- **Fakten vs. Annahmen:** Fakten möglichst mit Repo-Pfaden/Abschnitten belegen; Annahmen explizit markieren.

## Decision-Log Trigger (Daumenregel)
Schreibe (kurz) in `docs/design/decision-log.md`, wenn:
- neue/angepasste Guardrails (“Must/Must not”) eingeführt werden
- Prioritäten/Governance geändert werden (`docs/ai/instruction-priority*.md`)
- Ordner-/Dateistruktur im Core geändert wird
- ein Template-Ansatz geändert wird, der Downstream-Repos betrifft