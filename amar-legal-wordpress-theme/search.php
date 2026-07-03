<?php
/**
 * The template for displaying search results pages
 * 
 * @package Amar_Legal
 * @since 1.0.0
 */

get_header();
?>

<section class="page-header">
    <div class="container">
        <h1>
            <?php
            printf( esc_html__( 'Search Results for: %s', 'amar-legal' ), '<span>' . get_search_query() . '</span>' );
            ?>
        </h1>
    </div>
</section>

<div class="container section-padding">
    
    <?php if ( have_posts() ) : ?>
        
        <div class="search-results">
            
            <?php while ( have_posts() ) : the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'search-result-item' ); ?>>
                    
                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    
                    <div class="entry-meta">
                        <span class="post-date"><?php echo esc_html( get_the_date() ); ?></span>
                    </div>
                    
                    <div class="entry-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
                    
                </article>
                
            <?php endwhile; ?>
            
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( '&laquo; Previous', 'amar-legal' ),
                'next_text' => __( 'Next &raquo;', 'amar-legal' ),
            ) );
            ?>
            
        </div>
        
    <?php else : ?>
        
        <div class="no-results text-center">
            <h2><?php esc_html_e( 'No Results Found', 'amar-legal' ); ?></h2>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'amar-legal' ); ?></p>
            <?php get_search_form(); ?>
        </div>
        
    <?php endif; ?>
    
</div>

<?php
get_footer();
