<?php get_header(); ?>

<main>
    <div class="container">
        <div class="page-content">
            <section class="hero-section">
                <h1>Doctor Consult</h1>
                <h2>Book your appointment easily</h2>
                <p>Get professional medical consultation from qualified doctors from the comfort of your home.</p>
                <button class="cta-button">Book Appointment</button>
            </section>

            <section class="services-section">
                <h3>Our Services</h3>
                <div class="services-grid">
                    <div class="service-card">
                        <i class="fas fa-user-md"></i>
                        <h4>General Consultation</h4>
                        <p>Consult with experienced general practitioners for common health issues.</p>
                    </div>
                    <div class="service-card">
                        <i class="fas fa-stethoscope"></i>
                        <h4>Specialist Consultation</h4>
                        <p>Get expert advice from specialists in various medical fields.</p>
                    </div>
                    <div class="service-card">
                        <i class="fas fa-video"></i>
                        <h4>Telemedicine</h4>
                        <p>Connect with doctors via video calls for remote consultations.</p>
                    </div>
                </div>
            </section>

            <section class="contact-section">
                <h3>Contact Information</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>Email: contact@doctorconsult.com</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>Phone: +91 1234567890</span>
                    </div>
                </div>
            </section>

            <!-- React App Section -->
            <section class="react-app-section">
                <div id="doctor-consult-react-app"></div>
            </section>
        </div>
    </div>
</main>

<?php get_footer(); ?>