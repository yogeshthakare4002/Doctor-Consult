<?php
/**
 * Template Name: Doctors Page
 * 
 * This template displays the React doctor consultation app
 */

get_header(); ?>

<main>
    <div class="container">
        <div class="page-header">
            <h1>Find Your Doctor</h1>
            <p>Browse and book appointments with qualified healthcare professionals</p>
        </div>
        
        <!-- React Doctor Consultation App -->
        <div class="react-app-container">
            <div id="doctor-consult-react-app"></div>
        </div>
        
        <!-- Additional Information -->
        <section class="info-section">
            <div class="info-grid">
                <div class="info-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Verified Doctors</h3>
                    <p>All our doctors are verified and licensed professionals with years of experience.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-clock"></i>
                    <h3>24/7 Available</h3>
                    <p>Book appointments anytime, anywhere with our round-the-clock service.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-video"></i>
                    <h3>Online Consultation</h3>
                    <p>Get medical advice from the comfort of your home via video calls.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-money-bill-wave"></i>
                    <h3>Affordable Rates</h3>
                    <p>Transparent pricing with no hidden charges for consultations.</p>
                </div>
            </div>
        </section>
    </div>
</main>

<style>
.page-header {
    text-align: center;
    padding: 40px 0;
    margin-bottom: 40px;
}

.page-header h1 {
    color: #00a8a8;
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 15px;
}

.page-header p {
    color: #666;
    font-size: 18px;
    max-width: 600px;
    margin: 0 auto;
}

.react-app-container {
    margin-bottom: 60px;
    padding: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.info-section {
    margin-top: 60px;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}

.info-card {
    text-align: center;
    padding: 30px 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.info-card:hover {
    transform: translateY(-5px);
}

.info-card i {
    font-size: 48px;
    color: #00a8a8;
    margin-bottom: 20px;
}

.info-card h3 {
    color: #333;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
}

.info-card p {
    color: #666;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .page-header h1 {
        font-size: 36px;
    }
    
    .page-header p {
        font-size: 16px;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}
</style>

<?php get_footer(); ?>
