<?php

add_theme_support( 'post-thumbnails' );
register_nav_menus(); 

/**
@ Enqueue Styles
*/

function er_enqueue_styles() {

	wp_enqueue_style( 'er_styles', get_template_directory_uri() . '/css/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'er_enqueue_styles' );

/**
@ Header Nav
*/

function er_nav_menu() {

	$args = array();
	$args = array( 
		'menu' 				=> 'Navigation', 
		'menu_class' 		=> '',
		'container_class' 	=> 'links',
    );
	
	return $nav_menu = wp_nav_menu( $args );
}