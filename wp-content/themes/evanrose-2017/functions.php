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
@ Remove Emojis
*/

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
@ Header Nav
*/

function er_nav_menu() {

	$args = array();
	$args = array( 
		'menu' 			=> 'Navigation', 
		'menu_class' 		=> '',
		'container_class' 	=> 'links',
    );
	
	return $nav_menu = wp_nav_menu( $args );
}

/**
@ Post title to body class
*/

function er_body_classes( $classes ) {

	global $post;
	if ( isset( $post ) ) {
		
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	
	return $classes;
}
add_filter( 'body_class', 'er_body_classes' );
