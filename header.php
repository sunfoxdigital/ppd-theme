<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package planpackdiscover
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-NHBJFLG8');</script>
		<!-- End Google Tag Manager -->

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NHBJFLG8"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'planpackdiscover' ); ?></a>

		<header id="masthead" class="site-header">
			<div class="header-content">
				<?php the_custom_logo(); ?>
				<nav id="site-navigation" class="main-navigation mobile-hide-block">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav>
				<nav id="site-navigation-mobile" class="main-navigation mobile-nav desktop-hide-block">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
					<img src="/wp-content/themes/planpackdiscover/assets/svg/menu-toggle-open.svg" class="menu-toggle menu-open-icon" width="18" height="100%" alt="Standard three bar hamburger menu open icon">
					<img src="/wp-content/themes/planpackdiscover/assets/svg/menu-toggle-close.svg" class="menu-toggle menu-close-icon" width="15" height="100%" alt="Standard three bar hamburger menu close icon">
				</nav>
			</div>
		</header>
		
		<div id="page" class="site">

			<main id="content">