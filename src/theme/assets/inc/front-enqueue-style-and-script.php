<?php
function style_and_script(){
  wp_enqueue_style('style', get_stylesheet_directory_uri(). '/assets/css/style.css', array(), '1.0.0');
  wp_enqueue_script('script', get_template_directory_uri().'/assets/js/script.js', array(), '1.0.0', true);
  wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/e9fd82e00f.js', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'style_and_script');
