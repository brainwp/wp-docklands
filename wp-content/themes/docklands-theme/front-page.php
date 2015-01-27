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

				<div class="slider-home">
					<?php echo do_shortcode( '[brasa_slider name="Slider Home"]' ); ?>
				</div><!-- slider-home -->
				<?php get_template_part( 'parts/slider-product' ); ?>
				<h3 class="bg-title">New Arrivals</h3>

				<div class="col-sm-12 arrivals">
					<?php
					// WP_Query arguments
					$args = array (
						'post_type'              => 'product',
						'posts_per_page'         => '5',
					);
					// The Query
					$query = new WP_Query( $args );
					?>
					<?php if ( $query->have_posts() ) : ?>
						<?php while ( $query->have_posts() ): $query->the_post(); ?>
							<?php get_template_part('content','produto'); ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>

				</div><!-- arrivals -->
			</div><!-- right -->

			<div class="col-sm-12 full">

				<div class="col-sm-6 banner">
					<div class="content">
						BANNER
					</div><!-- content -->
				</div><!-- banner -->

				<div class="col-sm-6 video">
					<div class="content">
						VÍDEO
					</div><!-- content -->
				</div><!-- video -->

				<?php if ( $differential = get_field( 'home_differential', 'options' ) ) : ?>

					<div class="differential col-xs-12">
						<h4>Why Docklands are unique:</h4>
						<span><?php echo $differential; ?></span>
					</div><!-- differential -->

				<?php endif ?>

				<?php if ( $banner_2 = get_field( 'home_banner_2', 'options' ) ) : ?>

					<div class="banner col-sm-6">
						<img src="<?php echo $banner_2; ?>" alt="">
					</div><!-- banner -->

				<?php endif ?>

				<?php if ( $banner_3 = get_field( 'home_banner_3', 'options' ) ) : ?>

					<div class="banner col-sm-6">
						<img src="<?php echo $banner_3; ?>" alt="">
					</div><!-- banner -->

				<?php endif ?>

			</div><!-- full -->

			<?php get_template_part( 'parts/recentrly-items' ); ?>
			
			<div class="col-md-6 pull-right">
				<?php get_template_part( 'parts/twitter-posts' ); ?>				
			</div><!-- .col-md-6 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
