# 🎨 Design System

This file documents the core design system for the **Cherry x K COFFEE** project. Any future edits or new components must strictly adhere to these tokens to ensure visual consistency.

## 1. Core Principles
- **Theme:** "K COFFEE Green Gallery" (Single unified light theme).
- **Aesthetic:** Minimalist, editorial, highly spacious, emphasizing typography and photography.
- **Tech Stack:** HTML5, Vanilla JavaScript, and Custom BEM-inspired CSS (NO Tailwind).

## 2. Color Palette
Colors are managed via CSS Variables (`:root`).
- `--c-bg`: `#F4F7F6` (Soft greenish-cream background)
- `--c-bg-alt`: `#E3EDE9` (Slightly darker muted green for alternate sections)
- `--c-text`: `#102A20` (Very dark green, almost black, for headings)
- `--c-text-mut`: `#5B7065` (Muted green-grey for body text)
- `--c-border`: `rgba(1, 129, 99, 0.15)` (Subtle green borders)
- `--c-accent`: `rgba(1, 129, 99, 1)` (K Coffee Green)
- `--c-bg-hero`: `rgba(1, 129, 99, 1)` (Hero background base)
- `--c-text-hero`: `#FFFFFF` (Hero text color for max contrast)

## 3. Typography
The typography system strictly limits the usage of each font to maintain an editorial, professional look:

1. **Barlow (Primary Sans-serif):** `font-family: var(--f-sans)`
   - **Usage:** Body text, metric numbers, navigation links, buttons, and contact forms. Clean, modern, highly legible.
2. **Playfair Display (Primary Serif):** `font-family: var(--f-serif)`
   - **Usage:** Main section titles (`h2.vibe-heading`, `h3.vibe-heading`). Gives a museum/gallery-like sophistication.
3. **Hesmony (Accent Script):** `font-family: var(--f-script)` (via `.font-signature` class)
   - **Usage:** STRICTLY for special artistic accents, signatures, or specific highlighted words (e.g. the word "Cherry" in the hero banner or background watermarks). NEVER use for full body paragraphs or standard section titles.

**Font Sizes:**
- `--fs-h1`: `clamp(4.5rem, 7vw, 7rem)`
- `--fs-h2`: `clamp(2.8rem, 6vw, 4rem)`
- `--fs-h3`: `clamp(1rem, 2.5vw, 1.6rem)`
- `--fs-num`: `clamp(2rem, 3vw, 3rem)`
- `--fs-body`: `0.9rem`
- `--fs-small`: `0.75rem`

## 4. Spacing System
Spacing is designed to let the interface "breathe".
- `--sp-xs`: 15px
- `--sp-sm`: 30px
- `--sp-md`: 50px
- `--sp-lg`: 80px (Desktop container padding)
- `--sp-xl`: 120px
- `--sp-xxl`: 180px

## 5. UI Elements
- **Buttons (`.pill-btn`):** Transparent background, solid border, uppercase, small text, backdrop blur, hover inverts colors.
- **Watermarks (`.watermark`):** Absolute positioned, huge typography, transparent with subtle stroke.
- **Glass Badge (`.glass-badge`):** Used on image hover states.

## 6. Breakpoints & Responsive Strategy
- **Base (Mobile-First):** Everything is scaled for mobile initially.
- **Tablet (`>= 768px` to `<= 992px`):** Spacing tokens scale down slightly. Grid layouts switch to 2 columns.
- **Desktop (`> 992px`):** Full multi-column grids (e.g., 5fr 7fr layouts), full headers.
