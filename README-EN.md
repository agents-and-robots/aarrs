# AARRS (AI‑Assistant‑Ready Repository Specification)

AARRS is a **core template** (a thought-starter + toolbox) that helps you extend GitHub repositories so that AI assistants (and humans) can **understand them faster, improve them more safely, and document them more consistently**.

> Focus: **integration into existing repos** (e.g., WordPress, Magento) — not a showcase repo.

## Why?
AI is only as good as its context. Many repositories miss:
- a clear entry point (“How does this repo work?”),
- explicit rules/constraints,
- reusable role prompts,
- machine-readable metadata.

AARRS provides a minimal, extensible structure to fix that.

## Quickstart
1. Start here: `docs/ai/README.md` (German) or `docs/ai/README-EN.md`
2. Repo context: `docs/ai/repo_context.md`
3. Guardrails: `docs/ai/constraints.md`
4. Backlog: `backlog.md`

## What’s in this repo?
- `docs/ai/` – AI hub: context, constraints, prompts
- `templates/` – copy/paste artifacts for downstream repos
- `examples/` – minimal examples/integrations
- `tools/` – later: audit/score/init (optional)
- `docs/research/` – research notes (A/B/C/D)
- `docs/design/` – architecture and decision log

## Non-goals
- Not a mandatory “one standard for all”.
- No vendor lock-in.
- No automation for automation’s sake (Actions are optional).

## Status
MVP / iteration. See `backlog.md` and `GitHub-Actions-ToDo.md`.