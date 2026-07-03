<?php
/**
 * Template Name: Amar Legal — Contact
 *
 * @package Amar_Legal
 */

get_header();
$sent = isset( $_GET['sent'] ) ? sanitize_key( $_GET['sent'] ) : '';
?>

<section class="page-banner">
  <div class="page-banner__bg"><img src="<?php echo amar_legal_img( 'banner-contact.jpg' ); ?>" alt="Contact <?php bloginfo( 'name' ); ?>" /></div>
  <div class="wrap page-banner__inner">
    <h1>Get In Touch</h1>
    <div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> <span>/</span> Contact</div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head center">
      <span class="eyebrow">We're Here to Help</span>
      <h2>Schedule a Confidential Consultation</h2>
      <p class="lead mx-auto">Tell us about your matter and our team will respond within one business day. All enquiries are treated in the strictest confidence.</p>
    </div>

    <div class="contact-grid">
      <!-- INFO -->
      <div class="reveal">
        <div class="info-item">
          <div class="info-item__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M12 21s-7-4.5-7-10a7 7 0 1114 0c0 5.5-7 10-7 10z" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="11" r="2.5" stroke="currentColor" stroke-width="1.7"/></svg></div>
          <div><h4>Office Address</h4><p><?php echo esc_html( amar_legal_info( 'address' ) ); ?></p></div>
        </div>
        <div class="info-item">
          <div class="info-item__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M5 4h4l2 5-3 2a12 12 0 005 5l2-3 5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg></div>
          <div><h4>Phone</h4><p><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', amar_legal_info( 'phone' ) ) ); ?>"><?php echo esc_html( amar_legal_info( 'phone' ) ); ?></a></p></div>
        </div>
        <div class="info-item">
          <div class="info-item__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 5h16v14H4z" stroke="currentColor" stroke-width="1.7"/><path d="M4 7l8 6 8-6" stroke="currentColor" stroke-width="1.7"/></svg></div>
          <div><h4>Email</h4><p><a href="mailto:<?php echo esc_attr( amar_legal_info( 'email' ) ); ?>"><?php echo esc_html( amar_legal_info( 'email' ) ); ?></a></p></div>
        </div>
        <div class="info-item">
          <div class="info-item__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.7"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg></div>
          <div><h4>Office Hours</h4><p><?php echo esc_html( amar_legal_info( 'hours' ) ); ?><br/><?php echo esc_html( amar_legal_info( 'hours_2' ) ); ?></p></div>
        </div>
      </div>

      <!-- FORM -->
      <div class="form-card reveal">
        <?php if ( 'success' === $sent ) : ?>
          <p class="form-note" style="color:#1b7a3d; font-weight:600; margin-bottom:18px;">Thank you for reaching out. Our team will respond within one business day.</p>
        <?php elseif ( 'error' === $sent ) : ?>
          <p class="form-note" style="color:#b3261e; font-weight:600; margin-bottom:18px;">Sorry, something went wrong. Please check the required fields and try again.</p>
        <?php endif; ?>
        <form method="post" action="<?php echo esc_url( home_url( '/contact/' ) ); ?>" novalidate>
          <?php wp_nonce_field( 'amar_legal_contact', 'amar_legal_nonce' ); ?>
          <input type="hidden" name="amar_legal_contact" value="1" />
          <div class="form-row">
            <div class="field"><label for="name">Full Name *</label><input type="text" id="name" name="name" required /></div>
            <div class="field"><label for="phone">Phone *</label><input type="tel" id="phone" name="phone" required /></div>
          </div>
          <div class="field"><label for="email">Email Address *</label><input type="email" id="email" name="email" required /></div>
          <div class="field">
            <label for="subject">Area of Concern</label>
            <select id="subject" name="subject">
              <option value="">Select a practice area</option>
              <option>Civil Litigation</option>
              <option>Corporate &amp; Commercial</option>
              <option>Family Law</option>
              <option>Criminal Defence</option>
              <option>Property &amp; Real Estate</option>
              <option>Legal Documentation</option>
              <option>Other</option>
            </select>
          </div>
          <div class="field"><label for="message">Brief Description of Your Matter *</label><textarea id="message" name="message" required></textarea></div>
          <button type="submit" class="btn btn--gold" style="width:100%">Send Enquiry</button>
          <p style="margin-top:14px; font-size:0.82rem; color:var(--muted)">Submitting this form does not create an advocate&ndash;client relationship. Please avoid sharing confidential details until an engagement is confirmed.</p>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- MAP -->
<section class="section section--tint" style="padding-top:0">
  <div class="wrap">
    <div class="map-embed reveal">
      <?php if ( amar_legal_info( 'map' ) ) : ?>
        <iframe src="<?php echo esc_url( amar_legal_info( 'map' ) ); ?>" width="100%" height="420" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Office location"></iframe>
      <?php else : ?>
        <img src="<?php echo amar_legal_img( 'map.jpg' ); ?>" alt="Map to <?php bloginfo( 'name' ); ?> office" />
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
