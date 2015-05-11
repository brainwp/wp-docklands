<?php
/**
 * The sidebar containing the secondary widget area, displays on homepage, archives and posts.
 *
 * If no active widgets in this sidebar, it will shows Recent Posts, Archives and Tag Cloud widgets.
 *
 * @package Odin
 * @since 2.2.0
 */
global $is_advanced_search;
?>

<div id="secondary" class="col-sm-3 left" role="complementary">

	<?php
		if ( is_page_template( 'page-advanced-search.php' ) || is_search() || $is_advanced_search == true )  :
			get_template_part( 'parts/form-advanced-search' );
		endif;
		//echo get_page_template_slug();
	?>

	<?php dynamic_sidebar( 'left-sidebar' ); ?>

</div><!-- #secondary -->
