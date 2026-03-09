# Legacy Playbook (AARRS) — EN (synced)

This document helps (especially junior devs) navigate **grown/legacy codebases** quickly and make changes that are **safe, small, and reviewable**.

> **Canonical:** German (`legacy-playbook.md`) is the source of truth.  
> **Sync:** Update this file when the DE version changes.

---

## 1) Goal: “Move safely without understanding everything”
You do not need to understand the entire system to make a good change.  
You only need enough context to:
- slice scope cleanly,
- identify risks,
- keep changes reviewable.

---

## 2) Quickstart: 15-minute orientation checklist
1. Read `docs/ai/repo_context.md` (goals/non-goals, architecture, conventions).
2. Read `docs/ai/constraints.md` (small diffs, secrets, traceability).
3. Find the execution entry point for your task:
    - where is the code **called**?
    - where are the **boundaries** (modules/packages/folders)?
4. Create a short note (in issue/PR or backlog):
    - **What will I change?**
    - **What will I explicitly not change?**
    - **Which risks/side effects** do I suspect?

---

## 3) Common legacy traps (and how to reduce risk)
### 3.1 Implicit contracts
Legacy code often has “invisible rules” (formats, globals, ordering).
- Treat every assumption as a risk until verified.
- Document assumptions explicitly (see output format: Assumptions).

### 3.2 Side effects & global state
- Look for: globals, singletons, statics, config reads, caches, hidden I/O
- If unsure: start with **docs/tests/logging** only.

### 3.3 Copy/paste structures
- Do not “clean up everything” first.
- Improve one spot, then extract a pattern.

### 3.4 Unclear ownership
- If it’s unclear who owns an area: ask before refactoring.

---

## 4) How to slice tasks into “small diffs” (practical)
**Default:** ≤3 files and ≤150 LOC (see `docs/ai/constraints.md`).

Good diff types for legacy:
1. **Docs-only fix:** context/setup/glossary/decision log
2. **Observability diff:** improve logging/tracing to understand behavior
3. **Safety diff:** guardrails, null checks, better error messages
4. **Strangler step:** add a small new function and delegate from old path (no big bang)
5. **Test harness:** minimal test that “freezes” current behavior

---

## 5) Definition of done (for legacy PRs)
At minimum:
- [ ] PR is a small diff (or justified if larger)
- [ ] risks/trade-offs are stated
- [ ] assumptions are explicit
- [ ] rollback note for higher-risk changes
- [ ] docs/links updated if “entry points” changed

---

## 6) When to stop and ask
Stop if:
- you touch security-relevant areas (auth, payments, PII, secrets)
- you see unexpected behavior you can’t explain
- you need a bigger-than-small diff without a solid justification
- you’d have to change core architecture/structure

Then:
- ask 3–7 focused questions
- propose 2–3 options with risks