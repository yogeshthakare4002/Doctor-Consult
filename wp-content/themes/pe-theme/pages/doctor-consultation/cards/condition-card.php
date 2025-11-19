<?php
/**
 * Condition Card Template
 * Individual condition card for carousel and grid
 */

// Get the current condition data from the loop
$condition = $item ?? array();
$index = $index ?? 0;
?>

<div class="condition-card" data-index="<?php echo esc_attr($index); ?>" onclick="window.location.href='<?php echo esc_url($condition['link'] ?? '#'); ?>'">
    <div class="condition-icon">
        <img src="<?php echo esc_url($condition['icon'] ?? get_template_directory_uri() . '/assets/images/doctor.svg'); ?>" 
             alt="<?php echo esc_attr($condition['name'] ?? 'Condition'); ?>" width=95 height=62 />
    </div>
    <p class="condition-name"><?php echo esc_html($condition['name'] ?? 'Condition'); ?></p>
</div>

<style>
  .condition-card {
    flex: 0 0 100px;
    transition: all 0.3s ease;
    cursor: pointer;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
  }

  .condition-icon {
    width: 96px;
    height: 64px;
    background: linear-gradient(0deg, #F5F8FC -1.87%, rgba(245, 248, 252, 0) 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #E6EBF4;
  }

  .condition-icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .condition-name {
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0;
    text-align: center;
    color: #30363C;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 100%;
  }

  /* Mobile Grid Styles */
  .conditions-grid .condition-card {
    flex: 0 0 calc(25% - 12px);
    min-width: calc(25% - 12px);
    max-width: calc(25% - 12px);
  }

  /* Mobile Responsive */
  @media (max-width: 768px) {
    .condition-card {
      flex: 0 0 calc(25% - 12px);
      min-width: calc(25% - 12px);
      max-width: calc(25% - 12px);
      padding: 16px;
    }

    .condition-icon {
      width: 50px;
      height: 50px;
    }

    .condition-icon img {
      width: 30px;
      height: 30px;
    }

    .condition-name {
      font-size: 12px;
      line-height: 16px;
    }
  }

  @media (max-width: 480px) {
    .conditions-grid .condition-card {
      flex: 0 0 calc(50% - 6px);
      min-width: calc(50% - 6px);
      max-width: calc(50% - 6px);
    }

    .condition-card {
      padding: 14px;
    }

    .condition-icon {
      width: 45px;
      height: 45px;
    }

    .condition-icon img {
      width: 28px;
      height: 28px;
    }

    .condition-name {
      font-size: 11px;
      line-height: 14px;
    }
  }
</style>
