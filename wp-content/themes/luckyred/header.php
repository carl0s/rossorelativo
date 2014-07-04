<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lucky Red</title>
    <?php wp_head(); ?>
  </head>
  <body>
    <header>
      <div class="row">
        <div id="logo" class="large-3 columns">
          <a href="http://luckyred.dev"><img src="<?php echo get_template_directory_uri() . '/img/logo.png' ?>"></a>
        </div>
        <nav id="main-menu" class="left large-6 columns">
          <?php wp_nav_menu(); ?>
        </nav>
        <ul class="social-icon large-3 columns end right">
          <a href="https://www.facebook.com/lucky.red.distribuzione" class="logo-fb"><img src="<?php echo get_template_directory_uri() . '/img/facebook.svg' ?>"></a>
          <a href="https://twitter.com/luckyredfilm" class="logo-tw"><img src="<?php echo get_template_directory_uri() . '/img/twitter.svg' ?>"></a>
          <a href="http://www.pinterest.com/luckyreddistr/" class="logo-pn"><img src="<?php echo get_template_directory_uri() . '/img/pinterest.svg' ?>"></a>
          <a href="https://plus.google.com/103538445066530070167" class="logo-gp"><img src="<?php echo get_template_directory_uri() . '/img/googleplus.svg' ?>"></a>
          <a href="https://www.youtube.com/channel/UCZ2NF3-EhyJ1LNYfQIvqJRg" class="logo-yt"><img src="<?php echo get_template_directory_uri() . '/img/youtube.svg' ?>"></a>
          <li><span class="icon-search"><a><img src="<?php echo get_template_directory_uri() . '/img/search.svg' ?>"></a></span></li>
        </ul>
      </div>
      <div class="search-container">
      <div class="row">
        <div class="large-12 column">
          <?php get_search_form(); ?>
          
        </div>
      </div>
    </div>
    </header>

    <div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
    <nav class="tab-bar">
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
      </section>

      <section class="middle tab-bar-section">
          <a href="http://luckyred.dev"><img src="<?php echo get_template_directory_uri() . '/img/logo.png' ?>"></a>
      </section>

      <section class="right-small">
        <a class="right-off-canvas-toggle menu-icon" href="#"><span></span></a>
      </section>

    </nav>

    <aside class="left-off-canvas-menu">
      <div class="ricerca-device">
         <?php get_search_form(); ?> 
      </div>
      <ul class="off-canvas-list">
        <li><?php wp_nav_menu(); ?></li>
      </ul>
      <div class="info-device">
        <h5>Info Lucky Red</h5>
        <h6>T: 063759441</h6>
        <h6>F: 0637352310</h6>
        <h6>Mail: <a href="mailto:info@luckyred.it">info@luckyred.it</a></h6>
      </div>
    </aside>

    <aside class="right-off-canvas-menu">
      <ul class="off-canvas-list">
        <h4>Area Esercente</h4>
        <div class="login-device">
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
        <h6>Non sei ancora registrato? Mandaci una <a href="mailto:example@email.com">mail</a></h6>
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
      </ul>
    </aside>
    