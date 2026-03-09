# Tools (AARRS)

Optional area for scripts/CLI tools.

## Tools
- `aarrs-init.php`: generates/updates an AI onboarding bundle under `docs/ai/` (inventory, repo context, next steps)

## Principle
Tools are **optional**. AARRS should still be useful without any tooling.

## Quickstart
```bash
php tools/aarrs-init.php
# Preview only:
php tools/aarrs-init.php --dry-run
# Bilingual output:
php tools/aarrs-init.php --bilingual