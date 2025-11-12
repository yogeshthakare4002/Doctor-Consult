/**
 * Reusable Carousel Component JavaScript
 * Handles carousel functionality with touch/swipe support
 */

class Carousel {
    constructor(container, config = {}) {

      this.container = container;

        // Force the external config if it exists
        if (config && Object.keys(config).length > 0) {
            this.config = {
                autoplay: false,
                autoplay_delay: 3000,
                items_per_view: 3,
                card_width: 280,
                ...config
            };
        } else {
            this.config = {
                autoplay: false,
                autoplay_delay: 3000,
                items_per_view: 3,
                card_width: 280
            };
        }
        
        this.track = this.container.querySelector('.carousel-track');
        this.items = this.container.querySelectorAll('.carousel-item');
        this.prevBtn = this.container.querySelector('.carousel-prev');
        this.nextBtn = this.container.querySelector('.carousel-next');
        this.dots = this.container.querySelectorAll('.carousel-dot');
        
        
        this.currentIndex = 0;
        this.maxIndex = Math.max(0, this.items.length - this.config.items_per_view);
        this.autoplayInterval = null;
        this.isTransitioning = false;
        
        this.init();
    }
    
    init() {
        this.setupEventListeners();
        this.updateItemWidths();
        this.updateNavigation();
        this.startAutoplay();
        this.setupResponsive();
    }
    
    updateItemWidths() {
        if (!this.items.length) return;
        
        const containerWidth = this.track.parentElement.offsetWidth;
        const gap = 16; // 16px gap between items
        
        // Get card width from config, default to 280px
        const cardWidth = this.config.card_width || 280;
        
        // Calculate how many items can actually fit
        const itemsThatFit = Math.floor((containerWidth + gap) / (cardWidth + gap));
        
        // Use the calculated items that fit
        let itemsPerView = itemsThatFit;
        
        // Ensure we don't exceed the total number of items
        itemsPerView = Math.max(1, Math.min(itemsPerView, this.items.length));
        
        // Store this for use in updateTrack
        this.itemsPerView = itemsPerView;
            
        // Use the configured card width directly instead of calculating from container
        const itemWidth = `${cardWidth}px`;
        
        this.items.forEach(item => {
            item.style.flex = `0 0 ${itemWidth}`;
            item.style.maxWidth = itemWidth;
            item.style.width = itemWidth;
        });
        
        // Update maxIndex based on actual items that fit
        this.maxIndex = Math.max(0, this.items.length - itemsPerView);
        this.currentIndex = Math.min(this.currentIndex, this.maxIndex);
        
    }

    setupEventListeners() {
        // Navigation buttons
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => {
                this.prev();
            });
        }
        
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => {
                this.next();
            });
        }
        
        // Dots navigation
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => this.goToSlide(index));
        });
        
        // Touch/swipe support
        this.setupTouchEvents();
        
        // Keyboard navigation
        this.container.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.prev();
            if (e.key === 'ArrowRight') this.next();
        });
        
        // Pause autoplay on hover
        this.container.addEventListener('mouseenter', () => this.stopAutoplay());
        this.container.addEventListener('mouseleave', () => this.startAutoplay());
        
        // Pause autoplay when page is not visible
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                this.stopAutoplay();
            } else {
                this.startAutoplay();
            }
        });
    }
    
    setupTouchEvents() {
        let startX = 0;
        let startY = 0;
        let isDragging = false;
        
        this.track.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            startY = e.touches[0].clientY;
            isDragging = true;
            this.stopAutoplay();
        });
        
        this.track.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            
            const currentX = e.touches[0].clientX;
            const currentY = e.touches[0].clientY;
            const diffX = startX - currentX;
            const diffY = startY - currentY;
            
            // Prevent vertical scrolling if horizontal swipe is detected
            if (Math.abs(diffX) > Math.abs(diffY)) {
                e.preventDefault();
            }
        });
        
        this.track.addEventListener('touchend', (e) => {
            if (!isDragging) return;
            
            const endX = e.changedTouches[0].clientX;
            const diffX = startX - endX;
            const threshold = 50;
            
            if (Math.abs(diffX) > threshold) {
                if (diffX > 0) {
                    this.next();
                } else {
                    this.prev();
                }
            }
            
            isDragging = false;
            this.startAutoplay();
        });
    }
    
    setupResponsive() {
        let resizeTimeout;
        
        const updateItemsPerView = () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                // Only apply responsive behavior if no specific items_per_view is configured
                if (!this.config.items_per_view || this.config.items_per_view === 0) {
                    const width = window.innerWidth;
                    let maxItemsPerView;
                    
                    // Set maximum items per view based on screen size
                    if (width <= 480) {
                        maxItemsPerView = 1;
                    } else if (width <= 768) {
                        maxItemsPerView = 2;
                    } else if (width <= 1024) {
                        maxItemsPerView = 3;
                    } else {
                        maxItemsPerView = 4;
                    }
                    
                    // Update the maximum allowed items per view
                    this.config.items_per_view = maxItemsPerView;
                }
                
                // Recalculate based on available width
                this.updateItemWidths();
                this.updateTrack();
                this.updateNavigation();
            }, 100); // Debounce resize events
        };
        
        window.addEventListener('resize', updateItemsPerView);
        updateItemsPerView();
    }
    
    prev() {
        if (this.isTransitioning) return;
        
        this.currentIndex = Math.max(0, this.currentIndex - 1);
        
        this.updateTrack();
        this.updateNavigation();
    }
    
    next() {
        if (this.isTransitioning) return;
        
        this.currentIndex = Math.min(this.maxIndex, this.currentIndex + 1);
        this.updateTrack();
        this.updateNavigation();
    }
    
    goToSlide(index) {
        if (this.isTransitioning) return;
        
        this.currentIndex = Math.max(0, Math.min(this.maxIndex, index));
        this.updateTrack();
        this.updateNavigation();
    }
    
    updateTrack() {
        if (!this.track) return;

    this.isTransitioning = true;
    this.track.classList.add('smooth');

    const gap = 16;
    const cardWidth = this.config.card_width || 280;

    const containerWidth = this.track.parentElement.offsetWidth;
    const totalContentWidth = this.items.length * (cardWidth + gap) - gap;

    let translateX = -(this.currentIndex * (cardWidth + gap));

    // ✅ Correct the last slide overflow issue
    const maxTranslate = totalContentWidth - containerWidth;
    if (-translateX > maxTranslate) {
        translateX = -maxTranslate;
    }

    this.track.style.transform = `translateX(${translateX}px)`;

    setTimeout(() => {
        this.track.classList.remove('smooth');
        this.isTransitioning = false;
    }, 300);
    }
    
    updateNavigation() {
        // Update prev/next buttons
        if (this.prevBtn) {
            this.prevBtn.disabled = this.currentIndex === 0;
        }
        
        if (this.nextBtn) {
            this.nextBtn.disabled = this.currentIndex >= this.maxIndex;
        }
        
        // Update dots
        this.dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === this.currentIndex);
        });
    }
    
    startAutoplay() {
        if (!this.config.autoplay || this.maxIndex === 0) return;
        
        this.stopAutoplay();
        this.autoplayInterval = setInterval(() => {
            if (this.currentIndex >= this.maxIndex) {
                this.currentIndex = 0;
            } else {
                this.currentIndex++;
            }
            this.updateTrack();
            this.updateNavigation();
        }, this.config.autoplay_delay);
    }
    
    stopAutoplay() {
        if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
            this.autoplayInterval = null;
        }
    }
    
    destroy() {
        this.stopAutoplay();
        // Remove event listeners if needed
    }
}

// Function to initialize carousels
function initializeCarousels(id, carousel_config) { 
    // Look for the specific carousel container by ID
    const carouselContainer = document.getElementById(id);
    
    if (!carouselContainer) {
        console.error('Carousel: Container not found for ID:', id);
        return;
    }

    try {
        new Carousel(carouselContainer, carousel_config);
    } catch (error) {
        console.error('Carousel: Error creating carousel for', id, ':', error);
    }
}

// Initialize carousels after a delay to ensure PHP configs are loaded
// setTimeout(function() {
//     initializeCarousels();
// }, 1000);

// Export for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = Carousel;
}
