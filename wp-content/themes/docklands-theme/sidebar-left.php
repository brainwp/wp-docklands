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

	<?php
		if ( ! dynamic_sidebar( 'left-sidebar' ) ) {
			the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ) );
			the_widget( 'WP_Widget_Archives', array( 'count' => 0, 'dropdown' => 1 ) );
			the_widget( 'WP_Widget_Tag_Cloud' );
		}
	?>
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="advanced-search" class="col-md-12">
		<h4 class="sidebar-header"><?php _e('Categories','odin'); ?></h4><!-- .sidebar-header -->
		<?php $categories = get_categories( array('taxonomy' => 'product_cat', 'orderby' => 'term_group') ); ?>
		<?php foreach($categories as $cat): ?>
		    <?php $class = 'product-cat-list'; ?>
		    <?php if($cat->parent > 0): ?>
		        <?php $class = $class . ' is-child'; ?>
		    <?php endif; ?>
		    <a class="<?php echo $class; ?>" id="cat-<?php echo $cat->term_id; ?>" href="#cat-<?php echo $cat->term_id; ?>" data-slug="<?php echo $cat->slug; ?>">
		     	<?php echo $cat->name; ?>
		    </a>
		<?php endforeach; ?>
		<input type="hidden" id="input-categories" name="product_cat">
	    <input type="hidden" name="s">
	    <input type="hidden" name="post-type" value="product">
	</form><!-- #advanced-search.col-md-12 -->
</div><!-- #secondary -->
