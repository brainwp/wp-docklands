<?php
//content produtos
$product = new WC_Product( get_the_ID() );
?>
					<div class="each col-sm-4">
						<div class="content">

							<div class="thumb">
							</div><!-- thumb -->
							<span class="desc">
								<?php the_title(); ?>
							</span><!-- desc -->

							<div class="preco">
								<span class="string-preco"><?php echo woocommerce_price($product->get_price_excluding_tax()); ?></span>
								<span class="moeda-preco"> £ </span>
								<span class="o-preco"><?php echo woocommerce_price($product->get_price_including_tax()); ?></span>
								<span class="imposto-preco">(Inc. Vat £ 28,78)</span>
							</div><!-- preco -->

							<div class="bottom">
								<form class="cart produto-content" method="post" enctype="multipart/form-data">
									<input name="add-to-cart" value="8" type="hidden">
									<button type="submit" class="btn cart"><?php _e('Add to cart','odin'); ?></button>
								</form>
								<a href="<?php the_permalink(); ?>" class="btn details pull-right">
									<?php _e('Details','odin'); ?>
								</a>
							</div><!-- bottom -->

						</div><!-- content -->
					</div><!-- each -->
