<?php
/**
 * Template Name: Amar Legal — About
 * Editable in Customizer → Amar Legal — Page Content → About.
 *
 * @package Amar_Legal
 */

get_header();
?>

<section class="page-banner">
  <div class="page-banner__bg"><img src="<?php echo amar_legal_pic( 'about_banner_image' ); ?>" alt="About <?php bloginfo( 'name' ); ?>" /></div>
  <div class="wrap page-banner__inner">
    <h1>About <?php bloginfo( 'name' ); ?></h1>
    <div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> <span>/</span> About</div>
  </div>
</section>

<!-- STORY -->
<section class="section">
  <div class="wrap split">
    <div class="split__media reveal">
      <img src="<?php echo amar_legal_pic( 'about_story_image' ); ?>" alt="<?php bloginfo( 'name' ); ?> chambers" />
      <div class="badge"><div class="num"><?php amar_legal_e( 'about_badge_num' ); ?></div><div class="txt"><?php amar_legal_e( 'about_badge_txt' ); ?></div></div>
    </div>
    <div class="prose reveal">
      <span class="eyebrow"><?php amar_legal_e( 'about_story_eyebrow' ); ?></span>
      <h2><?php amar_legal_e( 'about_story_title' ); ?></h2>
      <p><?php amar_legal_e( 'about_story_p1' ); ?></p>
      <p><?php amar_legal_e( 'about_story_p2' ); ?></p>
      <p><?php amar_legal_e( 'about_story_p3' ); ?></p>
    </div>
  </div>
</section>

<!-- MISSION / VISION -->
<section class="section section--tint">
  <div class="wrap">
    <div class="grid grid--2">
      <div class="card reveal">
        <div class="card__icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.7"/></svg></div>
        <h3><?php amar_legal_e( 'about_mission_title' ); ?></h3>
        <p><?php amar_legal_e( 'about_mission_text' ); ?></p>
      </div>
      <div class="card reveal">
        <div class="card__icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.7"/></svg></div>
        <h3><?php amar_legal_e( 'about_vision_title' ); ?></h3>
        <p><?php amar_legal_e( 'about_vision_text' ); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- VALUES -->
<section class="section">
  <div class="wrap">
    <div class="section-head center">
      <span class="eyebrow"><?php amar_legal_e( 'about_values_eyebrow' ); ?></span>
      <h2><?php amar_legal_e( 'about_values_title' ); ?></h2>
      <p class="lead mx-auto"><?php amar_legal_e( 'about_values_subtitle' ); ?></p>
    </div>
    <div class="grid grid--4">
      <?php
      $val_icons = array(
        '<path d="M12 3l8 4v5c0 5-3.5 7.5-8 9-4.5-1.5-8-4-8-9V7l8-4z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>',
        '<path d="M12 2l2.5 6.5L21 9l-5 4.5L17.5 20 12 16.5 6.5 20 8 13.5 3 9l6.5-.5L12 2z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
        '<circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.7"/><path d="M4 21c0-4 3.5-6 8-6s8 2 8 6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
        '<path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
      );
      for ( $i = 1; $i <= 4; $i++ ) : ?>
      <div class="feature reveal">
        <div class="feature__icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none"><?php echo $val_icons[ $i - 1 ]; // phpcs:ignore ?></svg></div>
        <h3><?php amar_legal_e( 'about_val' . $i . '_title' ); ?></h3>
        <p><?php amar_legal_e( 'about_val' . $i . '_text' ); ?></p>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- WHY CHOOSE -->
<section class="section section--navy">
  <div class="wrap split">
    <div class="prose reveal">
      <span class="eyebrow"><?php amar_legal_e( 'about_why_eyebrow' ); ?></span>
      <h2 style="color:#fff"><?php amar_legal_e( 'about_why_title' ); ?></h2>
      <p style="color:rgba(255,255,255,0.8)"><?php amar_legal_e( 'about_why_text' ); ?></p>
      <ul class="ticks">
        <li style="color:#fff"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#c9a24b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg> <?php amar_legal_e( 'about_why_tick1' ); ?></li>
        <li style="color:#fff"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#c9a24b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg> <?php amar_legal_e( 'about_why_tick2' ); ?></li>
        <li style="color:#fff"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#c9a24b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg> <?php amar_legal_e( 'about_why_tick3' ); ?></li>
      </ul>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--gold"><?php amar_legal_e( 'about_why_btn' ); ?></a>
    </div>
    <div class="split__media reveal">
      <img src="<?php echo amar_legal_pic( 'about_why_image' ); ?>" alt="<?php bloginfo( 'name' ); ?> office" />
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-strip">
  <div class="cta-strip__bg"><img src="<?php echo amar_legal_pic( 'about_cta_image' ); ?>" alt="Consultation" /></div>
  <div class="wrap cta-strip__inner">
    <h2><?php amar_legal_e( 'about_cta_title' ); ?></h2>
    <p><?php amar_legal_e( 'about_cta_text' ); ?></p>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--gold"><?php amar_legal_e( 'about_cta_btn' ); ?></a>
  </div>
</section>

<?php get_footer(); ?>
