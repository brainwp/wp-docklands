<?php
/**
 * The template for displaying page Cart.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header();
?>

	<div id="primary" class="">
		<div id="content" class="site-content" role="main">

			<div class="col-sm-12 right">

				<?php odin_breadcrumbs(); ?>

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						// Include the page content template.
						get_template_part( 'content', 'page' );

					endwhile;
				?>

			</div><!-- right -->
			
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
