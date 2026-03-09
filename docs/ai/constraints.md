# Constraints / Guardrails (AARRS)

Kurzregeln für Menschen & KI, damit Beiträge konsistent, sicher und wiederverwendbar bleiben.

## Must
- **Template-first:** Änderungen müssen downstream (z. B. WordPress/Magento) sinnvoll integrierbar sein.
- **Vendor-neutral:** Keine Provider- oder Modell-Lock-ins im Wording oder in der Struktur.
- **Small diffs:** Bevorzuge kleine, reviewbare Änderungen statt großer Umstrukturierungen.
- **Traceability:** Größere Entscheidungen gehören in `docs/design/decision-log.md` (kurz, nachvollziehbar).

## Must not
- Keine Breaking Changes an der Grundstruktur ohne vorherigen Plan im Backlog/Roadmap.
- Keine “magischen” Auto-Fixes ohne Erklärung (immer kurz begründen: Warum? Trade-off?).

## Quality bar
- Dateien sollen **klar benannt**, **auffindbar** und **kurz einleitend** sein (1–3 Sätze reichen oft).
- Wenn etwas unklar ist: **offene Fragen explizit notieren** statt zu raten.