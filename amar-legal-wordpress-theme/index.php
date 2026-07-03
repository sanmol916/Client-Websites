<?php
/**
 * The main template file
 * 
 * @package Amar_Legal
 * @since 1.0.0
 */

get_header();
?>

<div class="container section-padding">
    
    <?php if ( have_posts() ) : ?>
        
        <div class="blog-grid">
            
            <?php while ( have_posts() ) : the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'amar-legal-medium' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content">
                        
                        <div class="post-meta">
                            <span class="post-date">
                                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </time>
                            </span>
                            <span class="post-author">
                                by <?php the_author(); ?>
                            </span>
                        </div>
                        
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
                        
                    </div>
                    
                </article>
                
            <?php endwhile; ?>
            
        </div>
        
        <?php
        // Pagination
        the_posts_pagination( array(
            'mid_size'  => 2,
            'prev_text' => __( '&laquo; Previous', 'amar-legal' ),
            'next_text' => __( 'Next &raquo;', 'amar-legal' ),
        ) );
        ?>
        
    <?php else : ?>
        
        <div class="no-posts">
            <h2><?php _e( 'Nothing Found', 'amar-legal' ); ?></h2>
            <p><?php _e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'amar-legal' ); ?></p>
            <?php get_search_form(); ?>
        </div>
        
    <?php endif; ?>
    
</div>

<?php
get_footer();
