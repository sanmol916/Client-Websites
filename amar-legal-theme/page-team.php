<?php
/**
 * Template Name: Amar Legal — Team
 * Editable in Customizer → Amar Legal — Page Content → Team.
 *
 * @package Amar_Legal
 */

get_header();
?>

<section class="page-banner">
  <div class="page-banner__bg"><img src="<?php echo amar_legal_pic( 'team_banner_image' ); ?>" alt="Our team" /></div>
  <div class="wrap page-banner__inner">
    <h1>Our Team</h1>
    <div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> <span>/</span> Our Team</div>
  </div>
</section>

<!-- LEADERSHIP -->
<section class="section">
  <div class="wrap split">
    <div class="split__media reveal"><img src="<?php echo amar_legal_pic( 'team_lead_image' ); ?>" alt="Founder, <?php bloginfo( 'name' ); ?>" /></div>
    <div class="prose reveal">
      <span class="eyebrow"><?php amar_legal_e( 'team_lead_eyebrow' ); ?></span>
      <h2><?php amar_legal_e( 'team_lead_title' ); ?></h2>
      <p><?php amar_legal_e( 'team_lead_p1' ); ?></p>
      <p><?php amar_legal_e( 'team_lead_p2' ); ?></p>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--ghost"><?php amar_legal_e( 'team_lead_btn' ); ?></a>
    </div>
  </div>
</section>

<!-- TEAM GRID -->
<section class="section section--tint">
  <div class="wrap">
    <div class="section-head center">
      <span class="eyebrow"><?php amar_legal_e( 'team_grid_eyebrow' ); ?></span>
      <h2><?php amar_legal_e( 'team_grid_title' ); ?></h2>
      <p class="lead mx-auto"><?php amar_legal_e( 'team_grid_subtitle' ); ?></p>
    </div>
    <div class="grid grid--3">
      <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
      <article class="team-card reveal">
        <div class="team-card__photo"><img src="<?php echo amar_legal_pic( 'team_m' . $i . '_photo' ); ?>" alt="<?php echo esc_attr( amar_legal_text( 'team_m' . $i . '_name' ) ); ?>" /></div>
        <div class="team-card__body">
          <h3><?php amar_legal_e( 'team_m' . $i . '_name' ); ?></h3>
          <div class="team-card__role"><?php amar_legal_e( 'team_m' . $i . '_role' ); ?></div>
          <p><?php amar_legal_e( 'team_m' . $i . '_bio' ); ?></p>
        </div>
      </article>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- COMMITMENT -->
<section class="section section--navy">
  <div class="wrap">
    <div class="section-head center">
      <span class="eyebrow">Our Commitment</span>
      <h2 style="color:#fff"><?php amar_legal_e( 'team_commit_title' ); ?></h2>
    </div>
    <div class="grid grid--3">
      <?php
      $commit_icons = array(
        '<path d="M12 6v6l4 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/>',
        '<path d="M12 3l8 4v5c0 5-3.5 7.5-8 9-4.5-1.5-8-4-8-9V7l8-4z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>',
        '<path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
      );
      for ( $i = 1; $i <= 3; $i++ ) : ?>
      <div class="feature reveal">
        <div class="feature__icon"><svg width="30" height="30" viewBox="0 0 24 24" fill="none"><?php echo $commit_icons[ $i - 1 ]; // phpcs:ignore ?></svg></div>
        <h3><?php amar_legal_e( 'team_c' . $i . '_title' ); ?></h3>
        <p><?php amar_legal_e( 'team_c' . $i . '_text' ); ?></p>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<section class="cta-strip">
  <div class="cta-strip__bg"><img src="<?php echo amar_legal_pic( 'team_cta_image' ); ?>" alt="Consultation" /></div>
  <div class="wrap cta-strip__inner">
    <h2><?php amar_legal_e( 'team_cta_title' ); ?></h2>
    <p><?php amar_legal_e( 'team_cta_text' ); ?></p>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--gold"><?php amar_legal_e( 'team_cta_btn' ); ?></a>
  </div>
</section>

<?php get_footer(); ?>
