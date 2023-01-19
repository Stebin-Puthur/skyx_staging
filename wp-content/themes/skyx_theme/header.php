<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package skyx_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="HandheldFriendly", content="True">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
  <!-- Global site tag (gtag.js) - Google Analytics-->
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-123896572-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-123896572-1');
  </script>
	
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/11addc1ab2ab0d7cf5b9f8074/1235e55c1ab0eb59c9f4ace9a.js");</script>
</head>

<body <?php body_class(); ?>>
<!-- MENU MOBILE-->
<nav id="mainNavoffCanvas" class="pushy pushy-left">
	<?php wp_nav_menu( array( 
		'theme_location' => 'mobile-menu',
		'container_class' => 'pushy-content'
		) ); ?>
</nav>
<div class="site-overlay"></div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'skyx_theme' ); ?></a>

	<header id="masthead" class="site-header">


    <nav id="site-navigation" class="main-navigation navbar fixed-top navbar-expand-md custom-carets justify-content-between">
    <?php if (!is_page('skytwo'))  { ?>
      <div class="container-fluid">
        <button class="offcanvas-menu-toggle menu-btn d-flex d-sm-flex d-md-none align-self-center" type="button"><span></span><span></span><span></span></button>
        <?php
        wp_nav_menu( array(
          'theme_location'    => 'main-menu-left',
          'depth'             => 2,
          'container'         => 'div',
          'container_class'   => 'navbar-collapse collapse order-1 order-lg-0',
          'container_id'      => 'menu-left',
          'menu_class'        => 'nav navbar-nav',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
    <?php }?>
        <a class="navbar-brand d-block text-center order-0 order-lg-1" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="sr-only"><?php bloginfo( 'name' ); ?></span><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/skyx-logo-white-text.svg"></a>
        <?php if (!is_page('skytwo'))  { ?>
        <?php
        wp_nav_menu( array(
          'theme_location'    => 'main-menu-right',
          'depth'             => 2,
          'container'         => 'div',
          'container_class'   => 'navbar-collapse collapse order-2',
          'container_id'      => 'menu-right',
          'menu_class'        => 'nav navbar-nav',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
         <?php }?>
        
    </nav><!-- #site-navigation -->
