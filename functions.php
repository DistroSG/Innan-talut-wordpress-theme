<?php

add_action('wp_enqueue_scripts', 'add_theme_scripts');

function add_theme_scripts() {
  wp_register_style('theme-style', get_template_directory_uri() . '/css/style.css');
  wp_enqueue_style('theme-style');

  wp_register_script('theme-navigation-script', get_template_directory_uri() . '/js/navigation.js');
  wp_enqueue_script('theme-navigation-script');
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

add_action( 'after_setup_theme', 'register_my_menu' );

function register_my_menu() {
  register_nav_menu( 'primary', 'Primary' );
}

add_filter('walker_nav_menu_start_el', 'add_button_to_nav_menu_parent_item', 10, 3);

function add_button_to_nav_menu_parent_item( $item_output, $item, $depth) {

  if($depth !== 0){
    return $item_output;
  }

  if(in_array('menu-item-has-children', $item->classes)){
     $item_output .='<button class="nav-parent-button"><span class="arrow"></span></button>';
  }

    return $item_output;
}
?>