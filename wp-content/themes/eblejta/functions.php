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
add_shortcode('woo_cart_but', 'woo_cart_but');
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but()
{
    ob_start();

    $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
    $cart_url = wc_get_cart_url();  // Set Cart URL

?>
    <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
        <?php
        if ($cart_count > 0) {
        ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
    </a>
    <?php

    return ob_get_clean();
}
if (defined('YITH_WCWL') && !function_exists('yith_wcwl_get_items_count')) {
    function yith_wcwl_get_items_count()
    {
        ob_start();
    ?>
        <a href="<?php echo get_site_url(); ?>/wishlist" class="yith-wcwl-items-count">
            <i class="yith-wcwl-icon fa fa-heart-o">
                <?php echo esc_html(yith_wcwl_count_all_products()); ?>
            </i>
        </a>
<?php
        return ob_get_clean();
    }
    add_shortcode('yith_wcwl_items_count', 'yith_wcwl_get_items_count');
}

if (defined('YITH_WCWL') && !function_exists('yith_wcwl_ajax_update_count')) {
    function yith_wcwl_ajax_update_count()
    {
        wp_send_json(array(
            'count' => yith_wcwl_count_all_products()
        ));
    }
    add_action('wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count');
    add_action('wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count');
}

if (defined('YITH_WCWL') && !function_exists('yith_wcwl_enqueue_custom_script')) {
    function yith_wcwl_enqueue_custom_script()
    {
        wp_add_inline_script(
            'jquery-yith-wcwl',
            "
           jQuery( function( $ ) {
             $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
               $.get( yith_wcwl_l10n.ajax_url, {
                 action: 'yith_wcwl_update_wishlist_count'
               }, function( data ) {
                 $('.yith-wcwl-items-count').html( data.count );
               } );
             } );
           } );
         "
        );
    }
    add_action('wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20);
}
