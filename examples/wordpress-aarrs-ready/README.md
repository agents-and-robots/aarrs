# Beispiel: WordPress “AARRS-ready” (Integration Kit) — DE

Dieses Beispiel zeigt, wie du **AARRS minimal-invasiv** in ein bestehendes WordPress-Projekt integrierst, ohne WordPress selbst zu forken oder zu vendoren.

**Ziel:** In <30 Minuten eine Struktur schaffen, die es Menschen und LLMs ermöglicht:
- schneller Kontext aufzubauen,
- sicherere Vorschläge zu machen,
- und “small diffs” reproduzierbar abzuliefern.

> DE ist canonical. EN-Version: `README-EN.md` (synced).

---

## 1) Was du am Ende hast (Outcome)
Im WordPress-Projekt existiert zusätzlich ein Ordner:

- `docs/ai/` (Kontext, Guardrails, Prompts, Evaluation)

Und zwei Root-Entry-Points:

- `how-to-use.md` (projektspezifischer Einstieg)
- `README.md` mit Links auf den AI-Hub

---

## 2) Minimaler Datei-Plan (was du ins Ziel-Repo kopierst)
Kopiere aus diesem AARRS-Repo in dein WordPress-Repo:

- `docs/ai/README.md`
- `docs/ai/README-EN.md` (optional, aber empfohlen)
- `docs/ai/repo_context.md` → **muss angepasst werden**
- `docs/ai/constraints.md` (+ optional `constraints-EN.md`)
- `docs/ai/instruction-priority.md` (+ EN)
- `docs/ai/prompts/` (inkl. `output-format.md`)
- `docs/ai/evaluation.md` (Quickstart Scorecard)
- `how-to-use.md` (+ EN, wenn ihr bilingual seid)

---

## 3) Was du im WordPress-Kontext konkret anpasst
### `docs/ai/repo_context.md` (Pflicht)
Ergänze mindestens:
- Projektziel(e)
- Architektur: Theme/Plugin-Struktur, wichtige Ordner
- Setup: lokale Umgebung, Composer/npm, Docker/Lando, etc.
- Deployment/Release (falls vorhanden)
- Definition of Done (Tests/Lint/CI)

### `docs/ai/constraints.md` (Pflicht)
Projekt-spezifische Guardrails, z. B.:
- PHP-Version / Coding Standards (PHPCS)
- Sicherheitsregeln (keine Secrets, keine Remote Calls ohne Freigabe)
- Test-Anforderungen (mind. `composer test` oder WP-CLI checks)

---

## 4) Mini‑PoC: 2 Aufgaben, die sofort Mehrwert zeigen
Siehe:
- `tasks/01-documentation-gap-review.md`
- `tasks/02-safe-small-diff-suggestion.md`

---

## 5) Erfolgskriterium (PoC)
- Eine fremde Person/LLM kann nach 5–10 Minuten:
    - sagen, worum es geht,
    - welche Regeln gelten,
    - und einen kleinen, sicheren PR-Vorschlag machen.