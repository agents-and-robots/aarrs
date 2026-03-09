# Templates (AARRS)

This folder contains the part of AARRS that you can **copy into an existing repository**.

## Goal
- provide a minimal, vendor-neutral AI-readiness bundle
- without forcing a major refactor of the target repo
- with clear entry points for humans and AI

## Contents (planned)
- `docs/ai/*` bundle (context, constraints, prompts)
- optional GitHub Actions (only if desired)
- example checklists/scorecards

## Integration (high-level)
1. Copy the desired files into your repo
2. Adapt `docs/ai/repo_context.md` (goals/non-goals, architecture, conventions)
3. Adapt `docs/ai/constraints.md` (team rules, CI, security)
4. Optionally extend prompts with domain-specific roles (e.g., “Magento Extension Reviewer”)

## Note
This is a template approach / thought starter, not a mandatory standard.