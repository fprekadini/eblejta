<?php

/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>

<head>
    <?php astra_head_top(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
    <?php astra_body_top(); ?>
    <?php wp_body_open(); ?>
    <div <?php
            echo astra_attr(
                'site',
                array(
                    'id'    => 'page',
                    'class' => 'hfeed site',
                )
            );
            ?>>
        <a class="skip-link screen-reader-text" href="#content"><?php echo esc_html(astra_default_strings('string-header-skip-link', false)); ?></a>
        <?php
        astra_header_before();

        ?>
        <header class="top-header">
            <nav class="navbar navbar-expand-lg">
                <div id="navbarNav" class="collapse navbar-collapse">
                    <?php
                    wp_nav_menu(array(
                        'menu'                 => '',
                        'container'            => 'div',
                        'container_class'      => 'collapse navbar-collapse',
                        'theme_location'       => 'primary',
                        'container_id'         => 'navbarNav',
                        'container_aria_label' => '',
                        'menu_class'           => 'navbar-nav',
                        'menu_id'              => '',
                        'echo'                 => true,
                        'fallback_cb'          => 'wp_page_menu',
                        'before'               => '',
                        'after'                => '',
                        'link_before'          => '',
                        'link_after'           => '',
                        'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'item_spacing'         => 'preserve',
                        'depth'                => 0,
                        'walker'               => '',
                    ));
                    ?>
                    <div class="second-sub-nav">
                        <ul class="navbar-nav">

                            <li class="dropdown">
                                <a href="" class="dropbtn">EUR</a>
                                <div class="dropdown-content">
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropbtn">English</a>
                                <div class="dropdown-content">
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <header class="header">
            <div class="header-middle">
                <div class="row header-search">
                    <div class="col-12 col-md-3">
                        <a href="/" aria-current="page" class="logo active-app-route router-link-active">
                            <?php astra_logo() ?>
                        </a>
                    </div>
                    <div class="header-search-wrap">
                        
                        <div class="dropdown">
                            <button class="dropbtn">Category</button>
                            <div class="dropdown-content">
                                <a href="#">Category 1</a>
                                <a href="#">Category 2</a>
                                <a href="#">Category 3</a>
                            </div>
                        </div>
                        <input id="q" type="search" name="q" placeholder="Kërko..." class="form-control">
                        <button type="submit" class="btn search-icon-btn">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>

                    <div class="icons col-12 col-md-3 ">
                        <div class="header-items">                    
                            <?php echo do_shortcode('[yith_wcwl_items_count]'); ?>
                            <?php echo do_shortcode("[woo_cart_but]"); ?>  
                          
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php

        astra_header_after();

        astra_content_before();
        ?>
        <div id="content" class="site-content">
            <div class="ast-container">
                <?php astra_content_top(); ?>