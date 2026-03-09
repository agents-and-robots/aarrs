# Instruction Priority & Language Policy (AARRS) — DE (canonical)

Dieses Dokument definiert:
1) **Welche Anweisungen bei Konflikten gelten** (Priorität / Quelle der Wahrheit)
2) **Sprachregeln** für DE/EN Dokumente (Drift vermeiden)

> **Canonical:** Diese DE-Version ist maßgeblich.  
> **EN-Sync:** `instruction-priority-EN.md` muss bei Änderungen mitgezogen werden.

---

## 1) Priorität bei widersprüchlichen Anweisungen
Wenn zwei Dokumente sich widersprechen, gilt folgende Reihenfolge (höchste Priorität zuerst):

1. `docs/ai/constraints.md`  
   **Guardrails / Must / Must not** — Sicherheits- und Qualitätsregeln.
2. `docs/ai/repo_context.md`  
   Zweck, Ziele/Nicht‑Ziele, Arbeitsweise.
3. `how-to-use.md`  
   Praktischer Ablauf und Integration in Downstream-Repos.
4. `docs/ai/README.md`  
   Einstieg/Navigation (welche Datei zuerst).
5. `docs/ai/prompts/output-format.md`  
   Einheitliches Ausgabeformat (für alle Rollen).
6. Rollenprompts unter `docs/ai/prompts/*.md`  
   Konkrete Arbeitsanweisung pro Rolle.
7. `README.md` (Root) / weitere README-Dateien  
   Orientierung und Überblick.

**Regel:** Bei Konflikt immer:
- höhere Priorität befolgen,
- Konflikt kurz dokumentieren (siehe Abschnitt 4),
- und einen “small diff” vorschlagen, um die Doku zu harmonisieren.

---

## 2) Sprachregeln (DE canonical / EN synced)
### 2.1 Grundsatz
- **Deutsch ist canonical** (entscheidend), wenn nicht anders angegeben.
- Englisch ist **gleichwertig als Einstieg**, muss aber bei Änderungen **nachgezogen** werden, wenn eine Datei als “synced” markiert ist.

### 2.2 Synced-Dateien (müssen gemeinsam gepflegt werden)
Bei Änderungen an einer der Dateien bitte prüfen/aktualisieren:

- `README.md` ↔ `README-EN.md`
- `how-to-use.md` ↔ `how-to-use-EN.md`
- `docs/ai/README.md` ↔ `docs/ai/README-EN.md`
- `docs/ai/prompts/README.md` ↔ `docs/ai/prompts/README-EN.md`
- `docs/ai/instruction-priority.md` ↔ `docs/ai/instruction-priority-EN.md`
- `docs/ai/evaluation-preview.md` ↔ `docs/ai/evaluation-preview-EN.md`

> `docs/ai/constraints-EN.md` existiert als synced EN-Version. Bei Änderungen an `constraints.md` bitte `constraints-EN.md` mitziehen.

### 2.3 Wenn EN (noch) nicht nachgezogen wurde
Wenn du Inhalte nur in DE aktualisieren kannst:
- markiere in der EN-Datei am Anfang: `> ⚠️ Needs sync with DE version (YYYY-MM-DD)`
- erstelle einen Backlog-Eintrag.

---

## 3) Fakten vs. Annahmen (Mini-Regel)
- **Fakten** sollen, wenn möglich, auf Repo-Dateien verweisen (Pfad/Abschnitt).
- **Annahmen** müssen explizit als Annahme markiert werden.
- Wenn etwas unklar ist: **Fragen stellen statt raten**.

---

## 4) Konflikte & Drift dokumentieren (leichtgewichtig)
Wenn du einen Konflikt findest:
1. Notiere ihn als Bullet in `backlog.md` (small diff, 1–2 Zeilen)
2. Optional: wenn es eine “Policy”-Änderung ist, kurzer Eintrag in `docs/design/decision-log.md`

**Trigger für Decision Log (Daumenregel):**
- neue/angepasste Prioritätsregeln
- Änderung an canonical/sync Policy
- neue “Must/Must not” Guardrail

---

## 5) “Small diff” Standard (Verweis)
Die konkrete Definition von “small diff” gehört in `docs/ai/constraints.md`.  
Wenn dort keine messbaren Schwellenwerte stehen: bitte als nächstes ergänzen.