<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header();
?>

	<div id="primary" class="col-sm-12">
		<div id="content" class="site-content home" role="main">

			<?php get_sidebar( 'left' ); ?>

			<div class="col-sm-9 right">
a
				<div class="slider-home">
					<?php echo do_shortcode( '[brasa_slider name="Slider Services"]' ); ?>
				</div><!-- slider-home -->
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();