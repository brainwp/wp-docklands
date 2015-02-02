<?php
/**
 * The sidebar containing the secondary widget area, displays on homepage, archives and posts.
 *
 * If no active widgets in this sidebar, it will shows Recent Posts, Archives and Tag Cloud widgets.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<div id="secondary" class="col-sm-3 left" role="complementary">
	
	<?php get_template_part( 'parts/form-advanced-search' ); ?>

	<?php dynamic_sidebar( 'left-sidebar' ); ?>
	
</div><!-- #secondary -->
