# AI‑Readiness Evaluation (Preview / Extended) – AARRS

Diese Version ist eine **Vorschau auf “nachhaltig & umfassend”**.  
Sie ist absichtlich detaillierter, damit man sieht, was möglich ist – ohne dass ein Repo sofort alles erfüllen muss.

**Scoring:** 30 Checks × (0/1/2) = 0–60 → normiert auf 0–100
- 2 = erfüllt
- 1 = teilweise
- 0 = fehlt

> Tipp: Nutze die Preview als Roadmap: “Welche 5 Checks bringen am meisten?”

---

## Kategorie 1: Einstieg & Navigation (6 Checks)
| # | Check | 0/1/2 | Evidenz/Link |
|---:|---|---:|---|
| 1 | Root `README.md` hat klare Value Proposition (Mensch+KI) |  |  |
| 2 | Root README enthält Quickstart mit 3–5 konkreten Links |  |  |
| 3 | Root README benennt Nicht‑Ziele (Anti‑Scope Creep) |  |  |
| 4 | `README-EN.md` ist vorhanden + konsistent |  |  |
| 5 | Ordner-READMEs existieren (templates/examples/tools/docs/*) |  |  |
| 6 | Links sind stabil (relative Links, keine kaputten Pfade) |  |  |

## Kategorie 2: Kontext & Architekturverständnis (6 Checks)
| # | Check | 0/1/2 | Evidenz/Link |
|---:|---|---:|---|
| 7 | `docs/ai/repo_context.md` nennt Ziele/Nicht‑Ziele explizit |  |  |
| 8 | Glossar/Begriffe sind definiert (kurz, optional) |  |  |
| 9 | Architektur-Doku existiert (`docs/design/architecture.md`) |  |  |
| 10 | Decision Log existiert & ist genutzt (`docs/design/decision-log.md`) |  |  |
| 11 | Contribution-Flow ist beschrieben (auch minimal) |  |  |
| 12 | “What to read first” für neue Maintainer ist vorhanden |  |  |

## Kategorie 3: Guardrails, Sicherheit, Qualität (6 Checks)
| # | Check | 0/1/2 | Evidenz/Link |
|---:|---|---:|---|
| 13 | `docs/ai/constraints.md` ist kurz & testbar (nicht “bla bla”) |  |  |
| 14 | Regeln für “small diffs” / Reviewbarkeit sind enthalten |  |  |
| 15 | Policy für Annahmen vs. Fakten ist enthalten |  |  |
| 16 | Security/PII Hinweis (keine Secrets, keine sensiblen Daten) |  |  |
| 17 | Naming/Structure-Konventionen dokumentiert |  |  |
| 18 | Qualitätsbar: Doku-Style (kurze Einleitungen, klare Links) |  |  |

## Kategorie 4: Prompts & Arbeitsmodi (6 Checks)
| # | Check | 0/1/2 | Evidenz/Link |
|---:|---|---:|---|
| 19 | Prompts haben konsistentes Output-Format |  |  |
| 20 | Prompts sind rollenbasiert (Research/Review/Docs/Implement) |  |  |
| 21 | Prompts enthalten “Stop conditions” (wann abbrechen & fragen) |  |  |
| 22 | Prompts sind vendor-neutral (keine Tool-spezifischen Annahmen) |  |  |
| 23 | Prompt-Regression möglich (Golden Output / Beispiele) |  |  |
| 24 | “Task intake” Template existiert (Issue/Briefing Struktur) |  |  |

## Kategorie 5: Templates & Downstream‑Integration (6 Checks)
| # | Check | 0/1/2 | Evidenz/Link |
|---:|---|---:|---|
| 25 | `templates/` erklärt, was kopiert werden soll und warum |  |  |
| 26 | Template-Struktur ist minimal-invasiv (kein Repo-Umbau nötig) |  |  |
| 27 | Beispiele: “Integration Steps” (ohne Fork-Zwang) |  |  |
| 28 | Platzhalter klar markiert (TODO/ADAPT ME) |  |  |
| 29 | Versionierungsidee für Templates vorhanden (semver/Datum) |  |  |
| 30 | “Integrity checks” (links/files) sind vorgesehen (optional Actions) |  |  |

---

## Normalisierung (0–100)
- Rohscore: Summe (0–60)
- Normiert: `round((rohscore / 60) * 100)`

---

## Nutzung als Roadmap (empfohlen)
1. Fülle zuerst Quickstart (`evaluation.md`)
2. Dann: Wähle aus der Preview die Top‑5 mit maximalem Nutzen
3. Backlog-Einträge daraus ableiten (“small diffs”)