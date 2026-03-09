# AI‑Readiness Evaluation (Quickstart) – AARRS

Ziel: Ein **schneller, wiederholbarer** Check (PoC‑tauglich), der Menschen und KI eine gemeinsame Qualitätsbasis gibt.

**Scoring:** 10 Checks × 10 Punkte = **0–100**
- ✅ erfüllt → 10
- ⚠️ teilweise → 5
- ❌ fehlt → 0

> Empfehlung: Bei jedem PR kurz gegenprüfen. Monatlich einmal als “Repo Hygiene”.

---

## Scorecard (10 Checks)

| # | Bereich | Check | Punkte (0/5/10) | Notiz / Link |
|---:|---|---|---:|---|
| 1 | Einstieg | Root `README.md` erklärt Zweck + Quickstart |  |  |
| 2 | Einstieg | `README-EN.md` vorhanden (Bilingualer Einstieg) |  |  |
| 3 | AI Hub | `docs/ai/README.md` zeigt Arbeitsweise/Quickstart |  |  |
| 4 | Kontext | `docs/ai/repo_context.md` beschreibt Ziele/Nicht‑Ziele + Zielgruppen |  |  |
| 5 | Guardrails | `docs/ai/constraints.md` ist kurz, konkret, durchsetzbar |  |  |
| 6 | Prompts | `docs/ai/prompts/README.md` erklärt Rollen & Nutzung |  |  |
| 7 | Prompts | mind. 1 Rollenprompt existiert (`researcher.md`) |  |  |
| 8 | Templates | `templates/README.md` erklärt Copy‑&‑Paste‑Zweck (Downstream) |  |  |
| 9 | Beispiele | `examples/README.md` erklärt Beispiel-Ansatz (PoC) |  |  |
| 10 | Änderbarkeit | `backlog.md` beschreibt nächste Schritte |  |  |

---

## Interpretation (Daumenregeln)
- **90–100:** sehr gut für PoC/Onboarding, “AI kann loslegen”
- **70–89:** gut, aber 1–2 Reibungspunkte (meist Links/Struktur)
- **40–69:** fragil – KI/Humans stolpern über fehlenden Kontext
- **0–39:** noch kein verlässlicher Einstieg

---

## Review‑Loop (leichtgewichtig)
1. Scorecard ausfüllen
2. Top‑3 Probleme notieren
3. Kleinste mögliche Änderung im Backlog/als PR ableiten
4. Re-Check