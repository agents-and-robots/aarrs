# Tools (AARRS)

Optionaler Bereich für Skripte/CLI-Tools.

## Ziele (geplant)
- `audit`: prüft, ob AARRS-Kern-Dateien vorhanden und konsistent sind
- `score`: berechnet eine einfache AI-Readiness-Scorecard
- `init`: initialisiert AARRS-Struktur in einem Ziel-Repo (non-destructive)

## Prinzip
Tools sind **optional**. AARRS soll auch ohne Tooling funktionieren.

# Tools (AARRS)

Optionaler Bereich für Skripte/CLI-Tools.

## Tools
- `aarrs-init.php`: erstellt/aktualisiert ein AI-Onboarding-Paket in `docs/ai/` (Inventory, Repo Context, Next Steps)

## Prinzip
Tools sind **optional**. AARRS soll auch ohne Tooling funktionieren.

## Quickstart
```bash
php tools/aarrs-init.php
# Preview only:
php tools/aarrs-init.php --dry-run
# Bilingual output:
php tools/aarrs-init.php --bilingual
```

## English version
See `README-EN.md`.