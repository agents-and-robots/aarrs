# CREDITS.md

## Danksagung und Quellen

Dieses Framework entstand nicht im luftleeren Raum. Es ist das Ergebnis einer intensiven Synthese bestehender Ideen, Werkzeuge und Forschungsarbeiten aus den Bereichen KI‑gestützte Softwareentwicklung, Prompt Engineering, LLMOps und Open‑Source‑Best Practices. Wir möchten den Entwickler:innen, Forscher:innen und Communities danken, die mit ihrer Arbeit den Weg für ein „KI‑Assistent‑Ready Repository“ geebnet haben.

Im Folgenden sind die wichtigsten Quellen und Inspirationen aufgeführt, geordnet nach thematischen Kategorien.

---

## 1. KI‑gestützte Entwicklungswerkzeuge (AI‑Powered Coding Tools)

| Projekt           | Beschreibung                                                                                           | Link / Referenz                                        |
|-------------------|-------------------------------------------------------------------------------------------------------|--------------------------------------------------------|
| **aider**         | Kommandozeilen‑Tool, das mit LLMs zusammenarbeitet, um Code zu editieren, Commits zu erstellen und PRs zu verwalten. | [github.com/paul-gauthier/aider](https://github.com/paul-gauthier/aider) |
| **smol developer**| Experimentelles Tool, das aus einer Beschreibung eine komplette Codebasis generiert.                   | [github.com/smol-ai/developer](https://github.com/smol-ai/developer) |
| **gpt‑engineer**  | Generiert Codebasen aus Prompts – einer der Vorreiter der prompt‑getriebenen Entwicklung.               | [github.com/gpt-engineer-org/gpt-engineer](https://github.com/gpt-engineer-org/gpt-engineer) |
| **swe‑agent**     | Agent, der GitHub Issues lösen kann, Basis für viele Folgeprojekte.                                    | [github.com/princeton-nlp/swe-agent](https://github.com/princeton-nlp/swe-agent) |
| **continue**      | Open‑Source‑Autopilot für IDEs, der LLMs in den Entwicklungsfluss integriert.                           | [github.com/continuedev/continue](https://github.com/continuedev/continue) |
| **GitHub Copilot**| Der Pionier der KI‑Pair‑Programmierung, dessen „Code Referencing“‑Feature Einblicke in Kontextverarbeitung gab. | [copilot.github.com](https://copilot.github.com) |

Diese Werkzeuge haben gezeigt, dass LLMs nicht nur Code generieren, sondern auch bestehenden Code verstehen, refaktorieren und dokumentieren können – Grundpfeiler unseres Frameworks.

---

## 2. Agentische Frameworks und Plattformen (Agentic Workflows)

| Projekt / Konzept     | Beschreibung                                                                                         | Link / Referenz                                               |
|-----------------------|-------------------------------------------------------------------------------------------------------|---------------------------------------------------------------|
| **OpenDevin**         | Community‑getriebene Plattform für autonome KI‑Softwareentwickler – direktes Vorbild für unsere Agent‑Integration. | [github.com/OpenDevin/OpenDevin](https://github.com/OpenDevin/OpenDevin) |
| **AutoGPT**           | Eines der ersten Projekte, das zeigte, wie LLMs mehrstufige Aufgaben autonom lösen können.            | [github.com/Significant-Gravitas/Auto-GPT](https://github.com/Significant-Gravitas/Auto-GPT) |
| **LangChain / LangGraph** | Framework zur Erstellung komplexer Agenten‑Workflows, Inspiration für unseren modell‑agnostischen Layer. | [langchain.com](https://www.langchain.com)                   |
| **LlamaIndex**        | Datenframework für LLM‑Anwendungen, besonders bei der Indexierung von Code‑Repositories nützlich.     | [llamaindex.ai](https://www.llamaindex.ai)                   |
| **CrewAI**            | Orchestrierung spezialisierter Agenten – ähnlich unseren Rollenprompts (Reviewer, Architect …).       | [crewai.com](https://www.crewai.com)                         |

Die Konzepte der Multi‑Agenten‑Systeme und der deterministischen Workflows flossen direkt in die Definition unserer AI‑Continuous‑Review‑Loop ein.

---

## 3. Code‑Analyse und Review‑Tools (Static Analysis & Linting)

| Projekt          | Beschreibung                                                                                     | Link / Referenz                                              |
|------------------|---------------------------------------------------------------------------------------------------|--------------------------------------------------------------|
| **ESLint**       | Statischer Analysewerkzeug für JavaScript – Vorbild für maschinenlesbare Regelwerke.              | [eslint.org](https://eslint.org)                             |
| **Prettier**     | Code‑Formatter, der zeigt, wie deterministische Werkzeuge die Lesbarkeit verbessern.              | [prettier.io](https://prettier.io)                           |
| **SonarQube**    | Kontinuierliche Code‑Qualitätsanalyse mit Metriken – Inspiration für unsere Scorecard.            | [sonarqube.org](https://www.sonarqube.org)                   |
| **CodeQL**       | Semantische Code‑Analyse für Sicherheitslücken – zeigt, wie tiefes Codeverständnis automatisiert werden kann. | [codeql.github.com](https://codeql.github.com)               |
| **Conventional Commits** | Standard für Commit‑Nachrichten – Beispiel für einen menschen‑ und maschinenlesbaren Standard. | [conventionalcommits.org](https://www.conventionalcommits.org) |

Diese Tools haben uns gelehrt, wie wichtig standardisierte, maschinenlesbare Formate und wiederkehrende Metriken sind – Prinzipien, die wir in der AARRS‑Spezifikation verankert haben.

---

## 4. Dokumentationsstandards und Prompt‑Engineering

| Quelle / Projekt               | Beschreibung                                                                                   | Link / Referenz                                                |
|--------------------------------|-------------------------------------------------------------------------------------------------|----------------------------------------------------------------|
| **llms.txt**                   | Vorschlag von answer.ai, eine `llms.txt` im Repository zu platzieren, um LLMs Kontext zu geben. | [llmstxt.org](https://llmstxt.org)                             |
| **OpenAI Cookbook**            | Sammlung von Prompt‑Techniken und Best Practices – Grundlage unserer Rollen‑ und Prozessprompts. | [cookbook.openai.com](https://cookbook.openai.com)             |
| **Anthropic’s Prompt Guide**   | Detaillierte Anleitung zur Gestaltung von Prompts für Claude – Einfluss auf unsere `constraints.md`. | [docs.anthropic.com/claude/docs/prompt-engineering](https://docs.anthropic.com/claude/docs/prompt-engineering) |
| **dair‑ai Prompt Engineering** | Umfassende Übersicht über Prompt‑Engineering‑Methoden.                                           | [github.com/dair-ai/Prompt-Engineering-Guide](https://github.com/dair-ai/Prompt-Engineering-Guide) |
| **Open Source Guides**         | Empfehlungen zur Repository‑Struktur und Community‑Dokumentation.                               | [opensource.guide](https://opensource.guide)                   |

Die Idee, ein Repository mit einer speziellen KI‑Dokumentation auszustatten, stammt direkt aus diesen Quellen – insbesondere `llms.txt` war die Initialzündung für unseren `/docs/ai`‑Ordner.

---

## 5. Forschungsliteratur und Konzepte (Academic & Industry Research)

| Titel / Konzept                                   | Autor:innen / Quelle                                                                 | Kurzbeschreibung                                                                 |
|---------------------------------------------------|---------------------------------------------------------------------------------------|----------------------------------------------------------------------------------|
| **Self‑Healing Codebases**                        | Konzept aus der Softwarewartung, u.a. von Microsoft Research                         | Code, der sich selbst repariert – Grundlage unserer Self‑Healing‑Workflows.      |
| **AI Pair Programmer**                            | GitHub Copilot‑Whitepaper                                                             | Beschreibt, wie KI Entwickler unterstützen kann.                                 |
| **LLMOps: Best Practices for LLM in Production**  | Zahlreiche Blog‑Beiträge (z.B. von Hugging Face, Microsoft)                          | Betriebliche Aspekte des Einsatzes von LLMs, Einfluss auf unseren Agent‑Layer.   |
| **Agentic Workflows**                              | Arbeiten von Andrew Ng und anderen                                                    | Beschreibung autonomer KI‑Agenten, die iterative Aufgaben lösen.                 |
| **Repo as a Prompt**                               | Konzept aus der Open‑Source‑Community (z.B. von Vercel)                              | Das gesamte Repository als Kontext für LLMs zu nutzen.                           |

Diese konzeptionellen Arbeiten bilden das theoretische Fundament unseres Frameworks.

---

## 6. Integrationen und Modell‑Anbieter

| Anbieter / Plattform      | Beschreibung                                                                       | Link / Referenz                                        |
|---------------------------|-------------------------------------------------------------------------------------|--------------------------------------------------------|
| **GitHub Models**         | Plattform zum Testen und Nutzen von KI‑Modellen direkt auf GitHub – direktes Vorbild für unseren modell‑agnostischen Layer. | [github.com/marketplace/models](https://github.com/marketplace/models) |
| **OpenAI API**            | GPT‑Modelle, die den Standard für Code‑Aufgaben gesetzt haben.                     | [platform.openai.com](https://platform.openai.com)     |
| **Anthropic Claude**      | Besonders stark in Kontextverständnis – Einfluss auf unsere `repo_context.md`.     | [anthropic.com/claude](https://www.anthropic.com/claude) |
| **Meta Llama**            | Open‑Source‑Modell, das lokale Ausführung ermöglicht – wichtig für Offline‑Szenarien. | [llama.meta.com](https://llama.meta.com)               |
| **Mistral AI**            | Leistungsstarke Open‑Source‑Modelle, Alternative zu proprietären APIs.              | [mistral.ai](https://mistral.ai)                        |
| **Ollama**                | Ermöglicht lokale Ausführung von Modellen – Basis für unseren lokalen Adapter.      | [ollama.com](https://ollama.com)                        |

Die Existenz vieler verschiedener Modelle und deren unterschiedliche Stärken motivierte die Entwicklung des neutralen AI‑Interface‑Layers.

---

## 7. Mainstream‑Projekte als Fallstudien

| Projekt       | Bedeutung für das Framework                                                                                         |
|---------------|---------------------------------------------------------------------------------------------------------------------|
| **WordPress** | Seine monolithische, historisch gewachsene Struktur zeigte den dringenden Bedarf an standardisierter KI‑Dokumentation und schrittweiser Migration. |
| **Magento**   | Komplexe Modularchitektur und XML‑Konfigurationen – verdeutlichte die Notwendigkeit spezialisierter Assistenten (z.B. Magento Extension Assistant). |
| **Shopware**  | Ähnlich wie Magento, mit eigener Plugin‑Struktur – Inspiration für unsere Roadmap.                                 |

Diese Projekte dienten nicht als direkte Quellen, sondern als Test‑ und Anwendungsfälle, die die Anforderungen an das Framework geschärft haben.

---

## 8. Weitere Inspirationen

- **GitHub Community Standards**: Die Idee, dass Repositories bestimmte Dateien enthalten sollten (README, LICENSE, CODE_OF_CONDUCT), wurde auf KI‑Dokumentation übertragen.
- **DevGPT (Microsoft)**: Forschung zur Nutzung von LLMs in der Entwicklung, insbesondere im Bereich Code‑Review.
- **OpenAI’s Function Calling**: Technik, die es LLMs ermöglicht, strukturierte Ausgaben zu liefern – Basis für unsere einheitlichen Prompt‑Ausgabeformate.
- **GitHub Actions Marketplace**: Viele existierende Actions zur Code‑Qualitätssicherung haben uns gezeigt, wie Automatisierung aussehen kann.

---

## Schlusswort

Das **KI‑Assistent‑Ready Repository Framework** ist kein Alleingang, sondern das Ergebnis einer intensiven Auseinandersetzung mit einer lebendigen Landschaft aus Tools, Forschung und Community‑Wissen. Wir stehen auf den Schultern von Riesen und hoffen, mit diesem Framework einen Beitrag zu leisten, der die nächste Generation von KI‑unterstützter Softwareentwicklung ermöglicht.

Sollten wir wichtige Quellen übersehen haben, bitten wir um einen Hinweis – wir werden die Credits.md kontinuierlich ergänzen.

**Danke an alle, die diesen Bereich vorantreiben!**

---

*Dieses Dokument steht unter der Creative Commons Attribution 4.0 International License (CC BY 4.0).*
