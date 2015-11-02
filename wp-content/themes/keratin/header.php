<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything
 *
 * @package Keratin
 */
?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="site-wrapper hfeed site">

	<header id="masthead" class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

		<div class="container">
			<div class="row">

				<div class="col-xs-12 col-sm-8 col-md-4 col-lg-4">

					<?php
					$keratin_logo = get_theme_mod( 'keratin_logo', '' );
					if ( ! empty( $keratin_logo ) ) :
					?>
					<div class="site-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php echo esc_url( $keratin_logo ); ?>" class="site-logo-img" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
						</a>
					</div><!-- .site-logo -->
					<?php endif; ?>

					<?php if ( 'blank' !== get_header_textcolor() ) : ?>
					<div class="site-branding">
						<h2 class="site-title" itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
						<h3 class="site-description" itemprop="description"><?php bloginfo( 'description' ); ?></h3>
					</div><!-- .site-branding -->
					<?php endif; ?>

				</div>
				<div class="col-xs-12 col-sm-4 col-md-8 col-lg-8">

					<nav id="site-navigation" class="main-navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
						<button class="menu-toggle"><?php _e( 'Primary Menu', 'keratin' ); ?></button>
						<?php
						wp_nav_menu( apply_filters( 'keratin_wp_nav_menu_args', array(
							'container' => 'div',
							'container_class' => 'site-primary-menu',
							'theme_location' => 'primary',
							'menu_class' => 'primary-menu sf-menu'
						) ) );
						?>
					</nav><!-- #site-navigation -->

				</div>

			</div><!-- .row -->
		</div><!-- .container -->

	</header><!-- #masthead -->