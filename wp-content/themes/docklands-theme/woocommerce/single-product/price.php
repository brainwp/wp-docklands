<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<div class="preco pull-left col-md-6" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	<div class="flex">
		<span class="string-preco"><?php _e('Our Price','odin'); ?></span>
		<span class="o-preco"><?php echo woocommerce_price($product->get_price_excluding_tax()); ?></span>
		<span class="imposto-preco">
			<?php printf( __('(Inc. Vat %s)','odin'), woocommerce_price($product->get_price_including_tax()) ); ?>
		</span>
	</div><!-- flex -->
</div>
<div class="pull-right col-md-6 qt">
	<label class="pull-left"><?php _e('Key','odin'); ?></label>
	<?php $max = 9999 ?>
	<?php if($product->get_total_stock()): ?>
	    <?php $max = $product->get_total_stock(); ?>
	<?php endif; ?>
	<input id="selector_qty" min="1" step="1" max="<?php echo esc_attr($max);?>" value="1" title="Qtd" class="input-text qty text col-md-3" size="4" type="number">
</div><!-- .pull-right col-md-6 qt -->
