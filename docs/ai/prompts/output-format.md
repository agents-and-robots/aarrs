# Standard Output Format (AARRS Prompts)

Use this structure for every role prompt output to keep results reviewable and comparable.

## Required sections
1. **Summary** (3–5 bullets, plain language)
2. **Assumptions** (mark each with `Assumption:`)
3. **Findings / Analysis**
4. **Recommendations** (prioritized, small-diff friendly)
5. **Proposed changes** (exact files + patch-like snippets when possible)
6. **Risks / Trade-offs**
7. **Open questions**

## Formatting rules
- Use Markdown headings in the exact section order above.
- Cite file paths for every concrete claim.
- Separate facts from assumptions explicitly.
- Prefer concise bullets over long paragraphs.

## Optional extensions
- **Testing / validation** section (commands + expected outcome)
- **Rollback plan** section (for higher-risk changes)
