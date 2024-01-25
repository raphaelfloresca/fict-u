<?php 

    function university_files() {
        
        // Enqueue JS, set dependencies, set version, and whether to load at the closing body tag
        wp_enqueue_script( 'main_university_js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
        // Enqueue custom icons, fonts and styles
        wp_enqueue_style( 'font_awesome', get_theme_file_uri('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') );
        wp_enqueue_style( 'custom_google_fonts', get_theme_file_uri('//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i') );
        wp_enqueue_style( 'university_main_styles', get_theme_file_uri('/build/style-index.css') );
        wp_enqueue_style( 'university_extra_styles', get_theme_file_uri('/build/index.css') );
    }

    // Run this function when enqueuing scripts
    add_action( 'wp_enqueue_scripts', 'university_files' );

    
    function university_features() {
        add_theme_support('title-tag');
    }

    // Enable titles
    add_action('after_setup_theme', 'university_features');