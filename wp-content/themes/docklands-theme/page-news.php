<?php
/**
 * The template for displaying News/Blog.
 * Template name: News
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<div class="col-sm-12">
		<h2 class="bg-title"><?php _e( 'News', 'odin' ); ?></h2>
	</div>

<?php get_sidebar( 'news' ); ?>

	<section id="primary" class="col-md-9">
		<div id="content" class="site-content" role="main">

				<?php $posts_query = new WP_Query('posts_per_page=10');
				while($posts_query->have_posts()) : $posts_query->the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile;

				// Page navigation.
					odin_paging_nav();
					?>
				<?php wp_reset_postdata(); // reset the query ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_footer();
