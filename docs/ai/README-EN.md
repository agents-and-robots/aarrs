# AI Hub (AARRS)

These documents are the **entry point** for humans and AI assistants.

## If you are an AI: how to work here
1. Read `repo_context.md` first.
2. Follow `constraints.md` strictly.
3. Pick a role from `prompts/`.
4. Provide results as **Markdown** (clear, concise, with assumptions & open questions).
5. If unsure: **ask instead of guessing**.

## If you are a human: how to use AARRS
- Treat `docs/ai/*` as a reusable bundle.
- Later copy artifacts from `templates/` into your target repo (e.g., WordPress/Magento).
- Keep rules small, concrete, and auditable.

## Principles
- **Core template:** designed for downstream integration
- **Vendor-neutral:** no provider lock-in
- **Human-in-the-loop:** AI suggests, humans decide
- **Small diffs:** keep changes reviewable
- **Traceability:** document decisions briefly

## Files (short)
- `repo_context.md` – what this is, goals/non-goals, working mode
- `constraints.md` – guardrails: what AI may/may not do
- `prompts/` – role prompts (researcher, reviewer, documenter, …)
- `evaluation.md` – (optional) scorecards/checks for AI readiness