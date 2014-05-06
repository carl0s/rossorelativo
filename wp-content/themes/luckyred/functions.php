<?php

function luckyred_scripts() {
  wp_enqueue_style( 'luckyred-foundation', get_template_directory_uri() . '/css/foundation.css', array(), '1.0.0' );
  wp_enqueue_style( 'luckyred-general', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' );
  wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20131209', true );
  wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/vendor/jquery.js', array( 'jquery' ), '20131209', true );
  wp_enqueue_script( 'foundation-script', get_template_directory_uri() . '/js/foundation.min.js', array( 'jquery' ), '20131209', true );
}

add_theme_support( 'post-thumbnails', array( 'post', 'film', 'regista', 'cinema' ) ); // Posts and Movies
add_action( 'wp_enqueue_scripts', 'luckyred_scripts', 'wp_print_styles', 'add_custom_font' );

// include_once('advanced-custom-fields/acf.php');
// // define( 'ACF_LITE', true );


// if(function_exists("register_field_group"))
// {
//   register_field_group(array (
//     'id' => 'acf_director-fields',
//     'title' => 'Director Fields',
//     'fields' => array (
//       array (
//         'key' => 'field_52dfc313594fb',
//         'label' => 'Social',
//         'name' => '',
//         'type' => 'tab',
//       ),
//       array (
//         'key' => 'field_52dfc346594fc',
//         'label' => 'YouTube Channel',
//         'name' => 'youtube_channel',
//         'type' => 'text',
//         'instructions' => 'Insert url',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//     ),
//     'location' => array (
//       array (
//         array (
//           'param' => 'post_type',
//           'operator' => '==',
//           'value' => 'director',
//           'order_no' => 0,
//           'group_no' => 0,
//         ),
//       ),
//       array (
//         array (
//           'param' => 'post_type',
//           'operator' => '==',
//           'value' => 'movie',
//           'order_no' => 0,
//           'group_no' => 1,
//         ),
//       ),
//     ),
//     'options' => array (
//       'position' => 'normal',
//       'layout' => 'default',
//       'hide_on_screen' => array (
//         0 => 'custom_fields',
//         1 => 'format',
//       ),
//     ),
//     'menu_order' => 0,
//   ));
//   register_field_group(array (
//     'id' => 'acf_movie-fields',
//     'title' => 'Movie fields',
//     'fields' => array (
//       array (
//         'key' => 'field_52dfb7d8227ba',
//         'label' => 'Info',
//         'name' => '',
//         'type' => 'tab',
//       ),
//       array (
//         'key' => 'field_52dfbad452241',
//         'label' => 'Release date',
//         'name' => 'release_date',
//         'type' => 'date_picker',
//         'required' => 1,
//         'date_format' => 'yymmdd',
//         'display_format' => 'dd/mm/yy',
//         'first_day' => 1,
//       ),
//       array (
//         'key' => 'field_52dfafe0dcc47',
//         'label' => 'Director',
//         'name' => 'director',
//         'type' => 'relationship',
//         'required' => 1,
//         'return_format' => 'object',
//         'post_type' => array (
//           0 => 'director',
//         ),
//         'taxonomy' => array (
//           0 => 'all',
//         ),
//         'filters' => array (
//           0 => 'search',
//         ),
//         'result_elements' => array (
//           0 => 'featured_image',
//           1 => 'post_type',
//           2 => 'post_title',
//         ),
//         'max' => '',
//       ),
//       array (
//         'key' => 'field_52dfb61679231',
//         'label' => 'Country',
//         'name' => 'country',
//         'type' => 'select',
//         'required' => 1,
//         'choices' => array (
//           'Italia' => 'Italia',
//           'Germania' => 'Germania',
//           'Inghilterra' => 'Inghilterra',
//           'Francia' => 'Francia',
//         ),
//         'default_value' => '',
//         'allow_null' => 0,
//         'multiple' => 1,
//       ),
//       array (
//         'key' => 'field_52dfb6bb3f6ce',
//         'label' => 'Year',
//         'name' => 'year',
//         'type' => 'text',
//         'required' => 1,
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => 4,
//       ),
//       array (
//         'key' => 'field_52dfb77e5d14e',
//         'label' => 'Duration',
//         'name' => 'duration',
//         'type' => 'number',
//         'required' => 1,
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'min' => 1,
//         'max' => 999,
//         'step' => '',
//       ),
//       array (
//         'key' => 'field_52dfb056ba31a',
//         'label' => 'Trailer',
//         'name' => '',
//         'type' => 'tab',
//       ),
//       array (
//         'key' => 'field_52dfb14604243',
//         'label' => 'Trailer title',
//         'name' => 'trailer_title',
//         'type' => 'text',
//         'required' => 1,
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_52dfb0be5a25b',
//         'label' => 'Video link',
//         'name' => 'video_link',
//         'type' => 'text',
//         'instructions' => 'Paste here youtube link',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_52dfb10472fb5',
//         'label' => 'Video Thumbnail',
//         'name' => 'video_thumbnail',
//         'type' => 'image',
//         'save_format' => 'url',
//         'preview_size' => 'thumbnail',
//         'library' => 'all',
//       ),
//       array (
//         'key' => 'field_52dfb1e200232',
//         'label' => 'Theater status',
//         'name' => '',
//         'type' => 'tab',
//       ),
//       array (
//         'key' => 'field_52dfb21c00233',
//         'label' => 'On air',
//         'name' => 'on_air',
//         'type' => 'radio',
//         'required' => 1,
//         'choices' => array (
//           'Yes' => 'Yes',
//           'No' => 'No',
//         ),
//         'other_choice' => 0,
//         'save_other_choice' => 0,
//         'default_value' => '',
//         'layout' => 'horizontal',
//       ),
//       array (
//         'key' => 'field_52dfb32fa0677',
//         'label' => 'Theaters',
//         'name' => 'theaters',
//         'type' => 'relationship',
//         'conditional_logic' => array (
//           'status' => 1,
//           'rules' => array (
//             array (
//               'field' => 'field_52dfb21c00233',
//               'operator' => '==',
//               'value' => 'Yes',
//             ),
//           ),
//           'allorany' => 'all',
//         ),
//         'return_format' => 'object',
//         'post_type' => array (
//           0 => 'theater',
//         ),
//         'taxonomy' => array (
//           0 => 'all',
//         ),
//         'filters' => array (
//           0 => 'search',
//         ),
//         'result_elements' => array (
//           0 => 'post_type',
//           1 => 'post_title',
//         ),
//         'max' => '',
//       ),
//       array (
//         'key' => 'field_52dfb8d6bdeed',
//         'label' => 'Trade/Press',
//         'name' => '',
//         'type' => 'tab',
//       ),
//       array (
//         'key' => 'field_52dfb9babdef2',
//         'label' => 'Press material',
//         'name' => 'press_material',
//         'type' => 'radio',
//         'instructions' => 'The movie has press material',
//         'choices' => array (
//           'Yes' => 'Yes',
//           'No' => 'No',
//         ),
//         'other_choice' => 0,
//         'save_other_choice' => 0,
//         'default_value' => '',
//         'layout' => 'horizontal',
//       ),
//       array (
//         'key' => 'field_52dfb9a0bdef1',
//         'label' => 'Press release',
//         'name' => 'press_release',
//         'type' => 'file',
//         'instructions' => 'Zip or Pdf file',
//         'conditional_logic' => array (
//           'status' => 1,
//           'rules' => array (
//             array (
//               'field' => 'field_52dfb9babdef2',
//               'operator' => '==',
//               'value' => 'Yes',
//             ),
//           ),
//           'allorany' => 'all',
//         ),
//         'save_format' => 'object',
//         'library' => 'all',
//       ),
//       array (
//         'key' => 'field_52dfb8e7bdeee',
//         'label' => 'Poster',
//         'name' => 'poster',
//         'type' => 'image',
//         'save_format' => 'object',
//         'preview_size' => 'thumbnail',
//         'library' => 'all',
//       ),
//       array (
//         'key' => 'field_52dfb93abdeef',
//         'label' => 'Downloadable Trailer',
//         'name' => 'downloadable_trailer',
//         'type' => 'file',
//         'instructions' => 'Zip file',
//         'save_format' => 'object',
//         'library' => 'all',
//       ),
//     ),
//     'location' => array (
//       array (
//         array (
//           'param' => 'post_type',
//           'operator' => '==',
//           'value' => 'movie',
//           'order_no' => 0,
//           'group_no' => 0,
//         ),
//       ),
//     ),
//     'options' => array (
//       'position' => 'normal',
//       'layout' => 'default',
//       'hide_on_screen' => array (
//         0 => 'custom_fields',
//         1 => 'format',
//       ),
//     ),
//     'menu_order' => 0,
//   ));
//   register_field_group(array (
//     'id' => 'acf_theater-fields',
//     'title' => 'Theater fields',
//     'fields' => array (
//       array (
//         'key' => 'field_52dfc62bf80d3',
//         'label' => 'Info',
//         'name' => '',
//         'type' => 'tab',
//       ),
//       array (
//         'key' => 'field_52dfb3f4d7956',
//         'label' => 'Address',
//         'name' => 'address',
//         'type' => 'google_map',
//         'required' => 1,
//         'center_lat' => '',
//         'center_lng' => '',
//         'zoom' => '',
//         'height' => '',
//       ),
//       array (
//         'key' => 'field_52dfc596f80d0',
//         'label' => 'Phone number',
//         'name' => 'phone_number',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_52dfc5bff80d1',
//         'label' => 'E-mail Address',
//         'name' => 'e-mail_address',
//         'type' => 'email',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//       ),
//       array (
//         'key' => 'field_52dfc5fff80d2',
//         'label' => 'Website',
//         'name' => 'website',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//     ),
//     'location' => array (
//       array (
//         array (
//           'param' => 'post_type',
//           'operator' => '==',
//           'value' => 'theater',
//           'order_no' => 0,
//           'group_no' => 0,
//         ),
//       ),
//     ),
//     'options' => array (
//       'position' => 'normal',
//       'layout' => 'default',
//       'hide_on_screen' => array (
//         0 => 'custom_fields',
//         1 => 'format',
//       ),
//     ),
//     'menu_order' => 0,
//   ));
// }

// add_action('init', 'cptui_register_my_cpt_director');
// function cptui_register_my_cpt_director() {
// register_post_type('director', array(
// 'label' => 'Directors',
// 'description' => 'This is the movie director',
// 'public' => true,
// 'show_ui' => true,
// 'show_in_menu' => true,
// 'capability_type' => 'post',
// 'map_meta_cap' => true,
// 'hierarchical' => false,
// 'rewrite' => array('slug' => 'director', 'with_front' => true),
// 'query_var' => true,
// 'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
// 'labels' => array (
//   'name' => 'Directors',
//   'singular_name' => 'Director',
//   'menu_name' => 'Directors',
//   'add_new' => 'Add Director',
//   'add_new_item' => 'Add New Director',
//   'edit' => 'Edit',
//   'edit_item' => 'Edit Director',
//   'new_item' => 'New Director',
//   'view' => 'View Director',
//   'view_item' => 'View Director',
//   'search_items' => 'Search Directors',
//   'not_found' => 'No Directors Found',
//   'not_found_in_trash' => 'No Directors Found in Trash',
//   'parent' => 'Parent Director',
// )
// ) ); }

// add_action('init', 'cptui_register_my_cpt_theater');
// function cptui_register_my_cpt_theater() {
// register_post_type('theater', array(
// 'label' => 'Theaters',
// 'description' => 'Movie theater',
// 'public' => true,
// 'show_ui' => true,
// 'show_in_menu' => true,
// 'capability_type' => 'post',
// 'map_meta_cap' => true,
// 'hierarchical' => false,
// 'rewrite' => array('slug' => 'theater', 'with_front' => true),
// 'query_var' => true,
// 'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
// 'labels' => array (
//   'name' => 'Theaters',
//   'singular_name' => 'Theater',
//   'menu_name' => 'Theaters',
//   'add_new' => 'Add Theater',
//   'add_new_item' => 'Add New Theater',
//   'edit' => 'Edit',
//   'edit_item' => 'Edit Theater',
//   'new_item' => 'New Theater',
//   'view' => 'View Theater',
//   'view_item' => 'View Theater',
//   'search_items' => 'Search Theaters',
//   'not_found' => 'No Theaters Found',
//   'not_found_in_trash' => 'No Theaters Found in Trash',
//   'parent' => 'Parent Theater',
// )
// ) ); }

// add_action('init', 'cptui_register_my_cpt_movie');
// function cptui_register_my_cpt_movie() {
// register_post_type('movie', array(
// 'label' => 'Movies',
// 'description' => 'Movie is the content-type',
// 'public' => true,
// 'show_ui' => true,
// 'show_in_menu' => true,
// 'capability_type' => 'post',
// 'map_meta_cap' => true,
// 'hierarchical' => false,
// 'rewrite' => array('slug' => 'movie', 'with_front' => true),
// 'query_var' => true,
// 'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
// 'taxonomies' => array('category'),
// 'labels' => array (
//   'name' => 'Movies',
//   'singular_name' => 'Movie',
//   'menu_name' => 'Movies',
//   'add_new' => 'Add Movie',
//   'add_new_item' => 'Add New Movie',
//   'edit' => 'Edit',
//   'edit_item' => 'Edit Movie',
//   'new_item' => 'New Movie',
//   'view' => 'View Movie',
//   'view_item' => 'View Movie',
//   'search_items' => 'Search Movies',
//   'not_found' => 'No Movies Found',
//   'not_found_in_trash' => 'No Movies Found in Trash',
//   'parent' => 'Parent Movie',
// )
// ) ); }

register_nav_menus( array(
  'main_menu' => 'My Custom Main Menu'
) );

show_admin_bar(false);

function debug($var) {
  return "<pre>" . var_dump($var) . "</pre>";
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