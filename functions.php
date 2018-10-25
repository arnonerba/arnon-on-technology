<?php

add_theme_support( 'post-thumbnails' );

add_theme_support( 'automatic-feed-links' );

function add_title_support() {
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'add_title_support' );

function the_modified_title( $title ) {
	$title['tagline'] = null;
	return $title;
}
add_filter( 'document_title_parts', 'the_modified_title' );

function load_scripts() {
	if (!is_admin()) {
		wp_deregister_script( 'wp-embed' );
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), '' , null, true );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'highlight.js', get_template_directory_uri() . '/highlight.pack.js', '', filemtime(get_template_directory() . '/highlight.pack.js'), true );
	}
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

function load_styles() {
	if (!is_admin()) {
		wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', '', null );
		wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,700', '', null );
		wp_enqueue_style( 'style', get_stylesheet_uri(), '', '2.0.8' );
		wp_enqueue_style( 'tomorrow-night-eighties', get_template_directory_uri() . '/tomorrow-night-eighties.css', '', filemtime(get_template_directory() . '/tomorrow-night-eighties.css') );
	}
}
add_action( 'wp_enqueue_scripts', 'load_styles' );

function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}