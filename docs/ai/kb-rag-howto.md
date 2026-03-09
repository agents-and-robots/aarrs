# KB / RAG How-to (AARRS)

Ziel: Die erzeugten `docs/ai/*` Dateien so verwenden, dass ein Custom GPT oder eine interne Wissensdatenbank
**konkret und repo-spezifisch** Antworten liefern kann (“next steps”, “baustellen”, “custom extensions”).

## Was du hochlädst (Minimum)
- `docs/ai/repo_context.md`
- `docs/ai/constraints.md`
- `docs/ai/inventory.json`
- `docs/ai/next-steps.md`
- optional: `docs/ai/hotspots.md`, `docs/ai/legacy-playbook.md`

## Warum `inventory.json` das Herzstück ist
- es enthält **facts** (Paths, Module) + **deterministische IDs**
- es verhindert Raten (“wo liegen customizations?”)

## Beispiel-Fragen (für Custom GPT)
1. “Welche Module/Extensions sind custom und wo liegen sie?”
2. “Was sind die 5 größten Risiken, wenn ich Plugin X optimiere?”
3. “Welche Validierung ist minimal nötig, bevor ich Refactoring in Bereich Y mache?”
4. “Gib mir einen small-diff Plan (≤3 Dateien, ≤150 LOC) um Hotspot Z zu entschärfen.”

## Betriebsmodus (empfohlen)
- Nach größeren Änderungen: `php tools/aarrs-init.php` erneut laufen lassen
- Änderungen in `repo_context.md` bleiben erhalten; nur Marker-Blöcke werden aktualisiert.