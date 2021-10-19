<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

  // Adding scripts file in the footer
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/scripts/main-automarca.js', array( 'jquery' ), '0.1-alpha', true );
    if(is_singular('auto-in-vendita')){
      wp_enqueue_script('CRM-form' , get_template_directory_uri() . '/assets/scripts/exportXml.js', array('jquery') , time() . '' , true);
      wp_localize_script('CRM-form' , 'base_data' , array(
        'base_url' => esc_url_raw(rest_url()),
        'wp_nonce' =>  wp_create_nonce('wp-rest')
      ));
    }
    // Register main stylesheet
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/styles/style-automarca.css', array(), '0.1-alpha', 'all' );
    $home_url = get_home_url();
    wp_localize_script( 'main-script', 'home_url', $home_url );
    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);

