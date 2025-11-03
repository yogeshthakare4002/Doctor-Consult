<?php
/**
 * Speciality Carousel Card Template
 * Card layout specifically for medical specialities
 */
?>

<div class="carousel-card speciality-card">
  <?php if (!empty($item['image'])): ?>
    <img class="card-image" src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title'] ?? ''); ?>" />
  <?php endif; ?>

  <div class="card-content">
    <div class="card-header-wrapper">
      <?php if (!empty($item['title'])): ?>
        <h3 class="card-title"><?php echo esc_html($item['title']); ?></h3>
      <?php endif; ?>
      <?php if (!empty($item['link'])): ?>
        <a href="<?php echo esc_url($item['link']); ?>" class="card-nav-btn" aria-label="View <?php echo esc_attr($item['title'] ?? ''); ?>">
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M2.05241 8.41611H14.6134L10.436 3.99772C10.2199 3.76916 10.2199 3.3994 10.436 3.17084C10.6521 2.94305 11.001 2.94305 11.2171 3.17084L16.3377 8.58695C16.441 8.69694 16.5 8.84515 16.5 9.00039C16.5 9.15563 16.441 9.30384 16.3377 9.41383L11.2171 14.8292C11.1094 14.9431 10.9685 15 10.8269 15C10.6853 15 10.5437 14.9431 10.436 14.8292C10.2199 14.6014 10.2199 14.2308 10.436 14.0031L14.6134 9.58467H2.05241C1.74707 9.58467 1.5 9.32334 1.5 9.00039C1.5 8.67744 1.74707 8.41611 2.05241 8.41611Z"
              fill="white" />
          </svg>
        </a>
      <?php endif; ?>
    </div>

    <?php if (!empty($item['description'])): ?>
      <p class="card-description"><?php echo esc_html($item['description']); ?></p>
    <?php endif; ?>
  </div>

  <!-- <div class="card-nav-btn-wrapper">
    <?php if (!empty($item['link'])): ?>
        <a href="<?php echo esc_url($item['link']); ?>" class="card-nav-btn" aria-label="View <?php echo esc_attr($item['title'] ?? ''); ?>">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.05241 8.41611H14.6134L10.436 3.99772C10.2199 3.76916 10.2199 3.3994 10.436 3.17084C10.6521 2.94305 11.001 2.94305 11.2171 3.17084L16.3377 8.58695C16.441 8.69694 16.5 8.84515 16.5 9.00039C16.5 9.15563 16.441 9.30384 16.3377 9.41383L11.2171 14.8292C11.1094 14.9431 10.9685 15 10.8269 15C10.6853 15 10.5437 14.9431 10.436 14.8292C10.2199 14.6014 10.2199 14.2308 10.436 14.0031L14.6134 9.58467H2.05241C1.74707 9.58467 1.5 9.32334 1.5 9.00039C1.5 8.67744 1.74707 8.41611 2.05241 8.41611Z" fill="white"/>
            </svg>
        </a>
        <?php endif; ?>
    </div> -->
</div>

<style>
  /* Speciality Card Styles - Self-contained in template */
  .speciality-card {
    position: relative;
    background: #F1FAFE;
    border-radius: 12px;
    display: flex;
    align-items: center;
    height: 100px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border: 1px solid #DCE4F1;
  }

  .speciality-card .card-image {
    width: 96px;
    height: 96px;
    object-fit: cover;
    flex-shrink: 0;
  }

  .speciality-card .card-nav-btn-wrapper {
    position: absolute;
    top: 0px;
    right: 0px;
  }

  .speciality-card .card-nav-btn {
    width: 32px;
    height: 32px;
    background: #20B2AA;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .speciality-card .card-content {
    padding: 12px 12px 12px 8px;
    flex: 1;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
  }

  .speciality-card .card-header-wrapper{
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .speciality-card .card-title {
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 600;
    line-height: 24px;
    color: #333;
  }

  .speciality-card .card-description {
    color: #6E787E;
    margin: 0;
    flex: 1;
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    line-height: 16px;
    font-weight: 400;
  }

  /* Mobile responsive styles for speciality card */
  @media (max-width: 768px) {
    .speciality-card {
      padding: 0;
      min-height: 80px;
      max-height: 120px;
      overflow: hidden;
    }
    
    .speciality-card .card-content {
      padding: 12px 8px 12px 4px;
      min-width: 0; /* Allow flex item to shrink */
      flex: 1;
      overflow: hidden;
    }

    .speciality-card .card-nav-btn {
      top: 12px;
      right: 12px;
      width: 28px;
      height: 28px;
      flex-shrink: 0;
    }
    
    .speciality-card .card-image {
      width: 96px;
      height: 100%; /* Full height to touch top and bottom */
      flex-shrink: 0;
      border-radius: 0; /* Remove border radius for edge-to-edge */
      object-fit: cover;
    }
    
    .speciality-card .card-title {
      font-size: 14px;
      line-height: 18px;
      margin: 0 0 4px 0;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 100%;
    }
    
    .speciality-card .card-description {
      font-size: 11px;
      line-height: 14px;
      margin: 0;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      max-height: 28px; /* 2 lines * 14px line-height */
    }
  }
</style>