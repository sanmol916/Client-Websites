<footer class="site-footer">
  <div class="wrap">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand">
          <span class="brand__mark">A</span>
          <span><span class="brand__name"><?php bloginfo( 'name' ); ?></span><span class="brand__tag">Advocates &amp; Consultants</span></span>
        </a>
        <p>A full-service law firm committed to principled advice and dependable representation for individuals, families and businesses.</p>
      </div>
      <div class="footer-col">
        <h4>Explore</h4>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
          <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a></li>
          <li><a href="<?php echo esc_url( home_url( '/practice-areas/' ) ); ?>">Practice Areas</a></li>
          <li><a href="<?php echo esc_url( home_url( '/team/' ) ); ?>">Our Team</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Practice</h4>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/practice-areas/' ) ); ?>">Civil Litigation</a></li>
          <li><a href="<?php echo esc_url( home_url( '/practice-areas/' ) ); ?>">Corporate Law</a></li>
          <li><a href="<?php echo esc_url( home_url( '/practice-areas/' ) ); ?>">Family Law</a></li>
          <li><a href="<?php echo esc_url( home_url( '/practice-areas/' ) ); ?>">Criminal Defence</a></li>
          <li><a href="<?php echo esc_url( home_url( '/practice-areas/' ) ); ?>">Property Law</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Reach Us</h4>
        <ul class="footer-contact">
          <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 21s-7-4.5-7-10a7 7 0 1114 0c0 5.5-7 10-7 10z" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="11" r="2.5" stroke="currentColor" stroke-width="1.6"/></svg> <?php echo esc_html( amar_legal_info( 'address' ) ); ?></li>
          <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M4 5h16v14H4z" stroke="currentColor" stroke-width="1.6"/><path d="M4 7l8 6 8-6" stroke="currentColor" stroke-width="1.6"/></svg> <a href="mailto:<?php echo esc_attr( amar_legal_info( 'email' ) ); ?>"><?php echo esc_html( amar_legal_info( 'email' ) ); ?></a></li>
          <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M5 4h4l2 5-3 2a12 12 0 005 5l2-3 5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg> <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', amar_legal_info( 'phone' ) ) ); ?>"><?php echo esc_html( amar_legal_info( 'phone' ) ); ?></a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <span id="year"><?php echo esc_html( gmdate( 'Y' ) ); ?></span> <?php bloginfo( 'name' ); ?>. All rights reserved.</span>
      <span>Advocate advertising is subject to Bar Council of India rules. This site is for information only.</span>
    </div>
  </div>
</footer>

<!-- Disclaimer modal (Bar Council of India acknowledgement) -->
<div class="modal" id="disclaimer" role="dialog" aria-modal="true" aria-labelledby="disc-title">
  <div class="modal__backdrop"></div>
  <div class="modal__box">
    <span class="eyebrow">User Acknowledgement</span>
    <h3 id="disc-title">Please Read Before Proceeding</h3>
    <p>In compliance with the rules of the Bar Council of India, this website is not intended for advertising or solicitation. By clicking &ldquo;I Agree&rdquo;, you acknowledge that you are seeking information about <?php bloginfo( 'name' ); ?> of your own accord and that no solicitation or inducement has been made by the firm or its members.</p>
    <p>The information provided is for general understanding only and does not constitute legal advice, nor does accessing this site create an advocate&ndash;client relationship. You should seek independent legal counsel for your specific matter.</p>
    <div class="modal__actions">
      <button class="btn btn--gold" data-accept>I Agree</button>
      <a href="https://www.google.com" class="btn btn--ghost">Leave</a>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
