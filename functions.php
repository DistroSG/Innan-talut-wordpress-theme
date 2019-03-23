<?php

add_action('wp_enqueue_scripts', 'add_theme_scripts');

function add_theme_scripts() {
  wp_register_style('theme-style', get_template_directory_uri() . '/css/style.css');
  wp_enqueue_style('theme-style');

  wp_register_script('theme-navigation-script', get_template_directory_uri() . '/js/navigation.js');
  wp_enqueue_script('theme-navigation-script');

  wp_register_script('theme-polyfill-script', get_template_directory_uri() . '/js/polyfill.js');
  wp_enqueue_script('theme-polyfill-script');
}

add_action( 'after_setup_theme', 'theme_setup');

function theme_setup(){
  add_theme_support('custom-header', array(
    'default-image' => '',
    'width' => 1920,
    'height' => 200,
    'flex-height' => false,
  ));

  load_theme_textdomain('innan-taulut', get_template_directory() . '/languages');
}

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

add_action('widgets_init', 'new_widgets_init');


function new_widgets_init() {

  register_sidebar(array(
    'name'          => 'Header right corner',
    'id'            => 'header-right-corner',
    'description'   => 'Add widgets here.',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
  ));

  register_sidebar(array(
    'name'          => 'Before content',
    'id'            => 'before-content',
    'description'   => 'Add widgets here.',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
  ));

    register_sidebar(array(
      'name'          => 'After content',
      'id'            => 'after-content',
      'description'   => 'Add widgets here.',
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
    ));

  register_sidebar(array(
    'name'          => 'Footer left',
    'id'            => 'footer-left',
    'description'   => 'Add widgets here.',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
  ));

  register_sidebar(array(
    'name'          => 'Footer right',
    'id'            => 'footer-right',
    'description'   => 'Add widgets here.',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
  ));
  
}

add_action( 'init', 'create_post_type' );

function create_post_type() {
  register_post_type( 'inna_art_product',
    array(
      'labels' => array(
        'name' => __('Arts', 'innan-taulut'),
        'singular_name' => __('Art', 'innan-taulut'),
        'add_new' => __("Add new", 'innan-taulut'),
        'search_items' => __('Search arts', 'innan-taulut'),
        'not_found' => __('No arts found', 'innan-taulut')
      ),
      'public' => true,
      'menu_icon' => 'dashicons-art',
      'show_in_rest' => true,
      'rewrite' => array('slug' => 'arts'),
      'supports' => array('title')
    )
  );
}

add_action( 'init', 'create_art_tax' );

function create_art_tax() {
	register_taxonomy(
		'inna_art_type',
		'inna_art_product',
    array(
      'label' => __('Types', 'innan-taulut'),
      'show_in_rest' => true, 
      'rewrite' => array('slug' => 'art-types'),
      'hierarchical' => true
      ));
}

add_filter('default_title', 'art_product_default_title_filter', 10, 2);

function art_product_default_title_filter($post_title, $post) {

  if ($post->post_type === 'inna_art_product') {
      return 'Art №' . $post->ID;
  }

}

add_filter( 'manage_inna_art_product_posts_columns', 'set_custom_edit_art_columns' );

function set_custom_edit_art_columns($columns) {

  return array(
    'cb' => '<input type="checkbox" />',
    'thumbnail' => __('Image', 'innan-taulut'),
    'title' => __('Name', 'innan-taulut'),
    'audio' => __('Audio', 'innan-taulut'),
    'date' => __('Date', 'innan-taulut'),
);

}

add_action( 'manage_inna_art_product_posts_custom_column' , 'custom_art_column', 10, 2 );

function custom_art_column( $column, $post_id ) {
    switch ( $column ) {
        case 'thumbnail' :
        rwmb_the_value('art_product_art_select', array( 'size' => 'thumbnail' ), $post_id);
        break;

        case 'audio' :

        $file = reset(rwmb_meta('art_product_audio_select', array('limit' => 1), $post_id));

        echo $file['name'];
       
        break;
    }
}




add_filter( 'rwmb_meta_boxes', 'art_product_get_meta_box' );

function art_product_get_meta_box( $meta_boxes ) {
	$prefix = 'art_product_';

	$meta_boxes[] = array(
		'id' => 'standart',
		'title' => esc_html__( 'Standard Fields', 'innan-taulut' ),
		'post_types' => array('inna_art_product'),
		'context' => 'after_title',
		'priority' => 'high',
    'autosave' => 'true',
    'fields' => array(
			array(
				'id' => $prefix . 'art_select',
				'type' => 'single_image',
				'name' => esc_html__( 'Art:', 'innan-taulut' ),
				'max_file_uploads' => '1'
			),
      array(
				'id' => $prefix . 'image_wysiwyg',
				'type' => 'wysiwyg',
				'name' => esc_html__( 'Art description:', 'innan-taulut' ),
        'std' => __('Do you like the product? Take contact. Phone number 040 835 0388. Email innastyle@gmail.com', 'innan-taulut'),
        'options' => array(
          'teeny' => true,
          'media_buttons' => false
      )
			),
			array(
				'id' => $prefix . 'audio_select',
				'type' => 'file_advanced',
				'name' => esc_html__( 'Audio:', 'innan-taulut' ),
				'mime_type' => 'audio',
				'max_file_uploads' => 1,
				'max_status' => 'false'
      ),
      array(
				'id' => $prefix . 'audio_wysiwyg',
				'type' => 'wysiwyg',
				'name' => esc_html__( 'Audio description:', 'innan-taulut' ),
        'std' => __('Composition: <br> Composer:', "innan-taulut"),
        'options' => array(
          'textarea_rows' => 2,
          'teeny' => true,
          'media_buttons' => false
      )
			)
		)
	);

	return $meta_boxes;
}

?>