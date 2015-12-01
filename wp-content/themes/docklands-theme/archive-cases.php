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

				<?php odin_breadcrumbs(); ?>

				<div class="col-sm-12">
					<h3 class="bg-title"><?php _e( 'Cases', 'odin' ); ?></h3>
				</div>

				<div class="slider-home cases">
					<?php echo do_shortcode( '[brasa_slider name="Slider Cases"]' ); ?>
				</div><!-- slider-home -->

				<div class="col-sm-12 full">

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ): the_post(); ?>
							<?php get_template_part( 'content', 'cases' ); ?>
						<?php endwhile; ?>
					<?php endif; ?>

				</div><!-- full -->
			</div><!-- right -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();