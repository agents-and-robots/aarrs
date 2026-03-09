# Legacy Playbook (AARRS) — EN (synced)

This document helps (especially junior devs) navigate **grown/legacy code** quickly and make changes that are **safe, small, and reviewable**.

> **Canonical:** German (`legacy-playbook.md`) is the source of truth.  
> **Sync:** Update this file when the DE version changes.

---

## 1) Goal: “Move safely without understanding everything”
You don’t need to understand the whole system to make a good change.  
You only need enough context to:
- slice scope cleanly,
- identify risks,
- keep changes reviewable.

---

## 2) 15-minute orientation checklist
1. Read `docs/ai/repo_context.md` (goals/non-goals, architecture, conventions).
2. Read `docs/ai/constraints.md` (small diffs, secrets, traceability).
3. Read `docs/ai/instruction-priority.md` if instructions conflict.
4. Find the entry point for your task:
    - where is the code **called**?
    - where are the **boundaries** (modules/packages/folders)?
5. Write a short note (issue/PR/backlog):
    - **What will I change?**
    - **What will I intentionally not change?**
    - **Which side effects** do I suspect?

---

## 3) Common legacy traps (and mitigations)
### 3.1 Implicit contracts
Invisible rules (formats, ordering, globals).
- Treat every guess as an **assumption** until verified.
- Mark assumptions explicitly (see prompt output format: *Assumptions*).

### 3.2 Side effects & global state
- Watch for: globals, singletons, statics, caches, hidden I/O, config reads.
- If unsure: start with **docs/tests/logging**.

### 3.3 “Just a quick cleanup”
- Legacy loves “just quick…”. That’s how scope explodes.
- Improve one spot first; extract patterns later.

### 3.4 Unclear ownership
- If ownership is unclear: ask before refactoring.

---

## 4) Slicing tasks into small diffs (practical)
**Default:** ≤3 files, ≤150 LOC (added+deleted). (See `docs/ai/constraints.md`)

Good legacy diff types:
1. **Docs-only:** setup/glossary/architecture note/decision log
2. **Observability:** logging/tracing to make behavior visible
3. **Safety:** better errors, guardrails, null checks
4. **Strangler step:** small new function, old path only delegates
5. **Test harness:** minimal test to freeze current behavior

---

## 5) Definition of done for legacy PRs
- [ ] Small diff (or justified if larger)
- [ ] Risks/trade-offs stated
- [ ] Assumptions explicit
- [ ] Validation step stated (even if “manual check”)
- [ ] Rollback note for higher-risk changes
- [ ] Docs/links updated if entry points are affected

---

## 6) Stop criteria (“ask instead”)
Stop if:
- security/PII/secrets are involved
- behavior is unexpected and you can’t explain it
- you need a bigger-than-small diff without a clean justification
- you would have to change core structure/architecture

Then:
- ask 3–7 focused questions
- propose 2–3 options with risks