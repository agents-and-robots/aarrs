# Instruction Priority & Language Policy (AARRS) — EN (synced)

This document defines:
1) **What to do when instructions conflict** (priority / source of truth)
2) **Language rules** for DE/EN docs (to prevent drift)

> **Canonical:** The German version (`instruction-priority.md`) is the source of truth.  
> **Sync:** This EN file must be updated whenever the DE file changes.

---

## 1) Priority when instructions conflict
If two documents conflict, follow this order (highest priority first):

1. `docs/ai/constraints.md`  
   Guardrails / Must / Must not — safety and quality rules.
2. `docs/ai/repo_context.md`  
   Purpose, goals/non-goals, working mode.
3. `how-to-use.md`  
   Practical workflow and downstream integration guidance.
4. `docs/ai/README.md`  
   Entry/navigation (what to read first).
5. `docs/ai/prompts/output-format.md`  
   Shared output contract (all roles).
6. Role prompts under `docs/ai/prompts/*.md`  
   Role-specific instructions.
7. Root `README.md` and other READMEs  
   Orientation and overview.

**Rule:** In case of conflict:
- follow the higher-priority document,
- document the conflict briefly (see section 4),
- propose a small diff to harmonize docs.

---

## 2) Language rules (DE canonical / EN synced)
### 2.1 Principle
- **German is canonical** unless explicitly stated otherwise.
- English is a **first-class entry point**, but must be kept in sync for files marked as “synced”.

### 2.2 Synced files (maintain together)
When changing one file, review/update its counterpart:

- `README.md` ↔ `README-EN.md`
- `how-to-use.md` ↔ `how-to-use-EN.md`
- `docs/ai/README.md` ↔ `docs/ai/README-EN.md`
- `docs/ai/prompts/README.md` ↔ `docs/ai/prompts/README-EN.md`
- `docs/ai/instruction-priority.md` ↔ `docs/ai/instruction-priority-EN.md`
- `docs/ai/evaluation-preview.md` ↔ `docs/ai/evaluation-preview-EN.md`

> Optional/later: add `docs/ai/constraints-EN.md` for a full EN guardrails version.

### 2.3 If EN is not updated yet
If you can only update DE:
- add at the top of the EN file: `> ⚠️ Needs sync with DE version (YYYY-MM-DD)`
- create a backlog item.

---

## 3) Facts vs assumptions (mini rule)
- **Facts** should reference repo files when possible (path/section).
- **Assumptions** must be marked explicitly.
- If unclear: **ask questions instead of guessing**.

---

## 4) Document conflicts & drift (lightweight)
When you find a conflict:
1. Add a short bullet to `backlog.md` (small diff, 1–2 lines)
2. Optionally: if it changes policy, add a short entry to `docs/design/decision-log.md`

**Decision log triggers (rule of thumb):**
- new/changed priority rules
- changes to canonical/sync policy
- new “Must/Must not” guardrails

---

## 5) “Small diff” standard (reference)
The measurable definition of “small diff” should live in `docs/ai/constraints.md`.  
If it’s not measurable yet: add it next.