<?php
/**
 * The template for displaying all single posts
 * 
 * @package Amar_Legal
 * @since 1.0.0
 */

get_header();
?>

<section class="page-header">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="post-meta">
            <span class="post-date">
                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                    <?php echo esc_html( get_the_date() ); ?>
                </time>
            </span>
            <span class="post-author">by <?php the_author(); ?></span>
        </div>
    </div>
</section>

<div class="container section-padding">
    
    <div class="single-post-content">
        
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

                <div class="post-footer">
                    <?php
                    // Post categories
                    $categories_list = get_the_category_list( esc_html__( ', ', 'amar-legal' ) );
                    if ( $categories_list ) {
                        printf( '<div class="cat-links"><strong>Categories:</strong> %s</div>', $categories_list );
                    }

                    // Post tags
                    $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'amar-legal' ) );
                    if ( $tags_list ) {
                        printf( '<div class="tags-links"><strong>Tags:</strong> %s</div>', $tags_list );
                    }
                    ?>
                </div>

                <?php
                // Post navigation
                the_post_navigation( array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'amar-legal' ) . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'amar-legal' ) . '</span> <span class="nav-title">%title</span>',
                ) );
                ?>

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
