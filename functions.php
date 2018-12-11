<?php
function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

add_theme_support( 'custom-header', array(
  'default-image'      => '',
  'width'              => 1920,
  'height'             => 300,
  'flex-height'        => true,
));

?>