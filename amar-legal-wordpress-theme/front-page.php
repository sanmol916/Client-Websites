<?php
/**
 * The front page template file
 * 
 * @package Amar_Legal
 * @since 1.0.0
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content fade-in-up">
            <h1><?php echo esc_html( amar_legal_get_option( 'amar_legal_hero_title', 'Amar Legal' ) ); ?></h1>
            <p><?php echo esc_html( amar_legal_get_option( 'amar_legal_hero_description', 'Professional Legal Services You Can Trust' ) ); ?></p>
            <div class="hero-buttons">
                <a href="#contact" class="btn btn-primary">Get Consultation</a>
                <a href="#about" class="btn btn-secondary">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section section-padding">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>About Amar Legal</h2>
                <p>Law has evolved with the evolution of civilization. Civil society has found it useful to give prominence to law with a view to inculcate discipline in the lives of its members, so as each member contributes in development of a society where each and every member can lead a life of dignity, in a social environment of peace and harmony, giving due honour to the rights, duties and privileges of their co-members.</p>
                <p>Today, law has taken an institutionalized framework and continuously thriving to achieve a goal of a society where all its members can progress without disturbing rights and privileges of others contributing to a society full of peace, harmony, discipline and spirit of co-existence.</p>
                <p>At Amar Legal, we are committed to upholding these principles while providing exceptional legal services tailored to your unique needs.</p>
            </div>
            <div class="about-image">
                <?php
                // Check if there's a featured image set for the page
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'amar-legal-medium' );
                } else {
                    // Placeholder
                    echo '<img src="' . get_template_directory_uri() . '/assets/images/about-placeholder.jpg" alt="About Amar Legal" />';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Practice Areas / Services Section -->
<section id="services" class="services-section section-padding">
    <div class="container text-center">
        <h2 class="section-title">Our Practice Areas</h2>
        <p class="section-subtitle">We provide comprehensive legal services across multiple practice areas to meet all your legal needs.</p>
        
        <div class="services-grid">
            
            <div class="service-card">
                <div class="service-icon">⚖️</div>
                <h3>Civil Law</h3>
                <p>Expert representation in civil disputes, property matters, and contract law.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🏢</div>
                <h3>Corporate Law</h3>
                <p>Comprehensive legal solutions for businesses, compliance, and corporate governance.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">👨‍👩‍👧</div>
                <h3>Family Law</h3>
                <p>Sensitive handling of divorce, custody, and family-related legal matters.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">⚡</div>
                <h3>Criminal Defense</h3>
                <p>Strong defense representation in criminal cases with proven track record.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🏠</div>
                <h3>Property Law</h3>
                <p>Expert advice on real estate transactions, disputes, and documentation.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">📋</div>
                <h3>Legal Documentation</h3>
                <p>Professional drafting of contracts, agreements, and legal documents.</p>
            </div>
            
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-section section-padding">
    <div class="container text-center">
        <h2 class="section-title">Why Choose Amar Legal</h2>
        <p class="section-subtitle">We are committed to providing exceptional legal services with integrity, professionalism, and results.</p>
        
        <div class="features-grid">
            
            <div class="feature-item">
                <div class="feature-icon">🎓</div>
                <h3>Experienced Professionals</h3>
                <p>Our team consists of highly qualified legal professionals with years of experience.</p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">💼</div>
                <h3>Client-Focused Approach</h3>
                <p>We prioritize your needs and work tirelessly to achieve the best outcomes.</p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">✅</div>
                <h3>Proven Track Record</h3>
                <p>Successful representation in numerous cases across various legal domains.</p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">🤝</div>
                <h3>Transparent Communication</h3>
                <p>Clear, honest communication throughout your legal journey.</p>
            </div>
            
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section section-padding">
    <div class="container text-center">
        <h2 class="section-title">Get In Touch</h2>
        <p class="section-subtitle">Ready to discuss your legal needs? Contact us today for a consultation.</p>
        
        <div class="contact-container">
            
            <!-- Contact Information -->
            <div class="contact-info">
                <h3>Contact Information</h3>
                
                <?php if ( $phone = amar_legal_get_option( 'amar_legal_phone' ) ) : ?>
                    <div class="contact-item">
                        <div class="contact-icon">📞</div>
                        <div class="contact-item-content">
                            <h4>Phone</h4>
                            <p><a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a></p>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ( $email = amar_legal_get_option( 'amar_legal_email' ) ) : ?>
                    <div class="contact-item">
                        <div class="contact-icon">✉️</div>
                        <div class="contact-item-content">
                            <h4>Email</h4>
                            <p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ( $address = amar_legal_get_option( 'amar_legal_address' ) ) : ?>
                    <div class="contact-item">
                        <div class="contact-icon">📍</div>
                        <div class="contact-item-content">
                            <h4>Address</h4>
                            <p><?php echo esc_html( $address ); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ( $hours = amar_legal_get_option( 'amar_legal_hours' ) ) : ?>
                    <div class="contact-item">
                        <div class="contact-icon">🕒</div>
                        <div class="contact-item-content">
                            <h4>Office Hours</h4>
                            <p><?php echo esc_html( $hours ); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
            
            <!-- Contact Form -->
            <div class="contact-form">
                <h3>Send Us a Message</h3>
                
                <?php
                // Display success/error messages
                if ( isset( $_GET['contact'] ) ) {
                    if ( $_GET['contact'] === 'success' ) {
                        echo '<div class="form-message success">Thank you for your message! We will get back to you soon.</div>';
                    } elseif ( $_GET['contact'] === 'error' ) {
                        echo '<div class="form-message error">Sorry, there was an error sending your message. Please try again.</div>';
                    }
                }
                ?>
                
                <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST">
                    <?php wp_nonce_field( 'amar_legal_contact_form', 'amar_legal_nonce' ); ?>
                    <input type="hidden" name="action" value="amar_legal_contact_form">
                    
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject">
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
            
        </div>
    </div>
</section>

<?php
get_footer();
