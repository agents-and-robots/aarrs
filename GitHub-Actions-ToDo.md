# GitHub Actions – ToDo (AARRS)

Ziel: optionale Automatisierung bereitstellen (nicht sofort aktivieren), die AARRS-typische Checks ermöglicht.

## Kandidaten-Workflows

- [ ] Repo Health Check
    - [ ] Vorhandensein von Kern-Dateien prüfen (`.aarrs.yaml`, `docs/ai/*`, `backlog.md`)
    - [ ] Summary im Job-Report ausgeben

- [ ] AI-Readiness Score (lightweight)
    - [ ] einfachen Score aus Checklistenpunkten berechnen
    - [ ] optional PR-Kommentar

- [ ] Docs Lint
    - [ ] Markdown-Lint / Link-Check

- [ ] Template Integrity
    - [ ] `templates/`-Konsistenz prüfen (keine kaputten Referenzen)

## Später (nice-to-have)
- [ ] weekly audit (cron)
- [ ] Auto-open Issue wenn Score sinkt
- [ ] Prompt regression tests (Golden files)