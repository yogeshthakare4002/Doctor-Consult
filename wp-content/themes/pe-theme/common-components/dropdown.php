<?php
/**
 * Common Dropdown Component
 *
 * Reusable dropdown/accordion item renderer.
 */

if (!function_exists('pe_render_common_dropdown_styles')) {
    /**
     * Output reusable dropdown styles once per request.
     *
     * @return void
     */
    function pe_render_common_dropdown_styles()
    {
        static $styles_rendered = false;

        if ($styles_rendered) {
            return;
        }

        $styles_rendered = true;
        ?>
        <style>
            .pe-dropdown-button {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 16px;
                background: none;
                border: none;
                padding: 16px 0;
                cursor: pointer;
                text-align: left;
            }

            .pe-dropdown-title {
                font-family: Inter, sans-serif;
                font-size: 16px;
                font-weight: 600;
                line-height: 24px;
                color: #30363C;
                flex: 1;
            }

            .pe-dropdown-icon {
                flex-shrink: 0;
                transition: transform 0.3s ease;
            }

            .pe-dropdown-item.active .pe-dropdown-icon {
                transform: rotate(180deg);
            }

            .pe-dropdown-answer-wrapper {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease-out;
            }

            .pe-dropdown-item.active .pe-dropdown-answer-wrapper {
                max-height: 500px;
                transition: max-height 0.5s ease-in;
            }

            .pe-dropdown-answer {
                font-family: Inter, sans-serif;
                font-size: 14px;
                font-weight: 400;
                line-height: 22px;
                color: #4F585E;
                margin: 0;
                padding: 0 0 16px 0;
            }

            .pe-dropdown-divider {
                height: 1px;
                background-color: #E2E8F0;
                margin: 0;
            }

            .pe-dropdown-item:last-child .pe-dropdown-divider {
                display: none;
            }
        </style>
        <?php
    }
}

if (!function_exists('pe_render_common_dropdown_script')) {
    /**
     * Output reusable dropdown script once per request.
     *
     * @return void
     */
    function pe_render_common_dropdown_script()
    {
        static $script_rendered = false;

        if ($script_rendered) {
            return;
        }

        $script_rendered = true;
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var dropdownItems = Array.prototype.slice.call(document.querySelectorAll('.pe-dropdown-item'));

                var collapseItem = function(item) {
                    var button = item.querySelector('.pe-dropdown-button');
                    var answerWrapper = item.querySelector('.pe-dropdown-answer-wrapper');
                    if (!button || !answerWrapper) {
                        return;
                    }
                    item.classList.remove('active');
                    button.setAttribute('aria-expanded', 'false');
                    answerWrapper.style.maxHeight = '0px';
                };

                var expandItem = function(item) {
                    var button = item.querySelector('.pe-dropdown-button');
                    var answerWrapper = item.querySelector('.pe-dropdown-answer-wrapper');
                    if (!button || !answerWrapper) {
                        return;
                    }
                    item.classList.add('active');
                    button.setAttribute('aria-expanded', 'true');
                    answerWrapper.style.maxHeight = answerWrapper.scrollHeight + 'px';
                };

                dropdownItems.forEach(function(item) {
                    var button = item.querySelector('.pe-dropdown-button');
                    var answerWrapper = item.querySelector('.pe-dropdown-answer-wrapper');

                    if (!button || !answerWrapper) {
                        return;
                    }

                    // Ensure initial state respects classes set server side.
                    if (item.classList.contains('active')) {
                        answerWrapper.style.maxHeight = answerWrapper.scrollHeight + 'px';
                        button.setAttribute('aria-expanded', 'true');
                    } else {
                        answerWrapper.style.maxHeight = '0px';
                        button.setAttribute('aria-expanded', 'false');
                    }

                    // Recalculate height on transition end to keep accordion smooth.
                    answerWrapper.addEventListener('transitionend', function(event) {
                        if (event.propertyName !== 'max-height') {
                            return;
                        }

                        if (!item.classList.contains('active')) {
                            answerWrapper.style.maxHeight = '0px';
                        } else {
                            answerWrapper.style.maxHeight = answerWrapper.scrollHeight + 'px';
                        }
                    });

                    button.addEventListener('click', function(event) {
                        event.preventDefault();

                        var groupId = item.getAttribute('data-pe-dropdown-group');
                        var isActive = item.classList.contains('active');

                        if (groupId) {
                            dropdownItems.forEach(function(groupItem) {
                                if (groupItem !== item && groupItem.getAttribute('data-pe-dropdown-group') === groupId) {
                                    collapseItem(groupItem);
                                }
                            });
                        }

                        if (isActive) {
                            collapseItem(item);
                        } else {
                            expandItem(item);
                        }
                    });
                });
            });
        </script>
        <?php
    }
}

if (!function_exists('pe_render_common_dropdown')) {
    /**
     * Render a dropdown item.
     *
     * @param array $args {
     *     Arguments to configure dropdown output.
     *
     *     @type string $title_text            Text for the title area.
     *     @type string $title_html            Optional pre-rendered HTML for the title. Overrides $title_text.
     *     @type bool   $title_is_html         Whether the provided title content is already HTML safe.
     *     @type string $content_text          Text for the content area.
     *     @type string $content_html          Optional pre-rendered HTML for the content. Overrides $content_text.
     *     @type bool   $content_is_html       Whether the provided content is already HTML safe.
     *     @type string $item_class            Class attribute for the outer container.
     *     @type array  $item_attributes       Additional attributes for the outer container as key => value pairs.
     *     @type string $button_class          Class attribute for the toggle button.
     *     @type string $title_wrapper_tag     HTML tag for the title wrapper. Defaults to span.
     *     @type string $title_wrapper_class   Class for the title wrapper element.
     *     @type string $icon_html             SVG or HTML string rendered inside the button after the title.
     *     @type bool   $is_active             Whether the dropdown should be open by default.
     *     @type string $answer_wrapper_class  Class for the answer wrapper container.
     *     @type string $answer_class          Class for the answer content element.
     *     @type string $divider_class         Class for the optional divider element.
     *     @type bool   $show_divider          Whether to render the divider element.
     *     @type string $answer_wrapper_tag    HTML tag for answer wrapper. Defaults to div.
     *     @type string $answer_tag            HTML tag for the answer itself. Defaults to p.
     * }
     *
     * @return void
     */
    function pe_render_common_dropdown($args = array())
    {
        $default_classes = array(
            'item'            => 'pe-dropdown-item',
            'button'          => 'pe-dropdown-button',
            'title'           => 'pe-dropdown-title',
            'answer_wrapper'  => 'pe-dropdown-answer-wrapper',
            'answer'          => 'pe-dropdown-answer',
            'divider'         => 'pe-dropdown-divider',
        );

        $defaults = array(
            'title_text'            => '',
            'title_html'            => '',
            'title_is_html'         => false,
            'content_text'          => '',
            'content_html'          => '',
            'content_is_html'       => false,
            'item_class'            => '',
            'item_attributes'       => array(),
            'button_class'          => '',
            'title_wrapper_tag'     => 'span',
            'title_wrapper_class'   => '',
            'icon_html'             => '',
            'is_active'             => false,
            'answer_wrapper_class'  => '',
            'answer_class'          => '',
            'divider_class'         => '',
            'show_divider'          => false,
            'answer_wrapper_tag'    => 'div',
            'answer_tag'            => 'p',
            'group_id'              => '',
            'button_type'           => 'button',
        );

        $args = wp_parse_args($args, $defaults);

        pe_render_common_dropdown_styles();
        pe_render_common_dropdown_script();

        if ($args['group_id']) {
            if (!isset($args['item_attributes']) || !is_array($args['item_attributes'])) {
                $args['item_attributes'] = array();
            }
            if (empty($args['item_attributes']['data-pe-dropdown-group'])) {
                $args['item_attributes']['data-pe-dropdown-group'] = $args['group_id'];
            }
        }

        if (!$args['icon_html']) {
            $args['icon_html'] = '<svg class="pe-dropdown-icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 7.5L10 12.5L15 7.5" stroke="#30363C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
        }

        $item_classes = trim($default_classes['item'] . ' ' . $args['item_class'] . ' ' . ($args['is_active'] ? 'active' : ''));
        $item_attributes = '';

        if (!empty($args['item_attributes']) && is_array($args['item_attributes'])) {
            foreach ($args['item_attributes'] as $attr_key => $attr_value) {
                if ($attr_value === true) {
                    $item_attributes .= sprintf(' %s', esc_attr($attr_key));
                } elseif ($attr_value !== false && $attr_value !== null) {
                    $item_attributes .= sprintf(' %s="%s"', esc_attr($attr_key), esc_attr($attr_value));
                }
            }
        }

        $aria_expanded = $args['is_active'] ? 'true' : 'false';

        $title_markup = $args['title_html'];
        if (!$title_markup) {
            $title_content = $args['title_is_html']
                ? $args['title_text']
                : esc_html($args['title_text']);

            $title_tag = $args['title_wrapper_tag'] ? $args['title_wrapper_tag'] : 'span';
            $title_classes = trim($default_classes['title'] . ' ' . $args['title_wrapper_class']);
            $title_class_attr = $title_classes
                ? sprintf(' class="%s"', esc_attr($title_classes))
                : '';

            $title_markup = sprintf(
                '<%1$s%2$s>%3$s</%1$s>',
                esc_attr($title_tag),
                $title_class_attr,
                $title_content
            );
        }

        $content_markup = $args['content_html'];
        if (!$content_markup) {
            $content_tag = $args['answer_tag'] ? $args['answer_tag'] : 'p';
            $answer_classes = trim($default_classes['answer'] . ' ' . $args['answer_class']);
            $answer_class_attr = $answer_classes
                ? sprintf(' class="%s"', esc_attr($answer_classes))
                : '';

            $content_markup = sprintf(
                '<%1$s%2$s>%3$s</%1$s>',
                esc_attr($content_tag),
                $answer_class_attr,
                $args['content_is_html'] ? $args['content_text'] : esc_html($args['content_text'])
            );
        }

        $answer_wrapper_tag = $args['answer_wrapper_tag'] ? $args['answer_wrapper_tag'] : 'div';
        $answer_wrapper_classes = trim($default_classes['answer_wrapper'] . ' ' . $args['answer_wrapper_class']);
        $answer_wrapper_class_attr = $answer_wrapper_classes
            ? sprintf(' class="%s"', esc_attr($answer_wrapper_classes))
            : '';

        $divider_markup = '';
        if ($args['show_divider'] && $args['divider_class']) {
            $divider_classes = trim($default_classes['divider'] . ' ' . $args['divider_class']);
            $divider_markup = sprintf(
                '<div class="%s"></div>',
                esc_attr($divider_classes)
            );
        }

        $button_classes = trim($default_classes['button'] . ' ' . $args['button_class']);
        $button_type = $args['button_type'] ? $args['button_type'] : 'button';
        ?>
        <div class="<?php echo esc_attr($item_classes); ?>"<?php echo $item_attributes; ?>>
            <button type="<?php echo esc_attr($button_type); ?>" class="<?php echo esc_attr($button_classes); ?>" aria-expanded="<?php echo esc_attr($aria_expanded); ?>">
                <?php echo $title_markup; ?>
                <?php
                if ($args['icon_html']) {
                    echo $args['icon_html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                }
                ?>
            </button>
            <<?php echo esc_attr($answer_wrapper_tag); ?><?php echo $answer_wrapper_class_attr; ?>>
                <?php echo $content_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </<?php echo esc_attr($answer_wrapper_tag); ?>>
            <?php
            if ($divider_markup) {
                echo $divider_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
            ?>
        </div>
        <?php
    }
}

