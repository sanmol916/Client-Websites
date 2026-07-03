<?php
/**
 * Front page (Home) template.
 * All text and images are editable in Customizer → Amar Legal — Page Content.
 *
 * @package Amar_Legal
 */

get_header();
?>

<!-- HERO -->
<section class="hero">
  <div class="hero__bg"><img src="<?php echo amar_legal_pic( 'home_hero_image' ); ?>" alt="<?php bloginfo( 'name' ); ?> office" /></div>
  <div class="wrap">
    <div class="hero__inner">
      <span class="eyebrow"><?php amar_legal_e( 'home_hero_eyebrow' ); ?></span>
      <h1><?php echo amar_legal_heading_highlight( 'home_hero_title', 'home_hero_highlight' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></h1>
      <p><?php amar_legal_e( 'home_hero_text' ); ?></p>
      <div class="hero__actions">
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--gold"><?php amar_legal_e( 'home_hero_btn1' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/practice-areas/' ) ); ?>" class="btn btn--outline"><?php amar_legal_e( 'home_hero_btn2' ); ?></a>
      </div>
      <div class="hero__stats">
        <div class="hero__stat"><div class="num"><?php amar_legal_e( 'home_stat1_num' ); ?></div><div class="label"><?php amar_legal_e( 'home_stat1_label' ); ?></div></div>
        <div class="hero__stat"><div class="num"><?php amar_legal_e( 'home_stat2_num' ); ?></div><div class="label"><?php amar_legal_e( 'home_stat2_label' ); ?></div></div>
        <div class="hero__stat"><div class="num"><?php amar_legal_e( 'home_stat3_num' ); ?></div><div class="label"><?php amar_legal_e( 'home_stat3_label' ); ?></div></div>
      </div>
    </div>
  </div>
</section>

<!-- PHILOSOPHY -->
<section class="section">
  <div class="wrap split">
    <div class="split__media reveal">
      <img src="<?php echo amar_legal_pic( 'home_intro_image' ); ?>" alt="Inside <?php bloginfo( 'name' ); ?> chambers" />
      <div class="badge"><div class="num"><?php amar_legal_e( 'home_intro_badge_num' ); ?></div><div class="txt"><?php amar_legal_e( 'home_intro_badge_txt' ); ?></div></div>
    </div>
    <div class="prose reveal">
      <span class="eyebrow"><?php amar_legal_e( 'home_intro_eyebrow' ); ?></span>
      <h2><?php amar_legal_e( 'home_intro_title' ); ?></h2>
      <p><?php amar_legal_e( 'home_intro_p1' ); ?></p>
      <p><?php amar_legal_e( 'home_intro_p2' ); ?></p>
      <ul class="ticks">
        <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#c9a24b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg> <?php amar_legal_e( 'home_intro_tick1' ); ?></li>
        <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#c9a24b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg> <?php amar_legal_e( 'home_intro_tick2' ); ?></li>
        <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#c9a24b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg> <?php amar_legal_e( 'home_intro_tick3' ); ?></li>
      </ul>
      <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn btn--ghost"><?php amar_legal_e( 'home_intro_btn' ); ?></a>
    </div>
  </div>
</section>

<!-- PRACTICE AREAS -->
<section class="section section--tint">
  <div class="wrap">
    <div class="section-head center">
      <span class="eyebrow"><?php amar_legal_e( 'home_pa_eyebrow' ); ?></span>
      <h2><?php amar_legal_e( 'home_pa_title' ); ?></h2>
      <p class="lead mx-auto"><?php amar_legal_e( 'home_pa_subtitle' ); ?></p>
    </div>
    <div class="grid grid--3">
      <?php
      $icons = array(
        '<path d="M12 3l8 4v5c0 5-3.5 7.5-8 9-4.5-1.5-8-4-8-9V7l8-4z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>',
        '<path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>',
        '<path d="M12 21s-7-4.5-7-10a4 4 0 017-2 4 4 0 017 2c0 5.5-7 10-7 10z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>',
        '<path d="M4 6h16M4 12h16M4 18h10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
        '<path d="M3 9l9-6 9 6v11a1 1 0 01-1 1H4a1 1 0 01-1-1V9z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>',
        '<path d="M8 3h6l4 4v14H6V3h2z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M9 12h6M9 16h6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
      );
      for ( $i = 1; $i <= 6; $i++ ) : ?>
      <article class="card reveal">
        <div class="card__icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><?php echo $icons[ $i - 1 ]; // phpcs:ignore ?></svg></div>
        <h3><?php amar_legal_e( 'home_pa' . $i . '_title' ); ?></h3>
        <p><?php amar_legal_e( 'home_pa' . $i . '_text' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/practice-areas/' ) ); ?>" class="card__link">Learn more <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      </article>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- WHY CHOOSE -->
<section class="section section--navy">
  <div class="wrap">
    <div class="section-head center">
      <span class="eyebrow">Why <?php bloginfo( 'name' ); ?></span>
      <h2 style="color:#fff"><?php amar_legal_e( 'home_why_title' ); ?></h2>
    </div>
    <div class="grid grid--4">
      <?php
      $why_icons = array(
        '<path d="M12 2l2.5 6.5L21 9l-5 4.5L17.5 20 12 16.5 6.5 20 8 13.5 3 9l6.5-.5L12 2z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
        '<path d="M12 3l8 4v5c0 5-3.5 7.5-8 9-4.5-1.5-8-4-8-9V7l8-4z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
        '<circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.6"/><path d="M4 21c0-4 3.5-6 8-6s8 2 8 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
        '<path d="M12 6v6l4 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/>',
      );
      for ( $i = 1; $i <= 4; $i++ ) : ?>
      <div class="feature reveal">
        <div class="feature__icon"><svg width="30" height="30" viewBox="0 0 24 24" fill="none"><?php echo $why_icons[ $i - 1 ]; // phpcs:ignore ?></svg></div>
        <h3><?php amar_legal_e( 'home_why' . $i . '_title' ); ?></h3>
        <p><?php amar_legal_e( 'home_why' . $i . '_text' ); ?></p>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- QUOTE -->
<section class="section">
  <div class="wrap">
    <div class="quote reveal">
      <div class="quote__mark">&ldquo;</div>
      <p style="color:var(--navy-900)"><?php amar_legal_e( 'home_quote_text' ); ?></p>
      <div class="quote__by"><?php amar_legal_e( 'home_quote_by' ); ?></div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-strip">
  <div class="cta-strip__bg"><img src="<?php echo amar_legal_pic( 'home_cta_image' ); ?>" alt="Consultation" /></div>
  <div class="wrap cta-strip__inner">
    <h2><?php amar_legal_e( 'home_cta_title' ); ?></h2>
    <p><?php amar_legal_e( 'home_cta_text' ); ?></p>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--gold"><?php amar_legal_e( 'home_cta_btn' ); ?></a>
  </div>
</section>

<?php get_footer(); ?>
