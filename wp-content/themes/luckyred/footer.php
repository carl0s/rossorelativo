<footer class="clearfix">
  <div class="wrapper large-12 column">
      <div class="row">
        <div class="large-12 column">
          <h6>Copyright 2013 LUCKY RED S.r.l. tutti i diritti riservati. <a>Privacy e policy</a> e diritti di utilizzo.<br>
          Via  Antonio Chinotto,16 00195 ROMA T. 063759441 F. 0637352310 <a>info@luckyred.it</a><br>
          P.I.01880311004 C.F.07824900588 N°Iscrizione Reg.Imp. di ROMA 07824900588 REA N°631446 CAP. SOC. € 1.500.000,00 I.V.</h6>
          <div class="row">
            <div class="social-icon-footer large-2 large-centered columns">
              <a href="https://www.facebook.com/lucky.red.distribuzione" class="logo-fb"><img src="<?php echo get_template_directory_uri() . '/img/facebook.svg' ?>"></a>
              <a href="https://twitter.com/luckyredfilm" class="logo-tw"><img src="<?php echo get_template_directory_uri() . '/img/twitter.svg' ?>"></a>
              <a href="http://www.pinterest.com/luckyreddistr/" class="logo-pn"><img src="<?php echo get_template_directory_uri() . '/img/pinterest.svg' ?>"></a>
              <a href="https://plus.google.com/103538445066530070167" class="logo-gp"><img src="<?php echo get_template_directory_uri() . '/img/googleplus.svg' ?>"></a>
              <a href="https://www.youtube.com/channel/UCZ2NF3-EhyJ1LNYfQIvqJRg" class="logo-yt"><img src="<?php echo get_template_directory_uri() . '/img/youtube.svg' ?>"></a>
            </div>
          </div>
          <?php // if(!is_user_logged_in()): ?>
            <h2>Area Esercente</h2> <a href="#" data-reveal-id="login" class="button center large">Login</a>

          <?php // endif; ?>
          <div id="login" class="back-login reveal-modal" data-reveal>
  <?php
  if ( ! is_user_logged_in() ) { // Display WordPress login form:
      $args = array(
          'redirect' => admin_url(), 
          'form_id' => 'loginform',
          'label_username' => __( 'Username:' ),
          'label_password' => __( 'Password:' ),
          'label_remember' => __( 'Ricordami' ),
          'label_log_in' => __( 'Accedi' ),
          'remember' => true
      );
      echo '<div class="container-login">';
      wp_login_form( $args );
      ?>
      <a href="mailto:cacca@piscia.it">manda una email per registrarti?</a>
      <a class="close-reveal-modal">&#215;</a>
      </div>
      <?php
  } else { // If logged in:
      $user_info = get_userdata(1);
      echo '<div class="container-logout"><div class="hello-user">';
      ?>
      <a href="<?php bloginfo('home'); ?>/area-riservata">Area Riservata</a>
      <?
      echo '</div><div class="site-admin">';
      wp_register('', ''); // Display "Site Admin" link.
      echo '</div><div class="log-out">'; ?>
      <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout">Logout</a>
      <?php 
      echo '</div></div>';
  }
  ?>
</div>
        </div>
      </div>
  </div>
</footer>
<?php wp_footer(); ?>