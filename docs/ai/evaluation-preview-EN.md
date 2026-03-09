# AI Readiness Evaluation (Preview / Extended) – AARRS

This is a **preview of a “sustainable & comprehensive”** evaluation.  
It is intentionally more detailed to demonstrate what’s possible—without requiring a repo to meet everything immediately.

**Scoring:** 30 checks × (0/1/2) = 0–60 → normalized to 0–100
- 2 = met
- 1 = partially met
- 0 = missing

> Tip: Use this preview as a roadmap: “Which 5 checks give us the biggest benefit?”

---

## Category 1: Entry & Navigation (6 checks)
| # | Check | 0/1/2 | Evidence/Link |
|---:|---|---:|---|
| 1 | Root `README.md` has a clear value proposition (humans + AI) |  |  |
| 2 | Root README includes a quickstart with 3–5 concrete links |  |  |
| 3 | Root README states non-goals (prevents scope creep) |  |  |
| 4 | `README-EN.md` exists and is consistent |  |  |
| 5 | Folder READMEs exist (templates/examples/tools/docs/*) |  |  |
| 6 | Links are stable (relative links, no broken paths) |  |  |

## Category 2: Context & Architecture Understanding (6 checks)
| # | Check | 0/1/2 | Evidence/Link |
|---:|---|---:|---|
| 7 | `docs/ai/repo_context.md` explicitly states goals/non-goals |  |  |
| 8 | A brief glossary/terminology exists (optional but helpful) |  |  |
| 9 | Architecture docs exist (`docs/design/architecture.md`) |  |  |
| 10 | Decision log exists and is used (`docs/design/decision-log.md`) |  |  |
| 11 | Contribution flow is described (even minimal) |  |  |
| 12 | “What to read first” for new maintainers is available |  |  |

## Category 3: Guardrails, Security, Quality (6 checks)
| # | Check | 0/1/2 | Evidence/Link |
|---:|---|---:|---|
| 13 | `docs/ai/constraints.md` is short and testable (not vague) |  |  |
| 14 | Rules for “small diffs” / reviewability are included |  |  |
| 15 | Policy for assumptions vs facts is included |  |  |
| 16 | Security/PII note exists (no secrets, no sensitive data) |  |  |
| 17 | Naming/structure conventions are documented |  |  |
| 18 | Quality bar: documentation style (short intros, clear links) |  |  |

## Category 4: Prompts & Working Modes (6 checks)
| # | Check | 0/1/2 | Evidence/Link |
|---:|---|---:|---|
| 19 | Prompts follow a consistent output format |  |  |
| 20 | Prompts are role-based (research/review/docs/implement) |  |  |
| 21 | Prompts contain stop conditions (when to stop & ask) |  |  |
| 22 | Prompts are vendor-neutral (no tool/provider assumptions) |  |  |
| 23 | Prompt regression is possible (golden outputs / examples) |  |  |
| 24 | A “task intake” template exists (issue/brief structure) |  |  |

## Category 5: Templates & Downstream Integration (6 checks)
| # | Check | 0/1/2 | Evidence/Link |
|---:|---|---:|---|
| 25 | `templates/` explains what to copy and why |  |  |
| 26 | Template structure is minimally invasive (no repo overhaul required) |  |  |
| 27 | Examples include integration steps (no forced forks) |  |  |
| 28 | Placeholders are clearly marked (TODO / ADAPT ME) |  |  |
| 29 | Template versioning idea exists (semver/date-based) |  |  |
| 30 | “Integrity checks” (links/files) are planned (optional Actions) |  |  |

---

## Normalization (0–100)
- Raw score: sum (0–60)
- Normalized: `round((raw_score / 60) * 100)`

---

## Recommended usage as a roadmap
1. Start with the quickstart scorecard (`evaluation.md`)
2. Pick the top 5 checks from this preview that create the most leverage
3. Turn them into backlog items (“small diffs”)