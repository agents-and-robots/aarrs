# Prompts (AARRS)

These prompts are **role templates** aimed at producing consistent, repeatable outputs (less “prompt luck”).

## How to use
1. Pick a role (e.g., `researcher.md`)
2. Read repo context (`../repo_context.md`)
3. Read constraints (`../constraints.md`)
4. Apply the shared output structure in `output-format.md`
5. Execute the task and format the output as specified

## Shared output format
- `output-format.md` defines one standard Markdown structure for all roles.
- Role prompts may add extra sections, but should not remove the required sections.

## Roles (planned)
- `researcher.md` – extract patterns/best practices, write reports
- `reviewer.md` – review against guardrails, highlight risks & trade-offs
- `documenter.md` – create/update docs consistently
- `implementer.md` – propose small, safe changes with a plan
