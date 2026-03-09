# Example: WordPress “AARRS-ready” (Integration Kit) — EN

This example shows how to integrate AARRS into an existing WordPress project in a **minimal, non-invasive** way—without forking or vendoring WordPress itself.

**Goal:** In <30 minutes, add structure so humans and LLMs can:
- build context faster,
- produce safer suggestions,
- and deliver reproducible “small diffs”.

> DE is canonical. This EN file is synced with `README.md`.

---

## 1) What you end up with (Outcome)
Your WordPress project gets an additional folder:

- `docs/ai/` (context, guardrails, prompts, evaluation)

And two root entry points:

- `how-to-use.md` (project-specific entry)
- `README.md` linking to the AI hub

---

## 2) Minimal file plan (what to copy into the target repo)
Copy from this AARRS repo into your WordPress repo:

- `docs/ai/README.md`
- `docs/ai/README-EN.md` (optional but recommended)
- `docs/ai/repo_context.md` → **must be adapted**
- `docs/ai/constraints.md` (+ optional `constraints-EN.md`)
- `docs/ai/instruction-priority.md` (+ EN)
- `docs/ai/prompts/` (including `output-format.md`)
- `docs/ai/evaluation.md` (quickstart scorecard)
- `how-to-use.md` (+ EN if you are bilingual)

---

## 3) What to adapt for a WordPress context
### `docs/ai/repo_context.md` (required)
At minimum add:
- project goal(s)
- architecture: theme/plugin layout, key directories
- setup: local environment, Composer/npm, Docker/Lando, etc.
- deployment/release (if relevant)
- definition of done (tests/lint/CI)

### `docs/ai/constraints.md` (required)
Add project-specific guardrails, e.g.:
- PHP version / coding standards (PHPCS)
- security rules (no secrets, no remote calls without approval)
- test requirements (at least `composer test` or WP-CLI checks)

---

## 4) Mini PoC: 2 tasks that show immediate value
See:
- `tasks/01-documentation-gap-review.md`
- `tasks/02-safe-small-diff-suggestion.md`

---

## 5) PoC success criteria
A stranger/LLM can after 5–10 minutes:
- explain what’s going on,
- follow the rules,
- and propose a small, safe PR.