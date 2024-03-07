<?php 

function import_files() {
    /* wp_enqueue_script('jquery-min', get_theme_file_uri('/js/jquery.min.js'), NULL, '2.2.3', true);
    wp_enqueue_script('jquery-sticky', get_theme_file_uri('/js/jquery.sticky.js'), NULL, '1.0.3', true);
    wp_enqueue_script('bootstrap-min-js', get_theme_file_uri('/js/bootstrap.min.js'), NULL, '5.2.2', true);
    wp_enqueue_script('click-scroll', get_theme_file_uri('/js/click-scroll.js'), NULL, '1.0', true);
    wp_enqueue_script('counter', get_theme_file_uri('/js/counter.js'), NULL, '1.0', true);
    wp_enqueue_script('custom', get_theme_file_uri('/js/main-custom.js'), NULL, '1.0', true);
    */
    wp_enqueue_style('bootstrap-min', get_theme_file_uri('/css/bootstrap.min.css'));
    wp_enqueue_style('bootstrap-icons', get_theme_file_uri('/css/bootstrap-icons.css'));
    wp_enqueue_style('getup-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'import_files');