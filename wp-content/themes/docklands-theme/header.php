<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie ie7 lt-ie9 lt-ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="no-js ie ie8 lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="menu-top">
		<div class="wrap">
			<a href="">Teste</a>
			<div class="social-media pull-right">
				<div class="pull-left twitter"><a href=""></a></div>
				<div class="pull-left facebook"><a href=""></a></div>
				<div class="pull-left googleplus"><a href=""></a></div>
				<div class="pull-left youtube"><a href=""></a></div>
			</div><!-- top -->
		</div>
	</div><!-- menu-top -->

	<div class="container">
		<header id="header" role="banner">

			<a href="<?php echo home_url(); ?>">
				<div class="logo col-sm-3"></div><!-- logo -->
			</a>

			<div class="center col-sm-6">
				<span class="desc">"<?php bloginfo( 'description' ); ?>"</span>
				<div class="infos-contact bg-title">

					<?php if ( $phone = get_field( 'footer_phone', 'options' ) ) : ?>
						<span class="col-sm-6 phone"><?php echo $phone; ?></span>
					<?php endif; ?>

					<span class="col-sm-6 online-support">
						<span class="top">Online Support</span>
						<span class="bottom">Email Us</span>
					</span><!-- online-support -->

				</div><!-- infos-contact -->
			</div><!-- center -->

			<div class="itens-shop col-sm-3"></div><!-- itens-shop -->

			<nav id="main-navigation" class="navbar navbar-default" role="navigation">
				<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'odin' ); ?>"><?php _e( 'Skip to content', 'odin' ); ?></a>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
					<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php /*

					<a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

					*/ ?>
				</div>

				<div class="collapse navbar-collapse navbar-main-navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'depth'          => 2,
								'container'      => false,
								'menu_class'     => 'nav navbar-nav',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>

					<form method="get" class="navbar-form navbar-right" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
						<label for="navbar-search" class="sr-only"><?php _e( 'Search:', 'odin' ); ?></label>
						<div class="form-group">
							<input type="text" class="form-control" name="s" id="navbar-search" />
						</div>
						<button type="submit" class="btn btn-default"><?php _e( 'Search', 'odin' ); ?></button>
					</form>
				</div><!-- .navbar-collapse -->
			</nav><!-- #main-menu -->
		</header><!-- #header -->

		<div id="main" class="site-main row">
