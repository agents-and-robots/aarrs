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

## 2) Schnellstart: 15 Minuten Orientierung (Checkliste)
1. Lies `docs/ai/repo_context.md` (Ziele/Nicht‑Ziele, Architektur, Konventionen).
2. Lies `docs/ai/constraints.md` (small diffs, secrets, traceability).
3. Finde den Einstiegspunkt für deine Aufgabe:
    - Wo wird der Code **aufgerufen**?
    - Wo sind die **Grenzen** (Module/Packages/Ordner)?
4. Erstelle eine Mini-Notiz (in Issue/PR oder im Backlog):
    - **Was ändere ich?**
    - **Was ändere ich bewusst nicht?**
    - **Welche Risiken/Side Effects** vermute ich?

---

## 3) Typische Legacy-Fallen (und wie du sie entschärfst)
### 3.1 Implizite Verträge
Legacy-Code hat oft “unsichtbare Regeln” (Parameterformate, globale States, Reihenfolgen).
- Behandle jede Annahme als Risiko, bis du sie verifiziert hast.
- Dokumentiere Annahmen explizit (siehe Output-Format: Assumptions).

### 3.2 Side Effects & Global State
- Suche nach: globals, singletons, statics, config reads, caches, hidden I/O
- Wenn du nicht sicher bist: ändere zunächst **nur Doku/Tests/Logging**.

### 3.3 Copy/Paste‑Strukturen
- Nicht sofort “aufräumen”.
- Erst: eine Stelle verbessern, dann Muster ableiten.

### 3.4 Unklare Ownership
- Wenn unklar ist, wer etwas “besitzt”: lieber fragen, statt refactoren.

---

## 4) Wie du Aufgaben in “Small Diffs” schneidest (praktisch)
**Default:** ≤3 Dateien und ≤150 LOC (siehe `docs/ai/constraints.md`).

Bewährte Diff-Arten für Legacy:
1. **Docs-only Fix:** Kontext/Setup/Glossar/Decision log
2. **Observability Diff:** Logging/Tracing verbessern, um Verhalten zu verstehen
3. **Safety Diff:** Guardrails, Null-Checks, bessere Fehlermeldungen
4. **Strangler Step:** neue kleine Funktion + alten Pfad nur delegieren (kein Big Bang)
5. **Test Harness:** minimaler Test, der aktuelles Verhalten “einfriert”

---

## 5) Definition of Done (für Legacy‑PRs)
Mindestens:
- [ ] PR ist small diff (oder begründet größer)
- [ ] Risiken/Trade-offs sind genannt
- [ ] Annahmen sind explizit
- [ ] Rollback‑Hinweis bei höherem Risiko
- [ ] Doku/Links aktualisiert, wenn sich “Entry Points” ändern

---

## 6) Wann du stoppen und fragen solltest
Stoppe, wenn:
- du sicherheitsrelevante Bereiche berührst (Auth, Payments, PII, Secrets)
- du unerwartetes Verhalten siehst, das du nicht erklären kannst
- du mehr als “small diff” brauchst und keine gute Begründung hast
- du Core-Architektur/Struktur ändern müsstest

Dann:
- stelle 3–7 gezielte Fragen
- schlage 2–3 Optionen mit Risiken vor