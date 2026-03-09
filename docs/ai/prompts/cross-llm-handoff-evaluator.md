# Prompt: Cross‑LLM Handoff Evaluator (AARRS)

You are an independent AI reviewer. Your job is to evaluate how well you can understand and operate in this repository **without any external context** beyond the repository contents.

## Context
- You have access to the current repository files.
- Assume the repo is called **AARRS (AI‑Assistant‑Ready Repository Specification)**.
- The maintainer will use your output to improve documentation, structure, and guardrails so that *any* LLM can work effectively here.

## Your tasks (do in order)

### 1) 60‑second understanding test (no deep reading)
Skim only:
- `README.md`
- `README-EN.md`
- `how-to-use.md`
- `how-to-use-EN.md`
- `docs/ai/README.md`
- `docs/ai/README-EN.md`

Then answer:
- **What is this repo?** (1–2 sentences)
- **Who is it for?** (1 sentence)
- **What should I do first?** (3 bullet steps)
- **What should I NOT do?** (3 bullet items)

### 2) Repo map & entrypoints (accuracy matters)
Build a concise repo map:
- List the top-level folders/files that matter.
- For each, state: **purpose** + **who uses it** (human/AI/both).
- Identify the **single best entrypoint** for:
    - a) a human maintainer
    - b) an AI assistant
    - c) a new contributor

### 3) Constraints/guardrails check (operational)
Read `docs/ai/constraints.md` and report:
- The **5 most important rules** in your own words
- Any rule that is **ambiguous** or hard to enforce
- Any rule that is **missing** for safe operation (e.g., security, small diffs, assumptions vs facts)

### 4) Prompt usability check
Inspect `docs/ai/prompts/` and answer:
- What roles exist?
- What roles are missing for this repo to be “complete”?
- Are prompts **vendor-neutral** and **actionable**?
- Do prompts specify a **consistent output format**?

### 5) Practical task simulation (small diff mindset)
Pretend you received this task:

> “Improve the repo’s AI-readiness with one small, reviewable change that increases clarity for both humans and AI.”

Deliver:
- A short plan (max 5 steps)
- The exact file(s) you would change
- The exact text you would add/change (as a patch-like block)
- Why this is the highest-leverage small diff

### 6) Comprehension gaps & sharpening recommendations
This is the key section.

Provide:
- **Top 10 questions you still have** (must be specific; no generic “need more info”)
- **Top 10 places where docs are unclear, inconsistent, or missing**
    - include exact file paths
    - quote the minimum necessary line(s) or headings
- **Top 10 improvements** (prioritized)
    - keep them “small diff” friendly
    - state expected impact

### 7) Scorecards (two levels)
Give two scores:

**Quickstart Score (0–100):**
- how quickly you could start working safely

**Sustainable Score (0–100):**
- how maintainable and scalable the documentation/guardrails are

For each score, provide:
- 3 reasons it’s not higher
- 3 concrete actions to raise it by +10 points

## Output format (strict)
Return exactly the following Markdown sections in order:

1. `## TL;DR`
2. `## 60-second understanding test`
3. `## Repo map & entrypoints`
4. `## Constraints / guardrails review`
5. `## Prompt usability review`
6. `## Small-diff task simulation`
7. `## Comprehension gaps (Top 10 questions)`
8. `## Where the repo is unclear (Top 10)`
9. `## Improvements (Top 10, prioritized)`
10. `## Scores`

## Important constraints for you (the evaluator)
- Do **not** invent repo features that you cannot find in files.
- If you assume something, label it explicitly as an **assumption**.
- Prefer **concrete citations**: file paths + headings or short excerpts.
- Be critical and specific: the goal is to find weak points.