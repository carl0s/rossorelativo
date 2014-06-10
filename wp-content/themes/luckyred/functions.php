<?php

function luckyred_scripts() {
  wp_enqueue_style( 'luckyred-foundation', get_template_directory_uri() . '/css/foundation.css', array(), '1.0.0' );
  wp_enqueue_style( 'luckyred-fotorama', get_template_directory_uri() . '/css/fotorama.css', array(), '1.0.0' );
  wp_enqueue_style( 'luckyred-checkbox', get_template_directory_uri() . '/square/red.css', array(), '1.0.0' );
  wp_enqueue_style( 'luckyred-general', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' ); 

  
  wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/jquery.js', array(), '20131209', true );
  wp_enqueue_script( 'modernizr-script', get_template_directory_uri() . '/js/modernizr.js', array(), '20131209' );
  wp_enqueue_script( 'foundation-script', get_template_directory_uri() . '/js/foundation.min.js', array(), '20131209', true );
  wp_enqueue_script( 'fotorama-script', get_template_directory_uri() . '/js/fotorama.js', array(), '20131209', true );
  wp_enqueue_script( 'checkbox-script', get_template_directory_uri() . '/js/icheck.js', array(), '20131209', true );
  wp_enqueue_script( 'share-script', get_template_directory_uri() . '/js/jquery.share.js', array(), '20131209', true );


  wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array(), '20131209', true);


}

require_once('wp-advanced-search/wpas.php');

add_theme_support( 'post-thumbnails', array( 'post', 'film', 'regista', 'cinema', 'page' ) ); // Posts and Movies

add_action( 'wp_enqueue_scripts', 'luckyred_scripts', 'wp_print_styles', 'add_custom_font', 'add_custom_size', 'wpbeginner_numeric_posts_nav' );


register_nav_menus( array(
  'main_menu' => 'My Custom Main Menu'
) );

show_admin_bar(false);

/**
 * Redirect non-admins to the homepage after logging into the site.
 *
 * @since   1.0
 */
function soi_login_redirect( $redirect_to, $request, $user  ) {
  return ( is_array( $user->roles ) && in_array( 'administrator', $user->roles ) ) ? admin_url() : site_url();
} // end soi_login_redirect
add_filter( 'login_redirect', 'soi_login_redirect', 'trade',10, 3 );


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




?>