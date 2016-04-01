<?php
/**
 * Template name: FAQ
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<div class="col-sm-12">

		<?php odin_breadcrumbs(); ?>

		<h2 class="bg-title"><?php _e( 'Frequent Asked Questions', 'odin' ); ?></h2>
	</div>

<?php get_sidebar(); ?>

	<div id="primary" class="<?php echo odin_page_sidebar_classes(); ?>">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
	
</div>
	
	

<?php
get_footer();

