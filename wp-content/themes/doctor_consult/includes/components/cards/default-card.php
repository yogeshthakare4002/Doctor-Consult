<?php
/**
 * Default Carousel Card Template
 * Basic card layout for carousel items
 */
?>

<div class="carousel-card default-card">
    <?php if (!empty($item['image'])): ?>
        <div class="card-image">
            <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title'] ?? ''); ?>" />
        </div>
    <?php endif; ?>
    
    <div class="card-content">
        <?php if (!empty($item['title'])): ?>
            <h3 class="card-title"><?php echo esc_html($item['title']); ?></h3>
        <?php endif; ?>
        
        <?php if (!empty($item['description'])): ?>
            <p class="card-description"><?php echo esc_html($item['description']); ?></p>
        <?php endif; ?>
        
        <?php if (!empty($item['link'])): ?>
            <a href="<?php echo esc_url($item['link']); ?>" class="card-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                    <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        <?php endif; ?>
    </div>
</div>

<style>
/* Default Card Styles - Self-contained in template */
.carousel-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    border: 1px solid #e0e0e0;
}

.card-image {
    width: 100%;
    height: 200px;
    overflow: hidden;
    border-radius: 12px 12px 0 0;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.carousel-card:hover .card-image img {
    transform: scale(1.05);
}

.card-content {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-title {
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 600;
    line-height: 1.3;
    margin: 0 0 12px 0;
    color: #333;
}

.card-description {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #666;
    line-height: 1.5;
    margin: 0 0 16px 0;
    flex: 1;
}

.card-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: #20B2AA;
    color: white;
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
    align-self: flex-start;
}

.card-link:hover {
    background-color: #1a9b94;
    transform: scale(1.1);
    text-decoration: none;
    color: white;
}

/* Mobile responsive styles for default card */
@media (max-width: 768px) {
    .card-content {
        padding: 16px;
    }
    
    .card-title {
        font-size: 16px;
    }
    
    .card-description {
        font-size: 13px;
    }
}

@media (max-width: 480px) {
    .card-content {
        padding: 12px;
    }
    
    .card-title {
        font-size: 15px;
    }
    
    .card-description {
        font-size: 12px;
    }
}
</style>
