<?php
  /*
   * Template Name: Page Trace
   */
  get_header();
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
        echo '</div>';
  } else { // If logged in:
?>
contenuto della pagina

<?php
    }
?>
