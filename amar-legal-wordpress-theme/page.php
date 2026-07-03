<?php
/**
 * The template for displaying all pages
 * 
 * @package Amar_Legal
 * @since 1.0.0
 */

get_header();
?>

<section class="page-header">
    <div class="container">
        <h1><?php the_title(); ?></h1>
    </div>
</section>

<div class="container section-padding">
    
    <div class="page-content">
        
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'amar-legal' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>

                <?php if ( comments_open() || get_comments_number() ) : ?>
                    <div class="comments-section">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>

            </article>

            <?php
        endwhile;
        ?>
        
    </div>
    
</div>

<?php
get_footer();
