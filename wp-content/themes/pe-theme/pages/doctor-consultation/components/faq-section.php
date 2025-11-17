<?php
/**
 * FAQ Section Component
 * Displays frequently asked questions with different layouts for desktop and mobile
 */

require_once get_template_directory() . '/common-components/dropdown.php';

// Fetch FAQ data from database
global $wpdb;

// Use wp_ prefix for local, no prefix for staging/production
if (defined('WP_ENVIRONMENT') && WP_ENVIRONMENT === 'local') {
    $table_name = $wpdb->prefix . 'faq'; // Local: wp_faq
} else {
    $table_name = 'faq'; // Staging/Production: faq
}

// Check if table exists
$table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;

// Fetch all FAQ from database
$faq_results = null;
if ($table_exists) {
    $faq_results = $wpdb->get_results("SELECT id, question, answer FROM $table_name ORDER BY id ASC");
    
    // Check for query errors
    if ($wpdb->last_error) {
        error_log('FAQ query error: ' . $wpdb->last_error);
    }
}

// Transform database results into the format expected by template
$faqs = array();
if ($faq_results) {
    foreach ($faq_results as $faq) {
        $faqs[] = array(
            'question' => $faq->question,
            'answer' => $faq->answer,
            'is_list' => false // Default to plain text, can be enhanced later
        );
    }
} else {
    // Log error if table exists but has no data
    if ($table_exists) {
        error_log('No FAQ found in table ' . $table_name);
    } else {
        error_log('Table ' . $table_name . ' does not exist in database');
    }
}

$default_open_index = 0; // 0-based index for which item should be open by default on mobile
?>

<section class="faq-section">
  <div class="faq-wrapper">
    
    <!-- Desktop & Mobile Header -->
    <div class="faq-header-container">
      <h2 class="faq-main-title">Frequently Asked Questions</h2>
      <button class="faq-help-button desktop-help-button">Need more help?</button>
    </div>

    <!-- Desktop Layout (2 columns, all visible) -->
    <div class="faq-desktop-layout">
      <div class="faq-grid">
        <?php foreach ($faqs as $index => $faq): ?>
          <div class="faq-desktop-item">
            <h3 class="faq-desktop-question">Q. <?php echo esc_html($faq['question']); ?></h3>
            <?php if ($faq['is_list']): ?>
              <div class="faq-desktop-answer"><?php echo $faq['answer']; ?></div>
            <?php else: ?>
              <p class="faq-desktop-answer"><?php echo esc_html($faq['answer']); ?></p>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Mobile Layout (Accordion style) -->
    <div class="faq-mobile-layout">
      <?php foreach ($faqs as $index => $faq): ?>
        <?php
          $is_active = ($index === $default_open_index);
          $icon_svg = '<svg class="faq-chevron pe-dropdown-icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 7.5L10 12.5L15 7.5" stroke="#30363C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
          $content_settings = array(
            'content_text'    => $faq['answer'],
            'content_is_html' => false,
            'answer_tag'      => 'p',
          );

          if ($faq['is_list']) {
              $content_settings['content_text'] = $faq['answer'];
              $content_settings['content_is_html'] = true;
              $content_settings['answer_tag'] = 'div';
          }

          pe_render_common_dropdown(array_merge(
              array(
                  'title_text'           => 'Q. ' . $faq['question'],
                  'item_class'           => 'faq-mobile-item',
                  'item_attributes'      => array('data-faq-index' => $index),
                  'button_class'         => 'faq-mobile-question',
                  'title_wrapper_tag'    => 'span',
                  'title_wrapper_class'  => 'faq-question-text',
                  'icon_html'            => $icon_svg,
                  'is_active'            => $is_active,
                  'answer_wrapper_class' => 'faq-mobile-answer-wrapper',
                  'answer_class'         => 'faq-mobile-answer',
                  'show_divider'         => ($index < count($faqs) - 1),
                  'divider_class'        => 'faq-mobile-divider',
                  'group_id'             => 'faq-mobile-accordion',
              ),
              $content_settings
          ));
        ?>
      <?php endforeach; ?>
    </div>

    <!-- Mobile Help Button -->
    <button class="faq-help-button mobile-help-button">Need more help?</button>

  </div>
</section>

<style>
/* Base Styles */
.faq-section {
  width: 100%;
  background-color: #FFFFFF;
}

.faq-wrapper {
  max-width: 928px;
  margin: 0 auto;
}

.faq-header-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 32px;
  gap: 24px;
}

.faq-main-title {
  font-family: Inter, sans-serif;
  font-size: 28px;
  font-weight: 700;
  line-height: 36px;
  color: #30363C;
  margin: 0;
  position: relative;
}

.faq-help-button {
  font-family: Inter, sans-serif;
  font-size: 14px;
  font-weight: 600;
  color: #10847E;
  background-color: #FFFFFF;
  border: 1.5px solid #10847E;
  border-radius: 8px;
  padding: 10px 24px;
  cursor: pointer;
  transition: all 0.2s ease;
  white-space: nowrap;
}

.faq-help-button:hover {
  background-color: #10847E;
  color: #FFFFFF;
}

/* Desktop Layout */
.faq-desktop-layout {
  display: block;
}

.faq-mobile-layout {
  display: none;
}

.mobile-help-button {
  display: none;
}

.desktop-help-button {
  display: inline-block;
}

.faq-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 32px 48px;
}

.faq-desktop-item {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.faq-desktop-question {
  font-family: Inter, sans-serif;
  font-size: 16px;
  font-weight: 600;
  line-height: 24px;
  color: #30363C;
  margin: 0;
}

.faq-desktop-answer {
  font-family: Inter, sans-serif;
  font-size: 14px;
  font-weight: 400;
  line-height: 22px;
  color: #4F585E;
  margin: 0;
}

/* Mobile Layout */
@media (max-width: 768px) {
  .faq-section {
    padding: 32px 16px;
  }

  .faq-header-container {
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 0px;
    gap: 0;
  }

  .faq-main-title {
    font-family: Inter;
    font-weight: 600;
    font-size: 18px;
    line-height: 24px;
    letter-spacing: 0;
    margin-bottom: 24px;
    width: 100%;
  }

 .faq-main-title::after {
  content: '';
  position: absolute;
  right: 0px;
  top: 50%;
  margin-left: 8px;
  width: 20%;
  height: 1.5px;
  background: linear-gradient(to right, #C8E6F5 0%, transparent 100%);
}

  .faq-desktop-layout {
    display: none;
  }

  .faq-mobile-layout {
    display: block;
  }

  .desktop-help-button {
    display: none;
  }

  .mobile-help-button {
    display: block;
    width: 100%;
    margin-top: 24px;
  }

  .faq-mobile-item {
    width: 100%;
  }

  .faq-mobile-question {
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

  .faq-question-text {
    color: #30363C;
    flex: 1;
    font-family: Inter;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    letter-spacing: 0;
  }

  .faq-chevron {
    flex-shrink: 0;
    transition: transform 0.3s ease;
  }

  .faq-mobile-item.active .faq-chevron {
    transform: rotate(180deg);
  }

  .faq-mobile-answer-wrapper {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
  }

  .faq-mobile-item.active .faq-mobile-answer-wrapper {
    max-height: 500px;
    transition: max-height 0.5s ease-in;
  }

  .faq-mobile-answer {
    color: #4F585E;
    margin: 0;
    padding: 0 0 16px 0;
    font-family: Inter;
    font-weight: 400;
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0;
  }

  .faq-mobile-divider {
    height: 1px;
    background-color: #E2E8F0;
    margin: 0;
  }

  .faq-mobile-item:last-child .faq-mobile-divider {
    display: none;
  }
}
</style>

