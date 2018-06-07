<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title(''); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

    <?php wp_head(); ?>

</head>
<body <?php body_class( $class ); ?>>
<div id="site-wrap">

    <header class="siteHeader" role="banner">
        <a href="#top-of-content" class="visuallyhidden">Skip to content</a>
        <a href="" class="menu-toggle">
            <span class="hamburger">Menu</span>
        </a>
        <nav role="navigation" class="site-navigation" id="site-navigation" aria-label="Primary">
        <?php wp_nav_menu(array(
             'container' => false,                                  
             'menu' => __( 'Main Menu', 'bonestheme' ),
             'menu_class' => 'mainNavigation',
             'theme_location' => 'main-nav',
        )); ?>

        <?php wp_nav_menu(array(
             'container' => false,                                  
             'menu' => __( 'Header Menu', 'bonestheme' ),
             'menu_class' => 'headerNavigation',
             'theme_location' => 'header-nav',
        )); ?>
        
        </nav> <!-- /.site-navigation -->
    </header> <!-- /.siteHeader -->
<div id="top-of-content" class="visuallyhidden"></div>
