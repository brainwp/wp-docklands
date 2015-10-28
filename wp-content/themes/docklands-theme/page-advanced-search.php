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
global $is_advanced_search;
$is_advanced_search = true;
get_header();
?>

	<div id="primary" class="col-sm-12">
		<div id="content" class="site-content home" role="main">

			<?php get_sidebar( 'left' ); ?>

			<div class="col-sm-9 right">

				<?php odin_breadcrumbs(); ?>

				<?php
				// WP_Query arguments
				$args = array (
					'post_type'              => 'product',
					'posts_per_page'         => get_option('posts_per_page' ),
					);
				// The Query
				$query = new WP_Query( $args );
				?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php get_template_part( 'content', 'produto' ); ?>
                <?php endwhile; // end of the loop. ?>

                <?php get_template_part( 'parts/recentrly-items' ); ?>

			</div><!-- right -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
