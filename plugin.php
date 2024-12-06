<?php
/**
 * Plugin Name: Spidawerx Breakdance Element
 * Description: Adds a custom hero section element to the Breakdance Builder.
 * Version: 1.0.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Register Custom Element
add_action('breakdance_register_elements', 'register_spidawerx_hero_element');

function register_spidawerx_hero_element() {
    \Breakdance\Elements\Element::register(
        'spidawerx-hero-element',
        __( 'Custom Hero Section', 'custom-hero' ),
        'spidawerx_hero_element_controls',
        'spidawerx_hero_element_render'
    );
}

// Define Controls
function spidawerx_hero_element_controls($controls) {
    $controls->text(
        'service_links',
        __( 'Service Links', 'custom-hero' ),
        __( 'Define the text for each service link', 'custom-hero' )
    )->repeater(
        array('label' => __('Links', 'custom-hero'), 'max_items' => 5)
    );

    $controls->color(
        'hover_color',
        __( 'Hover Color', 'custom-hero' ),
        '#ff0000'
    );

    $controls->animation(
        'circle_animation',
        __( 'Circle Animation', 'custom-hero' ),
        __( 'Define animation properties for the circles', 'custom-hero' )
    );
}

// Template Rendering
function spidawerx_hero_element_render($settings, $content) {
    // Render the HTML structure using the settings from controls
    echo '<div class="hero-section">';
    echo '<div class="services">';
    foreach ($settings['service_links'] as $link) {
        echo '<a href="' . esc_url($link['url']) . '" class="service-link">' . esc_html($link['text']) . '</a>';
    }
    echo '</div>';
    echo '<div class="animated-circles" id="animated-circles">';
    echo '<!-- Animation code here -->';
    echo '</div>';
    echo '</div>';
}
?>
