<?php

// featured image aanzetten voor theme
add_theme_support( 'post-thumbnails' );
add_image_size( 'medewerker_size', 400, 600, true);

/**
 *      scriptjes laden
 */

function load_scripts() {
    wp_enqueue_script('jquery', "https://code.jquery.com/jquery-3.2.1.slim.min.js", array(), true );
    wp_enqueue_script('popper', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js", array(), true);
    wp_enqueue_script('bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js", array(), true); 
}

add_action( 'wp_enqueue_scripts', 'load_scripts' );


/**
 *      stylesheets laden
 */

function load_stylesheets() {
    wp_enqueue_style('opmaat_style', get_template_directory_uri() . "/style.css", array(), true); 
    wp_enqueue_style('boostrap_style', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css", array(), true); 
    wp_enqueue_style('google_fonts', "https://fonts.googleapis.com/css?family=Amatic+SC&display=swap", array(), true); 
}

add_action( 'wp_enqueue_scripts', 'load_stylesheets');

/**
 *      custom post type voor medewerkers
 */

function create_medewerkers() {

    $labels = array(
        'name'               => _x( 'Medewerkers', 'Medewerkers' ),
        'singular_name'      => _x( 'Medewerker', 'Medewerker' ),
        'add_new'            => __( 'Nieuwe medewerker' ),
        'add_new_item'       => __( 'Nieuwe medewerker' ),
        'edit_item'          => __( 'Bewerk medewerker' ),
        'new_item'           => __( 'Nieuwe medewerker' ),
        'all_items'          => __( 'Alle medewerkers' ),
        'view_item'          => __( 'Bekijk medewerker' ),
        'search_items'       => __( 'Zoek in medewerkers' ),  
        'featured_image'     => __('Foto medewerker'),
        'set_featured_image' => __('Voeg foto toe') 
    );

    // Set various pieces of information about the post type
    $args = array(
        'labels' => $labels,
        'description' => 'Medewerker',
        'has_archive' => false,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'show_in_nav_bar' => true,
        'menu_position' => 5, 
        'public' => true,
        'menu_icon' => 'dashicons-universal-access',
        'supports' => array('title', 'editor', 'thumbnail'),
        'publicly_queryable'  => false,
    );

    register_post_type( 'medewerker', $args );
}

add_action('init', 'create_medewerkers');


function remove_media_buttons() {
    global $current_screen;

    // Replace following array items with your own custom post types
    $post_types = array('medewerker');
    if (in_array($current_screen->post_type,$post_types)) {
        remove_action('media_buttons', 'media_buttons');
    }
}

add_action( 'admin_head' , 'remove_media_buttons');

function medewerker_posts_columns( $columns ) {
    $columns = array();
    $columns['featured_image'] = __( 'Foto' );
    $columns['title'] = __( 'Naam' );
    return $columns;
}

add_filter( 'manage_medewerker_posts_columns', 'medewerker_posts_columns' );

function medewerker_title_text( $title ){
     $screen = get_current_screen();
     if  ( $screen->post_type == 'medewerker' ) {
          $title = 'Naam medewerker';
     }
     return $title;
}

add_filter( 'enter_title_here', 'medewerker_title_text' );

function custom_columns_data( $column, $post_id ) {
    switch ( $column ) {
    case 'featured_image':
        the_post_thumbnail( array(40, 40));
        break;
    }
}
add_action( 'manage_posts_custom_column' , 'custom_columns_data', 10, 2 ); 

add_action('admin_head', 'my_admin_custom_styles');
function my_admin_custom_styles() {
    $output_css = '<style type="text/css">
        .column-featured_image { width:30px !important; overflow:hidden }
    </style>';
    echo $output_css;
}

add_filter('user_can_richedit', function( $default ){
  global $post;
  if( $post->post_type === 'medewerker')  return false;
  return $default;
});
