<?php
/**
 * The template for displaying 404 pages (not found)
 * 
 * @package Amar_Legal
 * @since 1.0.0
 */

get_header();
?>

<section class="error-404-section section-padding">
    <div class="container text-center">
        
        <h1 style="font-size: 8rem; color: var(--secondary-color); margin-bottom: 1rem;">404</h1>
        <h2><?php esc_html_e( 'Page Not Found', 'amar-legal' ); ?></h2>
        <p><?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'amar-legal' ); ?></p>
        
        <div style="margin: 3rem 0;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                <?php esc_html_e( 'Return to Homepage', 'amar-legal' ); ?>
            </a>
        </div>

        <div style="max-width: 600px; margin: 0 auto;">
            <h3><?php esc_html_e( 'Try searching for what you need:', 'amar-legal' ); ?></h3>
            <?php get_search_form(); ?>
        </div>

    </div>
</section>

<?php
get_footer();
