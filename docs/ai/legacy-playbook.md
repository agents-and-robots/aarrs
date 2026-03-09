# Legacy Playbook (AARRS) — DE (canonical)

Dieses Dokument hilft (vor allem Junior‑Devs), in **gewachsenem/Legacy-Code** schnell Orientierung zu bekommen und Änderungen **sicher, klein und nachvollziehbar** zu machen.

> **Canonical:** Deutsch ist maßgeblich.  
> **EN-Sync:** `legacy-playbook-EN.md` bei Änderungen mitziehen.

---

## 1) Ziel: “Sicher bewegen, ohne alles zu verstehen”
Du musst nicht das ganze System verstehen, um eine gute Änderung zu machen.  
Du brauchst nur genug Kontext, um:
- **Scope** sauber zu schneiden,
- **Risiken** zu erkennen,
- und Änderungen **reviewbar** zu halten.

---

## 2) 15‑Minuten Orientierung (Checkliste)
1. Lies `docs/ai/repo_context.md` (Ziele/Nicht‑Ziele, Architektur, Konventionen).
2. Lies `docs/ai/constraints.md` (small diffs, secrets, traceability).
3. Lies `docs/ai/instruction-priority.md`, falls Anweisungen kollidieren.
4. Finde den Einstiegspunkt für deine Aufgabe:
    - Wo wird der Code **aufgerufen**?
    - Wo sind die **Grenzen** (Module/Packages/Ordner)?
5. Schreibe eine Mini-Notiz (Issue/PR/Backlog):
    - **Was ändere ich?**
    - **Was ändere ich bewusst nicht?**
    - **Welche Side Effects** vermute ich?

---

## 3) Typische Legacy-Fallen (und Gegenmaßnahmen)
### 3.1 Implizite Verträge
Unsichtbare Regeln (Formate, Reihenfolge, globale Abhängigkeiten).
- Jede Vermutung ist eine **Annahme**, bis du sie verifiziert hast.
- Annahmen explizit markieren (siehe Prompt-Output-Format: *Assumptions*).

### 3.2 Side Effects & Global State
- Achte auf: globals, singletons, statics, caches, hidden I/O, config reads.
- Wenn du nicht sicher bist: starte mit **Docs/Tests/Logging**.

### 3.3 “Nur kurz aufräumen”
- Legacy liebt “nur kurz…”. Genau das eskaliert.
- Erst: eine Stelle verbessern. Dann Muster ableiten.

### 3.4 Ownership unklar
- Wenn unklar ist, wer ein Modul “besitzt”: fragen statt refactoren.

---

## 4) Aufgaben in Small Diffs schneiden (praktisch)
**Default:** ≤3 Dateien, ≤150 LOC (added+deleted). (Siehe `docs/ai/constraints.md`)

Gute Legacy‑Diff‑Typen:
1. **Docs-only:** Setup/Glossar/Architektur-Notiz/Decision log
2. **Observability:** Logging/Tracing, um Verhalten sichtbar zu machen
3. **Safety:** bessere Fehler, Guardrails, Null-Checks
4. **Strangler step:** neue kleine Funktion, alter Pfad delegiert nur
5. **Test harness:** minimaler Test, der aktuelles Verhalten festhält

---

## 5) “Definition of Done” für Legacy‑PRs
- [ ] Small diff (oder begründet größer)
- [ ] Risiken/Trade-offs genannt
- [ ] Annahmen explizit
- [ ] Validierungsschritt genannt (auch wenn nur “manuell geprüft”)
- [ ] Rollback-Hinweis bei höherem Risiko
- [ ] Links/Doku nachgezogen, falls Entry Points betroffen sind

---

## 6) Stop‑Kriterien (“Frag lieber”)
Stoppe, wenn:
- Security/PII/Secrets betroffen sind
- Verhalten unerwartet ist und du es nicht erklären kannst
- du über “small diff” hinaus musst und keine saubere Begründung hast
- du Core-Struktur/Architektur ändern müsstest

Dann:
- 3–7 gezielte Fragen stellen
- 2–3 Optionen mit Risiken vorschlagen