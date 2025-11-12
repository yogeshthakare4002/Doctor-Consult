<?php
/**
 * 20+ More Card Template
 * Special card for showing more conditions (mobile only)
 */

// Get the data
$show_more = $item ?? array();
$index = $index ?? 'more';
?>

<div class="condition-card-more" onclick="window.location.href='<?php echo esc_url($show_more['link'] ?? '#'); ?>'">
    <div class="more-icon">
        <img src="<?php echo esc_url($show_more['icon'] ?? get_template_directory_uri() . '/assets/images/plus.svg'); ?>" 
             alt="More conditions" />
    </div>
    <p class="more-text"><?php echo esc_html($show_more['name'] ?? '20+ more'); ?></p>
</div>

<style>
  .condition-card-more {
    transition: all 0.3s ease;
    cursor: pointer;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
  }

  .more-icon {
    width: 70px;
    height: 48px;
    background: white;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .more-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .more-text {
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0;
    text-align: center;
    color: #0E746E;
    text-align: center;
  }
</style>
