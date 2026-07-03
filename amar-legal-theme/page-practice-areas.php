<?php
/**
 * Template Name: Amar Legal — Practice Areas
 * Editable in Customizer → Amar Legal — Page Content → Practice.
 *
 * @package Amar_Legal
 */

get_header();
?>

<section class="page-banner">
  <div class="page-banner__bg"><img src="<?php echo amar_legal_pic( 'practice_banner_image' ); ?>" alt="Practice areas" /></div>
  <div class="wrap page-banner__inner">
    <h1>Our Practice Areas</h1>
    <div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> <span>/</span> Practice Areas</div>
  </div>
</section>

<section class="section">
  <div class="wrap section-head center">
    <span class="eyebrow"><?php amar_legal_e( 'practice_intro_eyebrow' ); ?></span>
    <h2><?php amar_legal_e( 'practice_intro_title' ); ?></h2>
    <p class="lead mx-auto"><?php amar_legal_e( 'practice_intro_subtitle' ); ?></p>
  </div>
</section>

<section class="section section--tint">
  <div class="wrap">
    <div class="split" style="margin-bottom:64px">
      <div class="split__media reveal"><img src="<?php echo amar_legal_pic( 'practice_d1_image' ); ?>" alt="Civil litigation" /></div>
      <div class="prose reveal">
        <span class="eyebrow">01 &mdash; Civil Law</span>
        <h2><?php amar_legal_e( 'practice_d1_title' ); ?></h2>
        <p><?php amar_legal_e( 'practice_d1_text' ); ?></p>
      </div>
    </div>

    <div class="split" style="margin-bottom:64px">
      <div class="prose reveal">
        <span class="eyebrow">02 &mdash; Corporate</span>
        <h2><?php amar_legal_e( 'practice_d2_title' ); ?></h2>
        <p><?php amar_legal_e( 'practice_d2_text' ); ?></p>
      </div>
      <div class="split__media reveal"><img src="<?php echo amar_legal_pic( 'practice_d2_image' ); ?>" alt="Corporate law" /></div>
    </div>

    <div class="split">
      <div class="split__media reveal"><img src="<?php echo amar_legal_pic( 'practice_d3_image' ); ?>" alt="Family law" /></div>
      <div class="prose reveal">
        <span class="eyebrow">03 &mdash; Family</span>
        <h2><?php amar_legal_e( 'practice_d3_title' ); ?></h2>
        <p><?php amar_legal_e( 'practice_d3_text' ); ?></p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head center">
      <span class="eyebrow">Further Expertise</span>
      <h2><?php amar_legal_e( 'practice_more_title' ); ?></h2>
    </div>
    <div class="grid grid--3">
      <?php
      $more_icons = array(
        '<path d="M4 6h16M4 12h16M4 18h10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
        '<path d="M3 9l9-6 9 6v11a1 1 0 01-1 1H4a1 1 0 01-1-1V9z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>',
        '<path d="M8 3h6l4 4v14H6V3h2z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M9 12h6M9 16h6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
        '<path d="M12 3v18M5 8l7-5 7 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        '<path d="M7 8h10M7 12h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M3 5h18v14H3z" stroke="currentColor" stroke-width="1.7"/>',
        '<path d="M12 3l8 4v5c0 5-3.5 7.5-8 9-4.5-1.5-8-4-8-9V7l8-4z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>',
      );
      for ( $i = 1; $i <= 6; $i++ ) : ?>
      <article class="card reveal">
        <div class="card__icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><?php echo $more_icons[ $i - 1 ]; // phpcs:ignore ?></svg></div>
        <h3><?php amar_legal_e( 'practice_m' . $i . '_title' ); ?></h3>
        <p><?php amar_legal_e( 'practice_m' . $i . '_text' ); ?></p>
      </article>
      <?php endfor; ?>
    </div>
  </div>
</section>

<section class="cta-strip">
  <div class="cta-strip__bg"><img src="<?php echo amar_legal_pic( 'practice_cta_image' ); ?>" alt="Consultation" /></div>
  <div class="wrap cta-strip__inner">
    <h2><?php amar_legal_e( 'practice_cta_title' ); ?></h2>
    <p><?php amar_legal_e( 'practice_cta_text' ); ?></p>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--gold"><?php amar_legal_e( 'practice_cta_btn' ); ?></a>
  </div>
</section>

<?php get_footer(); ?>
