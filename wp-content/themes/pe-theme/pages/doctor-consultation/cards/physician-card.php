<?php
/**
 * Physician Card Template
 * Compact physician card for consultation component
 */

// Get the current physician data from the loop
$physician = $item ?? array();
$index = $index ?? 0;
?>

<div class="physician-card" data-index="<?php echo esc_attr($index); ?>">
  <div class="physician-image-container">
    <img src="<?php echo esc_url($physician['image'] ?? get_template_directory_uri() . '/assets/images/doctor.svg'); ?>"
      alt="<?php echo esc_attr($physician['name'] ?? 'Dr. Harleen'); ?>" class="physician-photo" width=50 height=50 />
  </div>

  <div class="physician-info">
    <h3 class="physician-name"><?php echo esc_html($physician['name'] ?? 'Dr. Harleen Xoa Ahlawat'); ?></h3>
    <p class="physician-experience"><?php echo esc_html($physician['experience'] ?? '15 years experience'); ?></p>

    <?php if (isset($physician['expertise'])): ?>
      <p class="physician-expertise">Expertise in: <?php echo esc_html($physician['expertise']); ?></p>
    <?php endif; ?>

    <?php if (isset($physician['languages'])): ?>
      <p class="physician-languages">Speaks: <?php echo esc_html($physician['languages']); ?></p>
    <?php endif; ?>
  </div>
</div>

<style>
  .physician-card {
    flex: 0 0 260px;
    min-width: 254px;
    background: linear-gradient(180.24deg, #FFFFFF 57.78%, #ECF9FF 99.79%);
    border-radius: 12px;
    padding: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border: 1px solid #CEE4F7;
    transition: all 0.3s ease;
    cursor: pointer;

    display: flex;
    flex-direction: row;
    align-items: center;
  }

  .physician-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    border-color: #20B2AA;
  }

  .physician-image-container {
    width: 50px;
    height: 50px;
    border-radius: 5.14px;
    overflow: hidden;
    border: 0.86px solid #B5CDF7;
  }

  .physician-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .physician-info {
    display: flex;
    flex-direction: column;
    margin-left: 12px;
    width: 70%;
  }

  .physician-name {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 12px;
    line-height: 18px;
    letter-spacing: 0px;
    color: #30363C;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .physician-experience {
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 11px;
    line-height: 16px;
    color: #6B7280;
  }

  .physician-expertise {
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 11px;
    line-height: 16px;
    color: #6E787E;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .physician-languages {
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 11px;
    line-height: 16px;
    color: #6E787E;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  /* Mobile Responsive */
  @media (max-width: 768px) {
    .physician-card {
      flex: 0 0 180px;
      width: 180px;
      min-width: 180px;
      padding: 14px;
    }

    .physician-image-container {
      width: 50px;
      height: 50px;
      margin-bottom: 10px;
    }

    .physician-name {
      font-size: 13px;
      line-height: 18px;
    }

    .physician-experience {
      font-size: 11px;
      line-height: 14px;
    }

    .physician-expertise {
      font-size: 10px;
      line-height: 14px;
    }

    .physician-languages {
      font-size: 10px;
      line-height: 14px;
    }
  }

  @media (max-width: 480px) {
    .physician-card {
      flex: 0 0 160px;
      width: 160px;
      min-width: 160px;
      padding: 12px;
    }

    .physician-image-container {
      width: 45px;
      height: 45px;
      margin-bottom: 8px;
    }

    .physician-name {
      font-size: 12px;
      line-height: 16px;
    }

    .physician-experience {
      font-size: 10px;
      line-height: 12px;
    }

    .physician-expertise {
      font-size: 9px;
      line-height: 12px;
    }

    .physician-languages {
      font-size: 9px;
      line-height: 12px;
    }
  }
</style>