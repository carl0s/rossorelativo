<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lucky Red</title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="css/pesticide.css">
    <script src="js/modernizr.js"></script>
    <script>
    function init() {
      window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
        shrinkOn = 90,
        header = document.querySelector("header");
        if (distanceY > shrinkOn) {
          classie.add(header,"smaller");
        } else {
          if (classie.has(header,"smaller")) {
            classie.remove(header,"smaller");
          }
        }
      });
    }
    window.onload = init();
    </script>

  </head>
  <body>
    <header>
    
      <div class="row">
        <div id="logo" class="large-3 columns">
          <a href="http://luckyred.dev"><img src="<?php echo get_template_directory_uri() . '/img/logo.png' ?>"></a>
        </div>
        <nav id="main-menu" class="left">
          <?php wp_nav_menu(); ?>
        </nav>
      </div>

    </header>
