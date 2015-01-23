<?php
//slider products
$opts = get_option('home_cfg');
$term = get_term_by( 'name', $opts['slider_cat'], 'product_cat');
?>
<div class="col-sm-12 slider-products" id="slider-cat">
	<?php
	// WP_Query arguments
	$args = array (
		'post_type'              => 'product',
		'posts_per_page'         => 12,
		'tax_query' => array(
			array(
			'taxonomy' => 'product_cat',
			'field'    => 'id',
			'terms'    => $term->term_id,
			),
		),
	);
	// The Query
	$query = new WP_Query( $args );
	?>
	<?php if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ): $query->the_post();?>
            <?php $product = new WC_Product( get_the_ID() ); ?>
			<div class="each col-sm-4">
				<div class="content">
					<div class="thumb"></div><!-- thumb -->
					<span class="desc"><?php the_title(); ?></span><!-- desc -->
					<div class="tag-price">
						<div class="price">
							<?php echo woocommerce_price($product->get_price_excluding_tax()); ?>
						</div>
				        <div class="vat"><?php _e('+VAT','odin'); ?></div>
				    </div><!-- tag-price -->
				</div><!-- content -->
			</div><!-- each -->
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</div><!-- .slider-products -->
