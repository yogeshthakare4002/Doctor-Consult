/**
 * Doctor Consult Theme JavaScript
 * Basic interactive features for the banner component
 */

(function($) {
    'use strict';
    
    // Initialize theme when document is ready
    $(document).ready(function() {
        initTheme();
    });
    
    function initTheme() {
        // Initialize smooth scrolling
        initSmoothScroll();
        
        // Initialize banner interactions
        initBannerInteractions();
    }
    
    /**
     * Initialize smooth scrolling for anchor links
     */
    function initSmoothScroll() {
        $('a[href*="#"]:not([href="#"])').on('click', function(e) {
            var target = $(this.hash);
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });
    }
    
    /**
     * Initialize banner interactions
     */
    function initBannerInteractions() {
        // Consult now button click handler
        $('.consult-now-btn').on('click', function(e) {
            e.preventDefault();
            
            // Add click animation
            $(this).addClass('clicked');
            setTimeout(function() {
                $('.consult-now-btn').removeClass('clicked');
            }, 200);
            
            // Here you can add actual booking logic
            console.log('Consult now button clicked');
        });
    }
    
})(jQuery);
