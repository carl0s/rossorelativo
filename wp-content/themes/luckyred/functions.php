<?php

function luckyred_scripts() {
  wp_enqueue_style( 'luckyred-foundation', get_template_directory_uri() . '/css/foundation.css', array(), '1.0.0' );
  wp_enqueue_style( 'luckyred-general', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' ); 
  
  wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/jquery.js', array(), '20131209', true );
  wp_enqueue_script( 'modernizr-script', get_template_directory_uri() . '/js/modernizr.js', array(), '20131209' );
  wp_enqueue_script( 'foundation-script', get_template_directory_uri() . '/js/foundation.min.js', array(), '20131209', true );

  wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array(), '20131209', true);

  wp_enqueue_script( 'grid-script', get_template_directory_uri() . '/js/grid.js', array(), '20131209', true);

}

add_theme_support( 'post-thumbnails', array( 'post', 'film', 'regista', 'cinema', 'page' ) ); // Posts and Movies
add_action( 'wp_enqueue_scripts', 'luckyred_scripts', 'wp_print_styles', 'add_custom_font', 'add_custom_size', 'wpbeginner_numeric_posts_nav', 'legacy_comments', 'mytheme_comment' );

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


function get_page_link_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if ($page) :
    
    return get_permalink( $page->ID );
  else :
    return "#";
  endif;
}

function custom_field_excerpt() {
  global $post;
  $text = get_field('descrizione');
  if ( '' != $text ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]>', $text);
    $excerpt_length = 140; // 20 words
    $excerpt_more = "[<a href='". get_permalink($post->ID) ."'>...</a>]";
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  }
  return apply_filters('the_excerpt', $text);
}


?>