    </main><!-- #main -->

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            
            <div class="footer-content">
                
                <!-- Footer Widget Area 1 -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    <?php else : ?>
                        <h3><?php bloginfo( 'name' ); ?></h3>
                        <p><?php bloginfo( 'description' ); ?></p>
                        <p>Law has evolved with the evolution of civilization. We are committed to providing professional legal services with integrity and excellence.</p>
                    <?php endif; ?>
                </div>

                <!-- Footer Widget Area 2 -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    <?php else : ?>
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About Us</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Footer Widget Area 3 -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    <?php else : ?>
                        <h3>Contact Info</h3>
                        <ul>
                            <?php if ( $phone = amar_legal_get_option( 'amar_legal_phone' ) ) : ?>
                                <li>📞 <?php echo esc_html( $phone ); ?></li>
                            <?php endif; ?>
                            
                            <?php if ( $email = amar_legal_get_option( 'amar_legal_email' ) ) : ?>
                                <li>✉️ <?php echo esc_html( $email ); ?></li>
                            <?php endif; ?>
                            
                            <?php if ( $address = amar_legal_get_option( 'amar_legal_address' ) ) : ?>
                                <li>📍 <?php echo esc_html( $address ); ?></li>
                            <?php endif; ?>
                            
                            <?php if ( $hours = amar_legal_get_option( 'amar_legal_hours' ) ) : ?>
                                <li>🕒 <?php echo esc_html( $hours ); ?></li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. All rights reserved. | Designed with care for professional legal services.</p>
            </div>

        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
