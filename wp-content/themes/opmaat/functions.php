<?php

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
    'name' => _x( 'Medewerkers', 'Medewerkers' ),
    'singular_name' => _x( 'Medewerker', 'Medewerker' ),
    'add_new'            => __( 'Nieuwe medewerker' ),
    'add_new_item'       => __( 'Nieuwe medewerker' ),
    'edit_item'          => __( 'Bewerk medewerker' ),
    'new_item'           => __( 'Nieuwe medewerker' ),
    'all_items'          => __( 'Alle medewerkers' ),
    'view_item'          => __( 'Bekijk medewerker' ),
    'search_items'       => __( 'Zoek in medewerkers' )  
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
    'supports' => array('editor'),
    'featured_image' => 'Afbeelding',
    'set_featured_image' => 'Voeg afbeelding toe' 
  );

  register_post_type( 'medewerker', $args );
}

add_action( 'init', 'create_medewerkers' );
