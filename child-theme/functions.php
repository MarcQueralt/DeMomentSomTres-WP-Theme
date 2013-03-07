<?php

/* Calls parent and child styles */
add_action('get_header', 'st_registerstyles');

function st_registerstyles() {
    $theme = wp_get_theme(wp_get_theme());
    $version = $theme['Version'];
    $stylesheets = wp_enqueue_style('skeleton', get_template_directory_uri() . '/skeleton.css', false, $version, 'screen, projection');
    $stylesheets .= wp_enqueue_style('theme-parent', get_template_directory_uri() . '/style.css', 'skeleton', $version, 'screen, projection');
    $stylesheets .= wp_enqueue_style('theme', get_stylesheet_directory_uri() . '/style.css', 'theme-parent', $version, 'screen, projection');
    $stylesheets .= wp_enqueue_style('layout', get_template_directory_uri() . '/layout.css', 'theme', $version, 'screen, projection');
    $stylesheets .= wp_enqueue_style('formalize', get_template_directory_uri() . '/formalize.css', 'theme', $version, 'screen, projection');
    $stylesheets .= wp_enqueue_style('superfish', get_template_directory_uri() . '/superfish.css', 'theme', $version, 'screen, projection');
    if (class_exists('jigoshop')) {
        $stylesheets .= wp_enqueue_style('jigoshop', get_template_directory_uri() . '/jigoshop.css', 'theme', $version, 'screen, projection');
    }
    $stylesheets = dmst_afegir_fonts_stylesheets($stylesheets);
    echo apply_filters('child_add_stylesheets', $stylesheets);
}

?>