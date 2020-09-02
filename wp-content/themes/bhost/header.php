<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package bhost
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- .container is main centered wrapper -->

	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'bhost' ); ?></a>	
		<header id="masthead" class="site-header" role="banner">		
			<div class="site-branding">
				<div class="container">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php bloginfo( 'description'); ?></p>
				</div>
			</div><!-- .site-branding -->				
							
			<div class="mainmenu">
				<div class="container">
					<nav id="nav">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => '', ) ); ?>
					</nav>
				</div>
			</div>										
		</header><!-- #masthead -->

	<div class="container">		
		<div class="row">
			<div id="content" class="site-content">
