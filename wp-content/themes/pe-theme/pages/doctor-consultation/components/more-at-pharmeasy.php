<?php
/**
 * More at Pharmeasy Component
 * Displays SEO links in accordion format grouped by section
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once get_template_directory() . '/common-components/dropdown.php';

// API endpoint
$api_url = 'https://api.private.pharmeasy.in/v5/get/seo/links';

// Fetch data from API with caching
$transient_key = 'pharmeasy_seo_links';
$api_data = get_transient($transient_key);

if (false === $api_data) {
    $response = wp_remote_get($api_url, array(
        'timeout' => 10, // Reduced from 15 to 10 seconds
        'sslverify' => true, // Ensure SSL verification
        'headers' => array(
            'Content-Type' => 'application/json',
        ),
        'blocking' => true, // Keep blocking but with shorter timeout
    ));

    if (is_wp_error($response)) {
        error_log('PharmEasy SEO Links API Error: ' . $response->get_error_message());
        // Set a transient with null to prevent repeated failed requests
        set_transient($transient_key, null, 5 * MINUTE_IN_SECONDS);
        $api_data = null;
    } else {
        $response_code = wp_remote_retrieve_response_code($response);
        if ($response_code === 200) {
            $body = wp_remote_retrieve_body($response);
            $decoded = json_decode($body, true);
            
            if (isset($decoded['status']) && $decoded['status'] == 1 && isset($decoded['data'])) {
                $api_data = $decoded['data'];
                // Cache for 1 hour
                set_transient($transient_key, $api_data, HOUR_IN_SECONDS);
            } else {
                error_log('PharmEasy SEO Links API: Invalid response format');
                set_transient($transient_key, null, 5 * MINUTE_IN_SECONDS);
                $api_data = null;
            }
        } else {
            error_log('PharmEasy SEO Links API: HTTP ' . $response_code);
            set_transient($transient_key, null, 5 * MINUTE_IN_SECONDS);
            $api_data = null;
        }
    }
}

// Group data by section
$grouped_data = array();
if ($api_data && is_array($api_data)) {
    foreach ($api_data as $item) {
        $section = isset($item['section']) ? $item['section'] : 'other';
        if (!isset($grouped_data[$section])) {
            $grouped_data[$section] = array();
        }
        $grouped_data[$section][] = $item;
    }
}

// Section titles mapping
$section_titles = array(
    'diagnostic' => 'Top-Tests we cover',
    'otc' => 'Top-Selling Healthcare Products',
    'covid' => 'COVID Vaccines',
    'top_searched_medicine' => 'Top Searched Medicines',
    'top_selling_medicine' => 'Top Selling Medicines',
);
?>

<section class="more-at-pharmeasy-section">
    <div class="more-at-pharmeasy-wrapper">
        <h2 class="more-at-pharmeasy-title">Explore More at Pharmeasy</h2>
        
        <?php if (!empty($grouped_data)): ?>
            <div class="more-at-pharmeasy-accordions">
                <?php 
                $section_index = 0;
                foreach ($grouped_data as $section_key => $section_items): 
                    if (!empty($section_items)):
                        $section_title = isset($section_titles[$section_key]) ? $section_titles[$section_key] : ucfirst(str_replace('_', ' ', $section_key));
                        $is_first = ($section_index === 0);
                        $section_index++;
                        
                        // Build content HTML for the accordion
                        $content_html = '<div class="more-at-pharmeasy-items">';
                        foreach ($section_items as $item) {
                            $link = esc_url($item['link']);
                            $name = esc_html($item['name']);
                            $content_html .= sprintf(
                                '<a href="%s" class="more-at-pharmeasy-item">%s</a>',
                                $link,
                                $name
                            );
                        }
                        $content_html .= '</div>';
                        
                        // Custom icon for accordion (up arrow when expanded)
                        $icon_svg = '<svg class="more-at-pharmeasy-chevron" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12.5L10 7.5L15 12.5" stroke="#30363C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
                        
                        pe_render_common_dropdown(array(
                            'title_text'           => $section_title,
                            'title_is_html'        => false,
                            'content_html'         => $content_html,
                            'content_is_html'      => true,
                            'item_class'           => 'more-at-pharmeasy-accordion-item',
                            'button_class'         => 'more-at-pharmeasy-accordion-button',
                            'title_wrapper_tag'    => 'span',
                            'title_wrapper_class'  => 'more-at-pharmeasy-accordion-title',
                            'icon_html'            => $icon_svg,
                            'is_active'            => $is_first, // Only first accordion open by default
                            'answer_wrapper_class' => 'more-at-pharmeasy-accordion-content',
                            'answer_class'         => '',
                            'show_divider'         => false,
                            'answer_wrapper_tag'   => 'div',
                            'answer_tag'           => 'div',
                            'group_id'             => 'more-at-pharmeasy-accordion-group', // Group them so only one is open at a time
                        ));
                    endif;
                endforeach; 
                ?>
            </div>
        <?php else: ?>
            <p class="more-at-pharmeasy-error">Unable to load content at this time.</p>
        <?php endif; ?>
    </div>
</section>

<style>
/* Base Styles */
.more-at-pharmeasy-section {
    width: 100%;
    padding: 0px 20px;
}

.more-at-pharmeasy-wrapper {
    max-width: 928px;
    margin: 0 auto;
}

.more-at-pharmeasy-title {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 22px;
    leading-trim: NONE;
    line-height: 28px;
    letter-spacing: 0%;
    color: #30363C;
    margin: 0 0 32px 0;
}

.more-at-pharmeasy-accordions {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.more-at-pharmeasy-accordion-item {
    border: 1px solid #E2E8F0;
    background-color: #FFFFFF;
    border-radius: 8px;
    overflow: hidden;
}

.more-at-pharmeasy-accordion-button {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    background: none;
    border: none;
    padding: 12px;
    cursor: pointer;
    text-align: left;
}

.more-at-pharmeasy-accordion-title {
    font-family: Inter;
    font-weight: 500;
    font-style: Medium;
    font-size: 16px;
    leading-trim: NONE;
    line-height: 24px;
    letter-spacing: 0%;
    color: #30363C;
    flex: 1;
}

.more-at-pharmeasy-chevron {
    flex-shrink: 0;
    transition: transform 0.3s ease;
}

.more-at-pharmeasy-accordion-item.active .more-at-pharmeasy-chevron {
    transform: rotate(180deg);
}

.more-at-pharmeasy-accordion-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
}

.more-at-pharmeasy-accordion-item.active .more-at-pharmeasy-accordion-content {
    max-height: 2000px;
    transition: max-height 0.5s ease-in;
    padding-bottom: 16px;
}

.more-at-pharmeasy-items {
    display: flex;
    flex-wrap: wrap;
    gap: 0;
    padding-top: 12px;
    border-top: 1px solid #E2E8F0;
    align-items: center;
    row-gap: 12px;
}

.more-at-pharmeasy-item {
    font-family: Inter, sans-serif;
    font-size: 14px;
    font-weight: 400;
    line-height: 20px;
    color: #333;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: color 0.2s ease;
    white-space: nowrap;
    height: 20px;
    border-right: 1px solid #ccc;
    padding: 0 16px;
}

.more-at-pharmeasy-item:hover {
    color: #10847E;
}

.more-at-pharmeasy-item:last-child {
    border-right: none;
}

.more-at-pharmeasy-error {
    font-family: Inter, sans-serif;
    font-size: 14px;
    color: #4F585E;
    text-align: center;
    padding: 24px;
}

/* Mobile Styles */
@media (max-width: 768px) {
    .more-at-pharmeasy-section {
        padding: 0px 16px;
        background-color: #FFFFFF;
    }

    .more-at-pharmeasy-title {
        font-family: Inter;
        font-weight: 600;
        font-size: 18px;
        line-height: 24px;
        margin-bottom: 24px;
    }

    .more-at-pharmeasy-accordion-button {
        padding: 12px;
    }

    .more-at-pharmeasy-accordion-title {
        font-family: Inter;
        font-weight: 600;
        font-size: 14px;
        line-height: 24px;

    }

    .more-at-pharmeasy-items {
        padding-top: 8px;
    }

    .more-at-pharmeasy-item {
        font-family: Inter;
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
        padding: 0 12px;
        height: 20px;
    }

    .more-at-pharmeasy-item:last-child {
        border-right: none;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ensure accordion items recalculate height on expand
    const accordionItems = document.querySelectorAll('.more-at-pharmeasy-accordion-item');
    
    accordionItems.forEach(function(item) {
        const button = item.querySelector('.more-at-pharmeasy-accordion-button');
        const content = item.querySelector('.more-at-pharmeasy-accordion-content');
        
        if (button && content) {
            button.addEventListener('click', function() {
                // Recalculate height after a brief delay to ensure content is rendered
                setTimeout(function() {
                    if (item.classList.contains('active')) {
                        content.style.maxHeight = content.scrollHeight + 'px';
                    }
                }, 10);
            });
        }
    });
});
</script>

