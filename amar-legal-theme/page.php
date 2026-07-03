<?php
/**
 * Generic page fallback (for any page without a specific template).
 *
 * @package Amar_Legal
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<section class="page-banner">
  <div class="page-banner__bg"><img src="<?php echo amar_legal_img( 'banner-about.jpg' ); ?>" alt="<?php the_title_attribute(); ?>" /></div>
  <div class="wrap page-banner__inner">
    <h1><?php the_title(); ?></h1>
    <div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> <span>/</span> <?php the_title(); ?></div>
  </div>
</section>

<section class="section">
  <div class="wrap" style="max-width:860px">
    <div class="prose">
      <?php
      if ( has_post_thumbnail() ) {
        echo '<div class="split__media" style="margin-bottom:32px">';
        the_post_thumbnail( 'large' );
        echo '</div>';
      }
      the_content();
      wp_link_pages();
      ?>
    </div>
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>
