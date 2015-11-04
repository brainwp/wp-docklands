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
 * @version 3.0.0
 */
$options = get_option('home_cfg');
get_header();
?>

	<div id="primary" class="col-sm-12">
		<div id="content" class="site-content home" role="main">

			<?php get_sidebar( 'left' ); ?>

			<div class="col-sm-9 right">
				<?php woocommerce_product_loop_start(); ?>
				<?php woocommerce_product_subcategories(); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'produto' ); ?>
                <?php endwhile; // end of the loop. ?>
                <?php woocommerce_product_loop_end(); ?>
                <div class="col-md-12 pagination">
                	<?php
                	// Page navigation.
					odin_paging_nav();
					?>
                </div><!-- .col-md-12 pagination -->
			</div><!-- right -->

			<div class="col-sm-12 full">

				<?php if ( $banner_1 = $options['home_banner_1'] ) : ?>
				    <?php $link = (!empty($options['home_banner_1_link']))? $options['home_banner_1_link'] : 'javascript:void(0)'; ?>

					<div class="banner col-sm-6">
						<a href="<?php echo $link;?>">
							<?php echo wp_get_attachment_image($banner_1,'half-horizontal-thumb'); ?>
						</a>
					</div><!-- banner -->

				<?php endif ?>

				<div class="col-sm-6 video">
					<div class="content">
						<?php echo strip_tags($options['home_video'],'<iframe>'); ?>
					</div><!-- content -->
				</div><!-- video -->

			</div>

			<div class="col-sm-12 full">

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
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
