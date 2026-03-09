# How to use AARRS (DE)

Dieses Dokument ist der **praktische Einstieg**: Was mache ich konkret mit AARRS, wenn ich ein bestehendes Repo (z. B. WordPress/Magento) KI‑tauglicher machen will?

**Sprache:** Deutsch ist die **Hauptversion (canonical)**.  
**EN-Sync:** Wenn du diese Datei änderst, **aktualisiere auch** `how-to-use-EN.md`.

---

## 1) Für wen ist das gedacht?
- Maintainer, die KI im Alltag für **Review, Doku, Refactoring, Planung** nutzen
- Teams, die schnelleres Onboarding und konsistentere Beiträge wollen
- Tool‑Builder, die Checklisten/Workflows darauf aufbauen möchten

---

## 2) Was ist AARRS (in 3 Sätzen)?
AARRS ist ein **Core-Template** für Repo-Strukturen und Dokumente, die KI-Assistenten schnell in den richtigen Kontext bringen.  
Es ist **vendor-neutral** (kein Provider-Lock-in) und auf **small diffs** ausgelegt.  
Ziel ist, dass KI Vorschläge **sicherer** macht und Maintainer **entlastet**.

---

## 3) Quickstart (5 Minuten)
1. Lies: `README.md`
2. Öffne die AI-Zentrale: `docs/ai/README.md`
3. Kontext: `docs/ai/repo_context.md`
4. Regeln: `docs/ai/constraints.md`
5. Prompts: `docs/ai/prompts/` (z. B. `researcher.md`)
6. Nächste Schritte: `backlog.md`

---

## 4) Integration in ein bestehendes Repo (empfohlener Ablauf)
> Ziel: **minimal-invasiv** integrieren, ohne das Repo “umzubauen”.

### Schritt A — AI-Hub kopieren
Kopiere (oder adaptiere) nach `<target-repo>/docs/ai/`:
- `docs/ai/README.md`
- `docs/ai/repo_context.md`
- `docs/ai/constraints.md`
- `docs/ai/prompts/*`

**Dann anpassen:**
- `repo_context.md`: Architektur, Ziele/Nicht‑Ziele, Konventionen, Tools, Build/Run
- `constraints.md`: Security, CI, Review-Regeln, Definition of Done

### Schritt B — “Prompts als Rollen” etablieren
Mindestens eine Rolle definieren, z. B.:
- Reviewer (Risiken/Trade-offs)
- Documenter (Doku konsistent)
- Implementer (kleine PRs)

### Schritt C — Scorecard nutzen (PoC-Wirkung)
Fülle `docs/ai/evaluation.md` aus:
- Top‑3 Lücken identifizieren
- 1–2 “small diffs” daraus ableiten
- Score nachziehen

---

## 5) Wie man AARRS in Issues/PRs nutzt (Muster)
### Issue Intake (Kurzformat)
- Ziel:
- Kontext/Links:
- Constraints (z. B. “keine Breaking Changes”, “vendor-neutral”):
- Erwarteter Output (z. B. Plan + Diff-Vorschlag):
- Offene Fragen:

### PR Checklist (Minimal)
- [ ] Small diff, reviewbar
- [ ] Änderungen sind downstream‑tauglich
- [ ] Links/README aktualisiert (falls nötig)
- [ ] Entscheidung dokumentiert (falls relevant)

---

## 6) Anti-Patterns (was vermeiden)
- “Große Umstrukturierung” ohne Plan/Backlog
- Tool-/Provider-spezifische Anweisungen in Core-Docs
- Annahmen als Fakten formulieren
- Magische Auto-Fixes ohne Erklärung

---

## 7) Was als Nächstes (Roadmap‑Hint)
- `docs/ai/evaluation-preview.md` als Vision/Preview nutzen
- `docs/design/decision-log.md` aktiv verwenden
- Optional: GitHub Action “Repo Health Check” (nur lesen/prüfen, nicht auto-fixen)