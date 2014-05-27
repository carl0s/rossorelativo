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
          <li><a href="https://www.facebook.com/lucky.red.distribuzione"><img src="<?php echo get_template_directory_uri() . '/img/facebook.svg' ?>"></a></li>
          <li><a href="https://twitter.com/luckyredfilm"><img src="<?php echo get_template_directory_uri() . '/img/twitter.svg' ?>"></a></li>
          <li><a href="http://luckyred.dev"><img src="<?php echo get_template_directory_uri() . '/img/pinterest.svg' ?>"></a></li>
          <li><a href="https://plus.google.com/103538445066530070167"><img src="<?php echo get_template_directory_uri() . '/img/googleplus.svg' ?>"></a></li>
          <li><a href="https://www.youtube.com/channel/UCZ2NF3-EhyJ1LNYfQIvqJRg"><img src="<?php echo get_template_directory_uri() . '/img/youtube.svg' ?>"></a></li>
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
