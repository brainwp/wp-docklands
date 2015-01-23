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
				<?php
				/**
				* woocommerce_before_main_content hook
				*
				* @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the conten)
				* @hooked woocommerce_breadcrumb - 20
				*/
				do_action( 'woocommerce_before_main_content' );?>
				<?php while ( have_posts() ) : the_post(); ?>
				    <?php wc_get_template_part( 'content', 'single-product' ); ?>
			    <?php endwhile; // end of the loop. ?>
                <?php
                /**
                * woocommerce_after_main_content hook
                *
                * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                */
                do_action( 'woocommerce_after_main_content' );
                ?>
				<div class="col-sm-12 slider-products">

					<div class="each col-sm-4">

						<div class="content">

							<div class="thumb">
							</div><!-- thumb -->
							<span class="desc">
								<?php the_title(); ?>
							</span><!-- desc -->

							<div class="tag-price">
								 <div class="price">£ 23,99</div>
								 <div class="vat">+VAT</div>
							</div><!-- tag-price -->

						</div><!-- content -->

					</div><!-- each -->

					<div class="each col-sm-4">

						<div class="content">

							<div class="thumb">
							</div><!-- thumb -->
							<span class="desc">
								<?php the_title(); ?>
							</span><!-- desc -->

							<div class="tag-price">
								 <div class="price">£ 23,99</div>
								 <div class="vat">+VAT</div>
							</div><!-- tag-price -->

						</div><!-- content -->

					</div><!-- each -->

					<div class="each col-sm-4">

						<div class="content">

							<div class="thumb">
							</div><!-- thumb -->
							<span class="desc">
								<?php the_title(); ?>
							</span><!-- desc -->

							<div class="tag-price">
								 <div class="price">£ 23,99</div>
								 <div class="vat">+VAT</div>
							</div><!-- tag-price -->

						</div><!-- content -->

					</div><!-- each -->

				</div><!-- .slider-products -->

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
			<?php get_template_part( 'parts/twitter-posts' ); ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
