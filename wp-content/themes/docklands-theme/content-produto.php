<?php
//content produtos
$product = new WC_Product( get_the_ID() );
?>
					<div class="each col-sm-4">
						<div class="content">
							<a href="<?php the_permalink(); ?>">
							<div class="thumb">
								<?php if ( has_post_thumbnail() ): ?>
									<?php the_post_thumbnail( 'square-thumb' ); ?>
								<?php else: ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-400-400.png" alt="<?php echo bloginfo( 'name' ); ?>">
								<?php endif; ?>
							</a>
							</div><!-- thumb -->

							<div class="footer">
								<span class="desc">
									<?php the_title(); ?>
								</span><!-- desc -->

								<div class="preco">
									<span class="string-preco"><?php _e('Our Price','odin'); ?></span>
									<span class="o-preco"><?php echo woocommerce_price($product->get_price_excluding_tax()); ?></span>
									<span class="imposto-preco">
										<?php printf( __('(Inc. Vat %s)','odin'), woocommerce_price($product->get_price_including_tax()) ); ?>
									</span>
								</div><!-- preco -->

								<div class="bottom">
									<form class="cart produto-content" method="post" enctype="multipart/form-data">
										<input name="add-to-cart" value="<?php echo get_the_ID(); ?>" type="hidden">
										<button type="submit" class="btn cart"><?php _e('Add to cart','odin'); ?></button>
									</form>
									<a href="<?php the_permalink(); ?>" class="btn details pull-right">
										<?php _e('Details','odin'); ?>
									</a>
								</div><!-- bottom -->
							</div><!-- .footer -->

						</div><!-- content -->
					</div><!-- each -->
