<?php

add_action('wp_enqueue_scripts', 'add_theme_scripts');

function add_theme_scripts() {
  wp_register_style('theme-styles', get_template_directory_uri() . '/css/style.css');
  wp_enqueue_style('theme-styles');
}

add_theme_support('custom-header', array(
  'default-image' => '',
  'width' => 1920,
  'height' => 300,
  'flex-height' => true,
));

add_action('wp_loaded', 'generate_header');

function generate_header() {

  if ( !is_customize_preview() ) {
    return;
  }

  $file_path = get_template_directory() . '/scss/_generatedHeader.scss';
  $file_content = file_get_contents($file_path);

  $content = "#masthead{";
  $content .= "background-image: url(" . get_header_image() . ");";
  $content .= "height:" . get_custom_header()->height . "px;";
  $content .= "}";

  if( preg_replace('/\s+/','',$content) === preg_replace('/\s+/','',$file_content) ){
    return;
  }

  file_put_contents($file_path, $content);
}

?>