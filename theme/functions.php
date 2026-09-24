<?php
/** Theme setup and assets. */
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', function () {
    load_theme_textdomain( 'local-theme', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
} );

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_script( 'fronex-motion', get_template_directory_uri() . '/assets/site.js', array(), (string) filemtime( get_template_directory() . '/assets/site.js' ), true );
    wp_enqueue_style( 'local-theme', get_stylesheet_uri(), array(), (string) filemtime( get_stylesheet_directory() . '/style.css' ) );
} );
