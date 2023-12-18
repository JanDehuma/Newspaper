<?php
/**
 * Plugin Name: Custom Zoom
 * Description: Agrega una lupa a la página completa.
 * Version: 1.0
 * Author: Jan
 */

// Agrega scripts y estilos
function custom_zoom_scripts() {
    wp_enqueue_style('custom-zoom-style', plugins_url('style.css', __FILE__));
    wp_enqueue_script('custom-zoom-script', plugins_url('custom-zoom.js', __FILE__), array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'custom_zoom_scripts');
