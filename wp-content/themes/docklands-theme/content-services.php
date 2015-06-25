<?php
// Content Services
?>
<a class="col-md-4 services each" href="<?php the_permalink(); ?>">
	
	<div class="thumb">
		<?php the_post_thumbnail('square-thumb'); ?>
	</div><!-- .thumb -->

	<div class="desc">

		<h3><?php the_title(); ?></h3>
		<div class="product-info">
			<?php _e('View Service'); ?>
			<span class="orange">&gt;</span>
		</div><!-- .product-info -->

	</div><!-- .desc -->

</a><!-- .col-md-4 services -->
