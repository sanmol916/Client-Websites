<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="wrap nav">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <span class="brand__mark">A</span>
        <span>
          <span class="brand__name"><?php bloginfo( 'name' ); ?></span>
          <span class="brand__tag">Advocates &amp; Consultants</span>
        </span>
      <?php endif; ?>
    </a>

    <?php
    wp_nav_menu( array(
      'theme_location' => 'primary',
      'container'      => false,
      'menu_class'     => 'nav__links',
      'menu_id'        => 'primary-menu',
      'fallback_cb'    => 'amar_legal_fallback_menu',
      'depth'          => 1,
    ) );
    ?>

    <div class="nav__cta">
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--dark">Book Consultation</a>
      <button class="nav__toggle" aria-label="Menu" aria-expanded="false"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>
