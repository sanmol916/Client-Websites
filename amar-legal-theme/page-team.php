<?php
/**
 * Template Name: Amar Legal — Team
 *
 * @package Amar_Legal
 */

get_header();
?>

<section class="page-banner">
  <div class="page-banner__bg"><img src="<?php echo amar_legal_img( 'banner-team.jpg' ); ?>" alt="Our team" /></div>
  <div class="wrap page-banner__inner">
    <h1>Our Team</h1>
    <div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> <span>/</span> Our Team</div>
  </div>
</section>

<!-- LEADERSHIP -->
<section class="section">
  <div class="wrap split">
    <div class="split__media reveal"><img src="<?php echo amar_legal_img( 'founder-portrait.jpg' ); ?>" alt="Founder, <?php bloginfo( 'name' ); ?>" /></div>
    <div class="prose reveal">
      <span class="eyebrow">Leadership</span>
      <h2>A Practice Led by Conviction</h2>
      <p><?php bloginfo( 'name' ); ?> is guided by advocates who believe that the finest legal work begins with genuinely understanding the people it serves. Our leadership brings years of courtroom experience, a deep respect for the law, and a steady commitment to doing right by every client.</p>
      <p>That philosophy shapes the entire firm &mdash; a team that is approachable, meticulous, and unwavering in its dedication to your interests.</p>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--ghost">Arrange a Meeting</a>
    </div>
  </div>
</section>

<!-- TEAM GRID -->
<section class="section section--tint">
  <div class="wrap">
    <div class="section-head center">
      <span class="eyebrow">Meet the Advocates</span>
      <h2>Experienced Professionals, Genuinely Committed</h2>
      <p class="lead mx-auto">Our advocates combine specialised knowledge with a shared dedication to integrity and client care.</p>
    </div>
    <div class="grid grid--3">
      <article class="team-card reveal">
        <div class="team-card__photo"><img src="<?php echo amar_legal_img( 'attorney-1.jpg' ); ?>" alt="Advocate" /></div>
        <div class="team-card__body">
          <h3>Adv. [Name]</h3>
          <div class="team-card__role">Founder &amp; Principal Advocate</div>
          <p>Leads the firm's civil and corporate practice, with extensive experience before trial courts and appellate forums.</p>
        </div>
      </article>
      <article class="team-card reveal">
        <div class="team-card__photo"><img src="<?php echo amar_legal_img( 'attorney-2.jpg' ); ?>" alt="Advocate" /></div>
        <div class="team-card__body">
          <h3>Adv. [Name]</h3>
          <div class="team-card__role">Senior Associate</div>
          <p>Focuses on family and matrimonial matters, known for a sensitive yet effective approach to complex disputes.</p>
        </div>
      </article>
      <article class="team-card reveal">
        <div class="team-card__photo"><img src="<?php echo amar_legal_img( 'attorney-3.jpg' ); ?>" alt="Advocate" /></div>
        <div class="team-card__body">
          <h3>Adv. [Name]</h3>
          <div class="team-card__role">Associate &mdash; Criminal Defence</div>
          <p>Handles criminal defence and bail matters with diligence, ensuring clients' rights are safeguarded at every stage.</p>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- COMMITMENT -->
<section class="section section--navy">
  <div class="wrap">
    <div class="section-head center">
      <span class="eyebrow">Our Commitment</span>
      <h2 style="color:#fff">What Every Client Can Expect</h2>
    </div>
    <div class="grid grid--3">
      <div class="feature reveal">
        <div class="feature__icon"><svg width="30" height="30" viewBox="0 0 24 24" fill="none"><path d="M12 6v6l4 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/></svg></div>
        <h3>Timely Attention</h3>
        <p>Prompt responses and regular updates, so you're never left uncertain.</p>
      </div>
      <div class="feature reveal">
        <div class="feature__icon"><svg width="30" height="30" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 4v5c0 5-3.5 7.5-8 9-4.5-1.5-8-4-8-9V7l8-4z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg></div>
        <h3>Complete Confidentiality</h3>
        <p>Your matters are handled with the utmost discretion and privacy.</p>
      </div>
      <div class="feature reveal">
        <div class="feature__icon"><svg width="30" height="30" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <h3>Honest Guidance</h3>
        <p>Straightforward advice about your options &mdash; never false assurances.</p>
      </div>
    </div>
  </div>
</section>

<section class="cta-strip">
  <div class="cta-strip__bg"><img src="<?php echo amar_legal_img( 'cta-consult.jpg' ); ?>" alt="Consultation" /></div>
  <div class="wrap cta-strip__inner">
    <h2>Work With a Team That Puts You First</h2>
    <p>Schedule a consultation and experience the <?php bloginfo( 'name' ); ?> difference for yourself.</p>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--gold">Book a Consultation</a>
  </div>
</section>

<?php get_footer(); ?>
