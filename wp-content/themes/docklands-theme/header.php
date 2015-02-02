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
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'top-menu',
						'depth'          => 0,
						'container'      => false,
						'menu_class'     => 'nav navbar-nav',
						'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
						'walker'         => new Odin_Bootstrap_Nav_Walker()
					)
				);
			?>
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

			<div class="itens-shop col-sm-3">
				<?php get_template_part('parts/woocommerce-infos'); ?>
			</div><!-- itens-shop -->

			<nav id="main-navigation" class="navbar navbar-default" role="navigation">
				<div class="collapse navbar-collapse navbar-main-navigation col-md-12">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'depth'          => 3,
								'container'      => false,
								'menu_class'     => 'nav navbar-nav',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>
				</div><!-- .navbar-collapse -->
			</nav><!-- #main-menu -->
		</header><!-- #header -->

		<div id="main" class="site-main row">
			<?php odin_breadcrumbs(); ?>
