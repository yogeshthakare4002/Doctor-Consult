<?php
/**
 * Review Card Template
 * Expected $item structure:
 * [ 'text' => string, 'rating' => number, 'author' => string, 'date' => string ]
 */
?>
<div class="carousel-card review-card" data-index="<?php echo isset($index) ? esc_attr($index) : 0; ?>">
  <div class="review-card-body">
    <div class="review-text-wrapper">
      <p class="review-text" data-full-text="<?php echo esc_attr($item['text']); ?>"><?php echo esc_html($item['text']); ?></p>
      <button class="review-read-toggle" type="button" aria-expanded="false">Read more</button>
    </div>
  </div>
  <div class="review-rating">
    <span class="star-icon" aria-hidden="true">★</span>
    <span class="rating-value"><?php echo esc_html($item['rating']); ?></span>
  </div>
  <div class="review-card-footer">
    <div class="review-author">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/person.svg" alt="author" class="author-icon" />
      <span class="author-name"><?php echo esc_html($item['author']); ?></span>
      <span class="review-date"><?php echo esc_html($item['date']); ?></span>
    </div>
  </div>
</div>

<style>
  /* Review Card Styles - self-contained */
  .review-card {
    background: #fff;
    border: 1px solid #E6EEF7;
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(33, 33, 33, 0.06);
    padding: 16px;
    display: flex;
    flex-direction: column;
    height: 175px;
    width: 200px;
  }

  .review-card-body {
    display: flex;
    gap: 8px;
    flex: 1;
    overflow: hidden;
  }

  .review-text-wrapper {
    position: relative;
    flex: 1;
    overflow: hidden;
  }

  .review-text {
    margin: 0;
    font-family: Inter;
    font-size: 14px;
    line-height: 20px;
    color: #30363C;
    max-height: 80px;
    overflow: auto;
  }

  .review-read-toggle {
    background: #EDF2F9;
    color: #2F446B;
    border: none;
    border-radius: 12px;
    padding: 4px 10px;
    font-size: 12px;
    font-weight: 700;
    position: absolute;
    left: 0;
    bottom: 0;
    transform: translateY(110%);
    cursor: pointer;
  }

  .review-card-footer {
    display: flex;
    align-items: center;
    gap: 12px;
    border-top: 1px solid #EFF4FA;
    padding-top: 8px;
    margin-top: 8px;
  }

  .review-rating {
    width: fit-content;
    display: flex;
    align-items: center;
    gap: 6px;
    background: #F5F8FC;
    border-radius: 12px;
    padding: 4px 8px;
    color: #2F446B;
    font-weight: 700;
  }

  .star-icon { color: #FFC107; }

  .review-author {
    display: flex;
    align-items: center;
    gap: 6px;
    font-family: Inter;
    font-weight: 500;
    font-style: Semi Bold;
    font-size: 11px;
    line-height: 150%;
    letter-spacing: 0;
    color: #6E787E;
  }

  .author-icon { width: 16px; height: 16px; }
  .author-name { color: #30363C; font-weight: 600; }

  @media (max-width: 768px) {
    .review-card { width: 260px; height: 180px; }
  }
</style>
