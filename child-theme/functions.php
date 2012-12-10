<?php
 
/* Calls parent and child styles */
if (!is_admin()) {
    wp_register_style('estils-pare', get_bloginfo('template_directory') . '/style.css', '', '201112');
    wp_register_style('estils', get_bloginfo('stylesheet_directory') . '/style.css', 'estils-pare', '201112');
    wp_enqueue_style('estils-pare');
    wp_enqueue_style('estils');
}
 
?>