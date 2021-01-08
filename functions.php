<?php

function arnon_on_technology_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	/*
	Remove WordPress version number meta tag.
	*/
	remove_action( 'wp_head', 'wp_generator' );
	/*
	Remove link to xmlrpc.php in header.
	*/
	remove_action( 'wp_head', 'rsd_link' );
	/*
	Escape HTML characters in comments.
	*/
	add_filter( 'pre_comment_content', 'esc_html' );
	/*
	Remove tagline from <title> tag.
	*/
	function arnon_on_technology_modify_title( $title ) {
		unset( $title['tagline'] );
		return $title;
	}
	add_filter( 'document_title_parts', 'arnon_on_technology_modify_title' );
}
add_action( 'after_setup_theme', 'arnon_on_technology_setup' );

function arnon_on_technology_enqueue_scripts_styles() {
	/*
	Enqueue JavaScript files.
	*/
	wp_deregister_script( 'wp-embed' );
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', includes_url( '/js/jquery/jquery.min.js' ), array(), false, true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/scripts.min.js', array( 'jquery' ), filemtime( get_template_directory() . '/scripts.min.js' ), true );
	wp_enqueue_script( 'highlight.js', get_template_directory_uri() . '/highlight.pack.js', array(), filemtime( get_template_directory() . '/highlight.pack.js' ), true );
	/*
	Enqueue CSS stylesheets.
	*/
	wp_dequeue_style( 'wp-block-library' );
	wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), null );
	wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,700', array(), null );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
	wp_enqueue_style( 'xt256', get_template_directory_uri() . '/xt256.css', array(), filemtime( get_template_directory() . '/xt256.css' ) );
}
add_action( 'wp_enqueue_scripts', 'arnon_on_technology_enqueue_scripts_styles' );

function arnon_on_technology_disable_emojis() {
	/*
	Disable additional emoji-related scripts and content loaded by WordPress. (Originally by Ryan Hellyer).
	*/
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'wp_resource_hints', 'arnon_on_technology_remove_emojis_dns_prefetch', 10, 2 );
}
add_action( 'init', 'arnon_on_technology_disable_emojis' );

function arnon_on_technology_remove_emojis_dns_prefetch( $urls, $relation_type ) {
	/*
	Remove emoji CDN hostname from DNS prefetching hints.
	*/
	if ( 'dns-prefetch' == $relation_type ) {
		$emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
		foreach ( $urls as $key => $url ) {
			if ( strpos( $url, $emoji_svg_url_bit ) !== false ) {
				unset( $urls[$key] );
			}
		}
	}
	return $urls;
}

function arnon_on_technology_adjust_theme_customization_sections( $wp_customize ) {
	/*
	Disable the Additional CSS section in the Theme Customizer.
	*/
	$wp_customize->remove_section( 'custom_css' );
}
add_action( 'customize_register', 'arnon_on_technology_adjust_theme_customization_sections' );

function arnon_on_technology_disable_author_archives() {
	/*
	Return a 404 when an author archive is requested.
	*/
	if ( is_author() ) {
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
		nocache_headers();
	}
}
add_action( 'template_redirect', 'arnon_on_technology_disable_author_archives' );
