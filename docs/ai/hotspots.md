# Hotspots (AARRS) — generated

Diese Datei sammelt **best-effort** Hinweise auf potenzielle Baustellen/Hotspots.
Sie basiert auf `docs/ai/inventory.json` und ersetzt kein Profiling — sie hilft beim **Priorisieren**.

<!-- AARRS:hotspots:start -->
## Heuristische Hotspots

### 1) Validation gap
- Signal: Tests/CI nicht erkannt oder unklar
- Risiko: Änderungen (insb. Performance/Refactoring) sind schwer abzusichern
- Next step: “Minimum one check” in `docs/ai/repo_context.md` ergänzen

### 2) Many modules / extensions
- Signal: viele Plugins/Themes/Module-Verzeichnisse
- Risiko: hohe Side-Effect-Wahrscheinlichkeit, Ownership unklar
- Next step: Ownership + Hot paths in `docs/ai/repo_context.md` dokumentieren

### 3) Build / tooling split
- Signal: composer + node + containers gemischt
- Risiko: “works on my machine”, schwer reproduzierbar
- Next step: Local setup + “golden path” in `docs/ai/repo_context.md`
<!-- AARRS:hotspots:end -->