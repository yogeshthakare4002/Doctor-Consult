<?php
/**
 * Common Breadcrumb Component
 * Renders a breadcrumb trail provided via template args or the `breadcrumb_items` query var.
 */

if (!defined('ABSPATH')) {
    exit;
}

$breadcrumb_items = [];

if (isset($args) && is_array($args)) {
    if (isset($args['items']) && is_array($args['items'])) {
        $breadcrumb_items = $args['items'];
    } elseif (isset($args['breadcrumb_items']) && is_array($args['breadcrumb_items'])) {
        $breadcrumb_items = $args['breadcrumb_items'];
    }
}

if (empty($breadcrumb_items)) {
    $query_items = get_query_var('breadcrumb_items', []);
    if (is_array($query_items)) {
        $breadcrumb_items = $query_items;
    }
}

if (empty($breadcrumb_items)) {
    $breadcrumb_items = [
        [
            'title' => __('Home', 'pe-theme'),
            'link'  => 'https://pharmeasy.in',
        ],
        [
            'title' => get_the_title(),
            'link'  => '',
        ],
    ];
}

$normalized_items = [];
foreach ($breadcrumb_items as $item) {
    if (!is_array($item)) {
        continue;
    }

    $title = isset($item['title']) ? trim((string) $item['title']) : '';
    if ($title === '') {
        continue;
    }

    $normalized_items[] = [
        'title' => $title,
        'link'  => isset($item['link']) ? trim((string) $item['link']) : '',
    ];
}

if (empty($normalized_items)) {
    return;
}

$total_items = count($normalized_items);
$max_title_length = (int) apply_filters('pe_breadcrumb_title_max_length', 30);
?>

<nav class="breadcrumb-component" aria-label="Breadcrumb">
  <ol class="breadcrumb-list">
    <?php foreach ($normalized_items as $index => $item) :
        $is_last = ($index === $total_items - 1);
        $title = $item['title'];
        $link = $item['link'];
        $stroke = $is_last ? '#10847E' : '#30363C';

        $display_title = $title;
        if ($max_title_length > 0) {
            $title_length = function_exists('mb_strlen') ? mb_strlen($display_title) : strlen($display_title);
            if ($title_length > $max_title_length) {
                $truncated = function_exists('mb_substr')
                    ? mb_substr($display_title, 0, $max_title_length)
                    : substr($display_title, 0, $max_title_length);
                $display_title = rtrim($truncated) . '…';
            }
        }
    ?>
      <li class="breadcrumb-item<?php echo $is_last ? ' breadcrumb-current' : ''; ?>"<?php echo $is_last ? ' aria-current="page"' : ''; ?>>
        <?php if (!$is_last && $link !== '') : ?>
          <a href="<?php echo esc_url($link); ?>" class="breadcrumb-link breadcrumb-text" title="<?php echo esc_attr($title); ?>">
            <?php echo esc_html($display_title); ?>
          </a>
        <?php else : ?>
          <span class="<?php echo $is_last ? 'breadcrumb-current-text breadcrumb-text' : 'breadcrumb-link breadcrumb-link--inactive breadcrumb-text'; ?>" title="<?php echo esc_attr($title); ?>">
            <?php echo esc_html($display_title); ?>
          </span>
        <?php endif; ?>
      </li>
      <li class="breadcrumb-separator" aria-hidden="true">
        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0.800049 0.800003L4.80005 4.8L0.800049 8.8" stroke="<?php echo esc_attr($stroke); ?>" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </li>
    <?php endforeach; ?>
  </ol>
</nav>

<style>
.breadcrumb-component {
  display: inline-flex;
  align-items: center;
}

.breadcrumb-list {
  display: flex;
  align-items: center;
  list-style: none;
  margin: 0;
  padding: 0;
  gap: 8px;
}

.breadcrumb-item {
  display: flex;
  align-items: center;
}

.breadcrumb-text {
  display: inline-flex;
  max-width: 280px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.breadcrumb-link {
  font-family: Inter, sans-serif;
  font-weight: 700;
  font-size: 18px;
  line-height: 26px;
  color: #30363C;
  text-decoration: none;
  transition: color 0.2s ease;
}

.breadcrumb-link:hover {
  color: #10847E;
}

.breadcrumb-link--inactive {
  cursor: default;
  color: #30363C;
}

.breadcrumb-current-text {
  font-family: Inter, sans-serif;
  font-weight: 700;
  font-size: 18px;
  line-height: 26px;
  color: #10847E;
}

.breadcrumb-separator {
  display: flex;
  align-items: center;
}

@media (max-width: 768px) {
  .breadcrumb-text {
    max-width: 160px;
    font-size: 12px;
    line-height: 18px;
  }

  .breadcrumb-link,
  .breadcrumb-link--inactive,
  .breadcrumb-current-text {
    font-size: 12px;
    line-height: 18px;
  }
}
</style>
