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

		<link rel="preload" as="font" type="font/woff2" crossorigin
			href="<?php echo get_template_directory_uri(); ?>/assets/fonts/montserrat/Montserrat-VariableFont_wght.woff2">

		<link rel="preload" as="font" type="font/woff2" crossorigin
			href="<?php echo get_template_directory_uri(); ?>/assets/fonts/raleway/Raleway-VariableFont_wght.woff2">

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
				<nav id="site-navigation" class="main-navigation" aria-label="Primary Navigation">
					<div class="menu-main-menu-container">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container'      => false,
						)
					);

					if ( function_exists('generate_wppd_menu') ) :
            			echo generate_wppd_menu();
        			endif;
					?>
					</div>
				<button 
					class="menu-toggle menu-open-icon desktop-hide-inline"
					aria-label="Open menu"
				>
					<?php get_template_part( 'template-parts/svg/menu-toggle-open' ); ?>
				</button>

				<button 
					class="menu-toggle menu-close-icon desktop-hide-inline"
					aria-label="Close menu"
				>
					<?php get_template_part( 'template-parts/svg/menu-toggle-close' ); ?>
				</button>
	
				</nav>
			</div>
		</header>
		
		<div id="page" class="site">

			<main id="content">