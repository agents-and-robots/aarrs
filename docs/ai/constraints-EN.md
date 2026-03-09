# Constraints / Guardrails (AARRS) — EN (synced)

Short rules for humans & AI to keep contributions consistent, safe, and reusable.

> **Language:** German (`constraints.md`) is canonical. This EN file is synced and should be updated when DE changes.

## Must
- **Template-first:** Changes must be reasonably integratable downstream (e.g., WordPress/Magento).
- **Vendor-neutral:** Avoid provider/model lock-in in wording and structure.
- **Small diffs (default):** Prefer small, reviewable changes over big restructures.  
  **Default threshold (no extra justification needed):**
    - ≤ **3 files** changed **and**
    - ≤ **150 LOC** (added+deleted)  
      If above: briefly justify (why needed, risks, rollback).
- **Traceability:** Larger decisions belong in `docs/design/decision-log.md` (short, explicit).

## Must not
- No breaking changes to the core structure without a prior plan in the backlog/roadmap.
- No “magic” auto-fixes without explanation (always include why + trade-offs).
- No **secrets/PII** in issues, commits, docs, or prompts. Never paste tokens/passwords/API keys.

## Quality bar
- Files should be **clearly named**, **discoverable**, and have a **short intro** (often 1–3 sentences is enough).
- If something is unclear: **write down open questions** instead of guessing.
- **Facts vs assumptions:** back facts with repo paths/sections when possible; mark assumptions explicitly.

## Decision-log triggers (rule of thumb)
Write a short entry in `docs/design/decision-log.md` when:
- introducing/changing guardrails (“Must/Must not”)
- changing governance/priority rules (`docs/ai/instruction-priority*.md`)
- changing the core folder/file structure
- changing template approaches that affect downstream repos