<?php

require_once('wp-advanced-search/wpas.php');
function luckyred_scripts() {
  wp_enqueue_style( 'luckyred-foundation', get_template_directory_uri() . '/css/foundation.css', array(), '1.0.0' );
  wp_enqueue_style( 'luckyred-fotorama', get_template_directory_uri() . '/css/fotorama.css', array(), '1.0.0' );
  wp_enqueue_style( 'luckyred-general', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' ); 

  
  wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/jquery.js', array(), '20131209', true );
  wp_enqueue_script( 'modernizr-script', get_template_directory_uri() . '/js/modernizr.js', array(), '20131209' );
  wp_enqueue_script( 'foundation-script', get_template_directory_uri() . '/js/foundation.min.js', array(), '20131209', true );
  wp_enqueue_script( 'fotorama-script', get_template_directory_uri() . '/js/fotorama.js', array(), '20131209', true );


  wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array(), '20131209', true);


}

add_theme_support( 'post-thumbnails', array( 'post', 'film', 'regista', 'cinema', 'page', 'blog' ) ); // Posts and Movies
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

function wpbeginner_numeric_posts_nav() {

  if( is_singular() )
    return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
    return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 )
    $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

  echo '<div class="navigation"><ul>' . "\n";

  /** Previous Post Link */
  if ( get_previous_posts_link() )
    printf( '<li>%s</li>' . "\n", get_previous_posts_link('<') );

  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
    $class = 1 == $paged ? ' class="active"' : '';

    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( ! in_array( 2, $links ) )
      echo '<li>…</li>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
    $class = $paged == $link ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
    if ( ! in_array( $max - 1, $links ) )
      echo '<li>…</li>' . "\n";

    $class = $paged == $max ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /** Next Post Link */
  if ( get_next_posts_link() )
    printf( '<li>%s</li>' . "\n", get_next_posts_link('>') );

  echo '</ul></div>' . "\n";

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