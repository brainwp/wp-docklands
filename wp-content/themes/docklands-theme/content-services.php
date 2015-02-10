<?php
// Content Services
?>
<a class="col-md-4 services each" href="<?php the_permalink(); ?>">
	<?php the_post_thumbnail('medium'); ?>
	<h3><?php the_title(); ?></h3>
	<div class="product-info">
		<?php _e('View Service'); ?>
		<span class="orange">&gt;</span>
	</div><!-- .product-info -->
</a><!-- .col-md-4 services -->
