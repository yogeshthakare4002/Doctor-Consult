<?php
/**
 * Reviews Section (Happy Users)
 * Desktop: carousel
 * Mobile: horizontal scroll
 */

// Sample reviews data (static for now)
$reviews = array();
for ($i = 0; $i < 8; $i++) {
  $reviews[] = array(
    'text'  => '"Booked a 2am consult for my child—saved us from going to the ER!"',
    'rating' => 4,
    'author' => 'Sunita',
    'date'  => '12 Jan ’24'
  );
}

$carousel_id = 'reviews-carousel-' . uniqid();
?>

<section class="reviews-section">
  <div class="reviews-header">
    <div class="reviews-header-left">
      <div class="reviews-avatar-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/doctor.svg" alt="users" class="reviews-avatar" width=40 height=40 />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/doctor.svg" alt="users" class="reviews-avatar avatar-two" width=40 height=40 />
      </div>
      <h2 class="reviews-title">10+ Million Happy Users <span class="muted">with online consultation</span></h2>
    </div>
    <div class="reviews-rating-row">
      <div class="stars" aria-label="4.7 out of 5">
        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
      </div>
      <span class="rating-number">4.7/5</span>
      <span class="divider">|</span>
      <span class="ratings-count">12k+ Ratings &amp; reviews</span>
    </div>
  </div>

  <img aria-hidden="true" src="<?php echo get_template_directory_uri(); ?>/assets/images/quote.svg" alt="quote" class="reviews-quote-decor" width=40 height=40 />

  <!-- Desktop Carousel -->
  <div class="reviews-desktop">
    <?php
      if (!function_exists('render_carousel')) {
        include get_template_directory() . '/common-components/carousel-function.php';
      }
      echo render_carousel($reviews, array(
        'title'           => '',
        'items_per_view'  => 4,
        'show_navigation' => true,
        'show_dots'       => false,
        'autoplay'        => false,
        'carousel_id'     => $carousel_id,
        'card_template'   => 'review',
        'card_width'      => 200,
        'container_class' => 'carousel-container reviews-carousel',
        'show_view_all'   => false
      ));
    ?>
  </div>

  <!-- Mobile Horizontal Scroll using the same card -->
  <div class="reviews-mobile">
    <div class="reviews-scroll">
      <?php foreach ($reviews as $index => $item): ?>
        <div class="carousel-item" data-index="<?php echo esc_attr($index); ?>">
          <?php include get_template_directory() . '/pages/doctor-consultation/cards/review-card.php'; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<style>
.reviews-section {
  max-width: 980px;
  border-radius: 16px;
  position: relative;
  padding: 24px;
  background: linear-gradient(314.85deg, #D5F8F0 1.47%, rgba(255, 255, 255, 0) 98.57%);
  border: 1px solid #E2EFF7;
}

.reviews-header {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: space-between;
  gap: 16px;
  padding: 0px 16px;
  margin-bottom: 28px;
}

.reviews-header-left {
  display: flex;
  align-items: center;
  gap: 12px;
}

.reviews-avatar-wrapper{
  position: relative;
  display: flex;
  width: 80px;
}

.reviews-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1px solid #E9E9E9;
  object-fit: cover;
}

.reviews-avatar.avatar-two{
  position: absolute;
  top: 0;
  left: 30px;
}

.reviews-title {
  font-family: Inter;
  font-weight: 600;
  font-size: 22px;
  line-height: 28px;
  letter-spacing: 0;
  color: #2F6B69;
  margin: 0;
}

.reviews-title .muted {
  font-weight: 600;
  color: #30363C;
}

.reviews-rating-row {
  display: flex;
  align-items: center;
  gap: 8px;
  color: #30363C;
}

.stars span { color: #FFC107; margin-right: 2px; }
.rating-number { font-weight: 700; }
.divider { color: #9BA5AB; }
.ratings-count { 
  font-family: Inter;
  font-weight: 500;
  font-style: Medium;
  font-size: 12px;
  line-height: 100%;
  letter-spacing: 0;
  color: #4F585E; 
}

/* Decorative single quote outside carousel */
.reviews-quote-decor {
  position: absolute;
  left: 37px;
  top: 113px;
  font-size: 72px;
  font-weight: 800;
  color: #E3F2FD;
  line-height: 1;
}

/* Desktop vs Mobile visibility */
.reviews-desktop { 
  display: block; 
  margin-left: 28px;
  margin-right: -24px;
}

.reviews-desktop .carousel-container{
  padding-right: 0px;
}
.reviews-mobile { display: none; }

/* Mobile horizontal scroll wrapper */
.reviews-scroll {
  display: flex;
  gap: 16px;
  overflow-x: auto;
  scroll-behavior: smooth;
  -webkit-overflow-scrolling: touch;
  padding: 0 45px 20px;
  z-index: 1;
}

.reviews-scroll::-webkit-scrollbar { 
  display: none;
}

/* Responsive */
@media (max-width: 768px) {
  .reviews-section { 
    background: #FFFFFF;
    border: none;
    width: 100%;
    margin: 0;
    padding: 24px 0px;
    border-top: 4px solid #EDF2F9;
    border-bottom: 4px solid #EDF2F9;
    border-radius: 0px;
   }
  .reviews-avatar-wrapper { width: 100px }
  .reviews-header { 
    flex-direction: column; 
    align-items: flex-start; 
    padding: 16px; 
    gap: 8px;
    margin-bottom: 8px; 
  }
  .reviews-title { font-size: 16px; line-height: 24px; }
  .reviews-quote-decor { left: 16px; top: 120px; font-size: 56px; }
  .reviews-desktop { display: none; }
  .reviews-mobile { display: flex; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const cards = document.querySelectorAll('.review-card');
  cards.forEach(function (card) {
    const text = card.querySelector('.review-text');
    const btn = card.querySelector('.review-read-toggle');
    if (!text || !btn) return;

    const maxCollapsed = 80; // px
    const update = (expanded) => {
      if (expanded) {
        text.style.maxHeight = '120px';
        btn.textContent = 'Read less';
        btn.setAttribute('aria-expanded', 'true');
      } else {
        text.style.maxHeight = maxCollapsed + 'px';
        btn.textContent = 'Read more';
        btn.setAttribute('aria-expanded', 'false');
      }
    };

    let expanded = false;
    update(false);
    btn.addEventListener('click', function () {
      expanded = !expanded;
      update(expanded);
    });
  });
});
</script>
