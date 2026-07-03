<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    
    <!-- Header -->
    <header class="site-header">
        <div class="container header-container">
            
            <!-- Logo -->
            <div class="site-branding">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
                        <span>Amar</span> Legal
                    </a>
                    <?php
                }
                ?>
            </div>
            
            <!-- Navigation -->
            <nav class="main-navigation" id="main-navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'amar_legal_fallback_menu',
                ) );
                ?>
            </nav>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
        </div>
    </header>

    <main id="main" class="site-main">
<?php

/**
 * Fallback menu if no menu is set
 */
function amar_legal_fallback_menu() {
    ?>
    <ul id="primary-menu">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About</a></li>
        <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a></li>
        <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
    </ul>
    <?php
}
