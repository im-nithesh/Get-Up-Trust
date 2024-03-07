<?php 

function import_files() {
    
    wp_enqueue_style('bootstrap-min', get_theme_file_uri('/css/bootstrap.min.css'));
    wp_enqueue_style('bootstrap-icons', get_theme_file_uri('/css/bootstrap-icons.css'));
    wp_enqueue_style('getup-style', get_stylesheet_uri());
    
}

add_action('wp_enqueue_scripts', 'import_files');