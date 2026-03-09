# Prompt: “Codex, hast du es verstanden?” (AARRS Understanding Check)

Du bist **Codex** (oder ein anderes LLM) mit Zugriff auf das aktuelle Repository.  
Ziel ist ein **Abgleich**, ob das Repo so dokumentiert ist, dass ein fremdes LLM schnell, sicher und strukturiert damit arbeiten kann (Junior‑Dev/Legacy‑Kontext).

## Aufgabe
Beantworte:
1) **Hast du es verstanden?** (Ja/Nein/Teilweise)
2) **Was hast du verstanden?** (kurz, aber konkret)
3) **Was ist unklar oder widersprüchlich?** (mit Evidenz)
4) **Was würdest du als nächstes verbessern?** (small diffs)

## Pflicht: Was du lesen musst (in dieser Reihenfolge)
1. `README.md`
2. `how-to-use.md`
3. `docs/ai/README.md`
4. `docs/ai/repo_context.md`
5. `docs/ai/constraints.md` (plus optional `constraints-EN.md`)
6. `docs/ai/instruction-priority.md`
7. `docs/ai/legacy-playbook.md`
8. `docs/ai/prompts/README.md`
9. `docs/ai/prompts/output-format.md`
10. `docs/ai/prompts/implementer.md`

> Optional (wenn vorhanden/aktuell): `docs/ai/prompts/cross-llm-handoff-evaluator.md`

## Wichtige Regeln für deine Antwort
- **Nicht halluzinieren.** Wenn du etwas nicht findest: sag das.
- Jede Kritik muss **Evidenz** enthalten: *Dateipfad + Überschrift* oder ein sehr kurzer Auszug.
- Markiere Annahmen explizit als **Assumption:**.
- Denke “Junior‑Dev in Legacy”: Fokus auf Orientierung, Sicherheit, small diffs, Planbarkeit.

---

## Output-Format (STRICT)
Bitte liefere exakt diese Markdown-Sections in genau dieser Reihenfolge:

### 1) `## TL;DR (1 minute)`
- 5 Bulletpoints: Was ist AARRS und wie nutzt man es?
- 1 Satz: “Habe ich es verstanden?” (Ja/Nein/Teilweise + warum)

### 2) `## What I understood (concrete)`
Beantworte in **max. 12 Bulletpoints**:
- Repo-Ziel (1–2 bullets)
- Zielgruppe (1 bullet)
- Was ist das minimale Setup in einem Ziel-Repo? (3–5 bullets)
- Wie arbeitet KI hier korrekt? (3–5 bullets)

### 3) `## First-run simulation (Implementer role)`
Simuliere einen “Erstlauf” als Implementer:
- Welche 5 Dateien öffnest du als erstes (in Reihenfolge) und warum?
- Welche 5 Fragen würdest du dem Maintainer stellen, bevor du Änderungen vorschlägst?

### 4) `## Confusion & contradictions (Top 10)`
Liste die Top 10 Stellen, die dich verwirren oder zu inkonsistentem Verhalten führen könnten.
Für jeden Punkt:
- Evidence: `path` + heading/excerpt
- Warum ist das problematisch?
- Small-diff Fix (1–2 Sätze)

### 5) `## Missing pieces (Top 10)`
Was fehlt für ein robustes, sicheres Arbeiten?
- Evidence/Reasoning (wenn “missing”: wo hättest du es erwartet?)
- Small-diff Vorschlag

### 6) `## Next 5 small diffs (prioritized)`
Eine priorisierte Liste (1 = höchster Hebel) mit:
- Change summary
- File(s)
- Expected impact

### 7) `## Scores`
Gib zwei Scores (0–100):
- **Quickstart score** (wie schnell kann ein fremdes LLM sicher loslegen?)
- **Legacy-readiness score** (wie gut unterstützt es Legacy & Junior‑Devs?)

Für jeden Score:
- 3 Gründe, warum nicht höher
- 3 konkrete Aktionen für +10 Punkte

---

## Bonus: “One line”
Beantworte zuletzt (eine Zeile):
> “Wenn ich nur einen Satz auf LinkedIn hätte, um AARRS zu erklären, wäre es: …”