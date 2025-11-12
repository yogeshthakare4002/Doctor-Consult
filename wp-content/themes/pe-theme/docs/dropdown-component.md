# Dropdown Component

Reusable PHP helper for rendering accessible dropdown/accordion elements across PharmEasy themes.

## Location

`wp-content/themes/pe-theme/common-components/dropdown.php`

## Capabilities

- Renders a toggleable dropdown item with title, answer content, optional divider, and chevron icon.
- Ships default styling (`.pe-dropdown-*` classes) and interaction script; no extra assets required.
- Supports plain text or raw HTML for both title and content regions.
- Allows grouping multiple dropdowns so only one stays open at a time.
- Accepts overrides for classes, icons, wrapper tags, and additional container attributes.

## Basic Usage

```php
<?php
require_once get_template_directory() . '/common-components/dropdown.php';

pe_render_common_dropdown([
    'title_text'   => 'What services does PharmEasy offer?',
    'content_text' => 'PharmEasy connects you with medicines, diagnostics, doctor consults, and more.',
    'is_active'    => true, // optional: open by default
]);
```

The helper injects its CSS/JS only once per request, so you can call it multiple times without duplicate assets.

## Accordion Example

```php
<?php
$faqs = [
    [
        'question' => 'How do I schedule a consultation?',
        'answer'   => 'Choose a slot, confirm details, and our doctor will connect with you.',
    ],
    [
        'question' => 'Can I reschedule?',
        'answer'   => 'Yes, you can reschedule up to 2 hours before the appointment.',
    ],
];

foreach ($faqs as $index => $faq) {
    pe_render_common_dropdown([
        'title_text'           => 'Q. ' . $faq['question'],
        'content_text'         => $faq['answer'],
        'group_id'             => 'doctor-faqs',   // keep only one open at a time
        'is_active'            => $index === 0,    // first open by default
        'answer_wrapper_class' => 'faq-mobile-answer-wrapper', // optional: reuse page-specific classes
        'answer_class'         => 'faq-mobile-answer',
        'divider_class'        => 'faq-mobile-divider',
        'show_divider'         => $index < count($faqs) - 1,
    ]);
}
```

## Key Arguments

- `title_text` / `title_html`: Provide the dropdown header. Use `title_is_html => true` when passing raw HTML.
- `content_text` / `content_html`: Main body content. Set `content_is_html => true` for HTML strings.
- `item_class`, `button_class`, `title_wrapper_class`, `answer_wrapper_class`, `answer_class`, `divider_class`: Extend or replace default classes.
- `group_id`: Group identifier to auto-collapse siblings.
- `icon_html`: Override the default chevron icon.
- `answer_tag`, `answer_wrapper_tag`, `title_wrapper_tag`: Swap wrapper elements (`p`, `div`, `span`, etc.).
- `item_attributes`: Array of extra attributes applied to the dropdown container (e.g. `['data-faq-index' => 2]`).

Refer to the source file for the full list of options and defaults. Integrate the component in any template by requiring the helper and passing the desired configuration array.***

