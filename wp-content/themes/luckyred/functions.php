<?php

function luckyred_scripts() {
  wp_enqueue_style( 'luckyred-foundation', get_template_directory_uri() . '/css/foundation.css', array(), '1.0.0' );
  wp_enqueue_style( 'luckyred-general', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' );

  wp_enqueue_style( 'luckyred-slider', get_template_directory_uri() . '/css/flexslider.css', array(), '1.0.0' );

  wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20131209', true );
  wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/jquery.js', array( 'jquery' ), '20131209', true );
  wp_enqueue_script( 'foundation-script', get_template_directory_uri() . '/js/foundation.min.js', array( 'jquery' ), '20131209', true );
  wp_enqueue_script( 'classie-script', get_template_directory_uri() . '/js/classie.js', array( 'jquery' ), '20131209', true );

  wp_enqueue_script( 'fex-script', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), '20131209', true);
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/jquery-1.6.1.min.js', array( 'jquery' ), '20131209', true);

}

add_theme_support( 'post-thumbnails', array( 'post', 'film', 'regista', 'cinema' ) ); // Posts and Movies
add_action( 'wp_enqueue_scripts', 'luckyred_scripts', 'wp_print_styles', 'add_custom_font', 'add_custom_size' );

register_nav_menus( array(
  'main_menu' => 'My Custom Main Menu'
) );

show_admin_bar(false);

function debug($var) {
  return "<pre>" . var_dump($var) . "</pre>";
}

function add_custom_size() {
  add_theme_support( 'post-thumbnails' );
  add_image_size('size', 0, 0, true);

}

function add_custom_font() {
  $url = 'http://luckyred.dev/wp-content/themes/luckyred/fonts/bebasneue_regular_macroman/stylesheet.css';
  wp_register_style ('Bebas Neue', $ulr);
  wp_enqueue_style ('Bebas Neue');
}

function excerpt($num) {
  $limit = $num + 1;
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  array_pop($excerpt);
  $excerpt = implode(" ", $excerpt)." [<a href='". get_permalink($post->ID) ."'>...</a>]";
  echo $excerpt;
}

?>