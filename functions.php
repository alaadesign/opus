<?php
/**
 * Theme setup
 */
function opus_setup(){
	/**
	 * Add theme supports
	 */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Register menu location
	 */
	register_nav_menus( array(
		'top_nav' => __( 'Top Navigation', 'opus' ),
		'bottom_nav' => __( 'Bottom Navigation', 'opus' )
	) );
}
add_action( 'after_setup_theme', 'opus_setup' );

/**
 * Enqueue scripts and styles
 */
function opus_scripts(){
	wp_enqueue_style( 'opus_google_fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700|Montserrat:300,400,700' );
	wp_enqueue_style( 'opus_style', get_template_directory_uri() . '/css/screen.css' );

	wp_enqueue_script( 'livejs', get_template_directory_uri() . '/js/live.js', array(), '20131106', true );
	wp_enqueue_script( 'opus_script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20131106', true );
}
add_action( 'wp_enqueue_scripts', 'opus_scripts' );

/**
 * Removing widht and height attribute from images
 */
add_filter( 'post_thumbnail_html', 'opus_remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'opus_remove_width_attribute', 10 );

function opus_remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';