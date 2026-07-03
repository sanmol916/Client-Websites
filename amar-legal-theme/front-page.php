<?php
/**
 * Front page (Home) template.
 *
 * @package Amar_Legal
 */

get_header();
?>

<!-- HERO -->
<section class="hero">
  <div class="hero__bg"><img src="<?php echo amar_legal_img( 'hero-home.jpg' ); ?>" alt="<?php bloginfo( 'name' ); ?> office" /></div>
  <div class="wrap">
    <div class="hero__inner">
      <span class="eyebrow">Trusted Legal Counsel</span>
      <h1>Justice, Guided by <span class="accent">Integrity</span> and Experience</h1>
      <p><?php bloginfo( 'name' ); ?> stands beside individuals, families and businesses &mdash; offering clear, principled advice and steadfast representation across every stage of your legal journey.</p>
      <div class="hero__actions">
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--gold">Request a Consultation</a>
        <a href="<?php echo esc_url( home_url( '/practice-areas/' ) ); ?>" class="btn btn--outline">Explore Practice Areas</a>
      </div>
      <div class="hero__stats">
        <div class="hero__stat"><div class="num">25+</div><div class="label">Years of Combined Experience</div></div>
        <div class="hero__stat"><div class="num">1500+</div><div class="label">Matters Handled</div></div>
        <div class="hero__stat"><div class="num">6</div><div class="label">Core Practice Areas</div></div>
      </div>
    </div>
  </div>
</section>

<!-- PHILOSOPHY -->
<section class="section">
  <div class="wrap split">
    <div class="split__media reveal">
      <img src="<?php echo amar_legal_img( 'about-firm.jpg' ); ?>" alt="Inside <?php bloginfo( 'name' ); ?> chambers" />
      <div class="badge"><div class="num">Est.</div><div class="txt">A legacy of dependable counsel</div></div>
    </div>
    <div class="prose reveal">
      <span class="eyebrow">Who We Are</span>
      <h2>A Firm Built on Principle and Purpose</h2>
      <p>Law has evolved with the evolution of civilization. Civil society has found it useful to give prominence to law in order to inculcate discipline in the lives of its members &mdash; so that each contributes to the development of a society where every person can lead a life of dignity, in an environment of peace and harmony.</p>
      <p>Today, law operates within an institutionalised framework, continuously striving toward a society where all can progress without disturbing the rights and privileges of others. At <?php bloginfo( 'name' ); ?>, we carry that spirit into every matter we accept.</p>
      <ul class="ticks">
        <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#c9a24b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg> Transparent advice and honest assessments</li>
        <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#c9a24b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg> Client interests placed first, always</li>
        <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#c9a24b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg> Diligent representation before courts &amp; tribunals</li>
      </ul>
      <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn btn--ghost">More About Us</a>
    </div>
  </div>
</section>

<!-- PRACTICE AREAS -->
<section class="section section--tint">
  <div class="wrap">
    <div class="section-head center">
      <span class="eyebrow">What We Do</span>
      <h2>Comprehensive Legal Expertise</h2>
      <p class="lead mx-auto">From everyday concerns to complex disputes, our practice spans the areas that matter most to our clients.</p>
    </div>
    <div class="grid grid--3">
      <?php
      $areas = array(
        array( 'Civil Litigation', 'Property disputes, contract enforcement, recovery suits and civil appeals handled with rigour and strategy.', '<path d="M12 3l8 4v5c0 5-3.5 7.5-8 9-4.5-1.5-8-4-8-9V7l8-4z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>' ),
        array( 'Corporate &amp; Commercial', 'Company formation, compliance, commercial contracts and advisory for businesses at every stage.', '<path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>' ),
        array( 'Family Law', 'Divorce, maintenance, custody and matrimonial matters approached with sensitivity and discretion.', '<path d="M12 21s-7-4.5-7-10a4 4 0 017-2 4 4 0 017 2c0 5.5-7 10-7 10z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>' ),
        array( 'Criminal Defence', 'Bail, trial representation and appeals &mdash; protecting your rights at every point in the process.', '<path d="M4 6h16M4 12h16M4 18h10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>' ),
        array( 'Property &amp; Real Estate', 'Title verification, transactions, documentation and landlord&ndash;tenant matters, done right.', '<path d="M3 9l9-6 9 6v11a1 1 0 01-1 1H4a1 1 0 01-1-1V9z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>' ),
        array( 'Legal Documentation', 'Agreements, wills, power of attorney and affidavits &mdash; precise, compliant and protective.', '<path d="M8 3h6l4 4v14H6V3h2z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M9 12h6M9 16h6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>' ),
      );
      foreach ( $areas as $a ) : ?>
      <article class="card reveal">
        <div class="card__icon"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><?php echo $a[2]; // phpcs:ignore ?></svg></div>
        <h3><?php echo $a[0]; // phpcs:ignore ?></h3>
        <p><?php echo $a[1]; // phpcs:ignore ?></p>
        <a href="<?php echo esc_url( home_url( '/practice-areas/' ) ); ?>" class="card__link">Learn more <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- WHY CHOOSE -->
<section class="section section--navy">
  <div class="wrap">
    <div class="section-head center">
      <span class="eyebrow">Why <?php bloginfo( 'name' ); ?></span>
      <h2 style="color:#fff">Counsel You Can Rely On</h2>
    </div>
    <div class="grid grid--4">
      <div class="feature reveal">
        <div class="feature__icon"><svg width="30" height="30" viewBox="0 0 24 24" fill="none"><path d="M12 2l2.5 6.5L21 9l-5 4.5L17.5 20 12 16.5 6.5 20 8 13.5 3 9l6.5-.5L12 2z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg></div>
        <h3>Proven Experience</h3>
        <p>Decades of combined practice across trial courts, tribunals and appellate forums.</p>
      </div>
      <div class="feature reveal">
        <div class="feature__icon"><svg width="30" height="30" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 4v5c0 5-3.5 7.5-8 9-4.5-1.5-8-4-8-9V7l8-4z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg></div>
        <h3>Uncompromising Integrity</h3>
        <p>Honest counsel and ethical conduct guide every decision we make on your behalf.</p>
      </div>
      <div class="feature reveal">
        <div class="feature__icon"><svg width="30" height="30" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.6"/><path d="M4 21c0-4 3.5-6 8-6s8 2 8 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg></div>
        <h3>Client-First Approach</h3>
        <p>We listen closely, explain clearly, and tailor strategy to your specific situation.</p>
      </div>
      <div class="feature reveal">
        <div class="feature__icon"><svg width="30" height="30" viewBox="0 0 24 24" fill="none"><path d="M12 6v6l4 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/></svg></div>
        <h3>Responsive Service</h3>
        <p>Timely updates and accessible advocates who respect your time and concerns.</p>
      </div>
    </div>
  </div>
</section>

<!-- QUOTE -->
<section class="section">
  <div class="wrap">
    <div class="quote reveal">
      <div class="quote__mark">&ldquo;</div>
      <p style="color:var(--navy-900)">The law is not merely a profession to us &mdash; it is a commitment to fairness, to dignity, and to the people who place their trust in our hands.</p>
      <div class="quote__by">&mdash; The <?php bloginfo( 'name' ); ?> Team</div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-strip">
  <div class="cta-strip__bg"><img src="<?php echo amar_legal_img( 'cta-consult.jpg' ); ?>" alt="Consultation" /></div>
  <div class="wrap cta-strip__inner">
    <h2>Facing a Legal Challenge? Let's Talk.</h2>
    <p>Schedule a confidential consultation with our team and take the first step toward clarity and resolution.</p>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--gold">Book Your Consultation</a>
  </div>
</section>

<?php get_footer(); ?>
