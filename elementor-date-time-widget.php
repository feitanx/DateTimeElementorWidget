<?php
/**
 * Plugin Name: Elementor Date Time Widget
 * Description: A custom Elementor widget that displays the current date and time.
 * Version: 1.0
 * Author: Your Name
 * License: GPL2
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Include Elementor's necessary files.
function register_date_time_widget( $widgets_manager ) {
    require_once( __DIR__ . '/widget-date-time.php' );
    $widgets_manager->register( new \Elementor_Date_Time_Widget() );
}

add_action( 'elementor/widgets/register', 'register_date_time_widget' );

// Enqueue the JavaScript for real-time updates.
function enqueue_date_time_widget_script() {
    wp_enqueue_script( 'date-time-widget-js', plugins_url( '/js/date-time-widget.js', __FILE__ ), ['jquery'], null, true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_date_time_widget_script' );
