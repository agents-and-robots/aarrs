# How to use AARRS (EN)

This document is the **practical entry point**: what to do with AARRS if you want to make an existing repo (e.g., WordPress/Magento) more AI‑ready.

**Language:** German (`how-to-use.md`) is the **canonical** version.  
**Sync policy:** When `how-to-use.md` changes, **update this file** (`how-to-use-EN.md`) accordingly.

---

## 1) Who is this for?
- Maintainers using AI for **reviews, docs, refactoring, planning**
- Teams that want faster onboarding and more consistent contributions
- Tool builders who want to build checklists/workflows on top

---

## 2) What is AARRS (in 3 sentences)?
AARRS is a **core template** for repo structure and documentation that helps AI assistants build correct context quickly.  
It is **vendor-neutral** (no provider lock-in) and optimized for **small diffs**.  
The goal is safer AI suggestions and less maintainer overhead.

---

## 3) Quickstart (5 minutes)
1. Read: `README.md`
2. Open the AI hub: `docs/ai/README-EN.md`
3. Context: `docs/ai/repo_context.md`
4. Guardrails: `docs/ai/constraints.md`
5. Prompts: `docs/ai/prompts/` (e.g., `researcher.md`)
6. Next steps: `backlog.md`

---

## 4) Integrating into an existing repo (recommended flow)
> Goal: integrate **minimally**, without “rebuilding” the repo.

### Step A — Copy the AI hub
Copy/adapt into `<target-repo>/docs/ai/`:
- `docs/ai/README.md`
- `docs/ai/repo_context.md`
- `docs/ai/constraints.md`
- `docs/ai/prompts/*`

**Then adapt:**
- `repo_context.md`: architecture, goals/non-goals, conventions, tools, build/run
- `constraints.md`: security, CI, review rules, definition of done

### Step B — Establish “prompts as roles”
Define at least one role, e.g.:
- Reviewer (risks/trade-offs)
- Documenter (consistent docs)
- Implementer (small PRs)

### Step C — Use the scorecard (quick PoC impact)
Fill out `docs/ai/evaluation.md`:
- identify top 3 gaps
- derive 1–2 “small diffs”
- re-check the score

---

## 5) How to use AARRS in issues/PRs (templates)
### Issue intake (short)
- Goal:
- Context/links:
- Constraints (e.g., “no breaking changes”, “vendor-neutral”):
- Expected output (e.g., plan + diff proposal):
- Open questions:

### PR checklist (minimal)
- [ ] Small diff, reviewable
- [ ] Changes are downstream-friendly
- [ ] Links/README updated (if needed)
- [ ] Decision documented (if relevant)

---

## 6) Anti-patterns (avoid)
- Large restructures without a plan/backlog
- Provider/tool-specific instructions in core docs
- Stating assumptions as facts
- “Magic” auto-fixes without explanation

---

## 7) What’s next (roadmap hint)
- Use `docs/ai/evaluation-preview.md` as the “vision” checklist
- Actively use `docs/design/decision-log.md`
- Optional: GitHub Action “Repo Health Check” (read/verify only, no auto-fix)