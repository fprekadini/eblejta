<?php
// Define Constants
define('CHILD_THEME_eblejta_VERSION', '1.0.0');
//  Enqueue styles
function child_enqueue_styles()
{
    wp_enqueue_style('eblejta-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_eblejta_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);

//  Add a new country to countries list
add_filter('woocommerce_countries',  'handsome_bearded_guy_add_my_country');
function handsome_bearded_guy_add_my_country($countries)
{
    $new_countries = array(
        'XK'  => __('KOSOVO', 'woocommerce'),
    );
    return array_merge($countries, $new_countries);
}
add_filter('woocommerce_continents', 'handsome_bearded_guy_add_my_country_to_continents');
function handsome_bearded_guy_add_my_country_to_continents($continents)
{
    $continents['EU']['countries'][] = 'XK';
    return $continents;
}
