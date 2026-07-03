<?php
/**
 * Single post template.
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
    <div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> <span>/</span> <?php echo esc_html( get_the_date() ); ?></div>
  </div>
</section>

<section class="section">
  <div class="wrap" style="max-width:820px">
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="split__media" style="margin-bottom:36px"><?php the_post_thumbnail( 'large' ); ?></div>
    <?php endif; ?>
    <div class="prose">
      <?php
      the_content();
      wp_link_pages();
      ?>
    </div>
    <div style="margin-top:40px"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--ghost">&larr; Back to Home</a></div>
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>
