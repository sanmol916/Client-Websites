<?php
/**
 * Main fallback template (blog / archive / search).
 *
 * @package Amar_Legal
 */

get_header();
?>

<section class="page-banner">
  <div class="page-banner__bg"><img src="<?php echo amar_legal_img( 'banner-about.jpg' ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></div>
  <div class="wrap page-banner__inner">
    <h1>
      <?php
      if ( is_search() ) {
        printf( 'Search: %s', esc_html( get_search_query() ) );
      } elseif ( is_archive() ) {
        the_archive_title();
      } else {
        echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ? get_the_title( get_option( 'page_for_posts' ) ) : 'Latest Updates' );
      }
      ?>
    </h1>
    <div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> <span>/</span> Blog</div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <?php if ( have_posts() ) : ?>
      <div class="grid grid--3">
        <?php while ( have_posts() ) : the_post(); ?>
          <article class="card reveal">
            <?php if ( has_post_thumbnail() ) : ?>
              <a href="<?php the_permalink(); ?>" style="display:block; margin:-38px -32px 22px; border-radius:14px 14px 0 0; overflow:hidden;"><?php the_post_thumbnail( 'medium_large' ); ?></a>
            <?php endif; ?>
            <p style="font-size:0.82rem; letter-spacing:0.08em; text-transform:uppercase; color:var(--gold-500); margin-bottom:8px;"><?php echo esc_html( get_the_date() ); ?></p>
            <h3 style="margin-bottom:12px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
            <a href="<?php the_permalink(); ?>" class="card__link">Read more <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          </article>
        <?php endwhile; ?>
      </div>
      <div style="margin-top:48px; text-align:center;"><?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?></div>
    <?php else : ?>
      <p class="lead center mx-auto">Nothing has been posted yet. Please check back soon.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
