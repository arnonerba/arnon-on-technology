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

function load_scripts() {
	if (!is_admin()) {
		wp_deregister_script( 'wp-embed' );
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), '' , false, true );
		wp_enqueue_script( 'scripts', get_template_directory_uri() . '/scripts.min.js', array( 'jquery' ), filemtime( get_template_directory() . '/scripts.min.js' ), true );
		wp_enqueue_script( 'highlight.js', get_template_directory_uri() . '/highlight.pack.js', '', filemtime( get_template_directory() . '/highlight.pack.js' ), true );
	}
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

function load_styles() {
	if (!is_admin()) {
		wp_dequeue_style( 'wp-block-library' );
		wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', '', null );
		wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,700', '', null );
		wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', '', filemtime( get_stylesheet_directory() . '/style.css' ) );
		wp_enqueue_style( 'xt256', get_template_directory_uri() . '/xt256.css', '', filemtime( get_template_directory() . '/xt256.css' ) );
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
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
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

function disable_author_archives() {
	if ( is_author() ) {
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
		nocache_headers();
	}
}
add_action( 'template_redirect', 'disable_author_archives' );
