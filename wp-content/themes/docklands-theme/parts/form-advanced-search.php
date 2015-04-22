<?php
/**
 * Display form to advanced search.
 */
?>

<form class="form-advanced-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<input type="hidden" name="s" value="">
	<input type="hidden" name="post_type" value="product">
	<h4 class="bg-title">
		<?php _e( 'Refine By', 'odin' ); ?>
		<span class="clear-form">
			<?php _e( 'Clear All', 'odin' ); ?>
		</span>
	</h4>
	<?php $categories = get_categories( array('taxonomy' => 'product_condition', 'orderby' => 'term_group') ); ?>
	<?php foreach($categories as $cat): ?>
	    <div class="checkbox col-md-12">
	    	<label>
	    		<input class="only-onecheck" type="checkbox" name="product_condition" value="<?php echo $cat->slug; ?>">
	    		<?php echo sprintf('%s (%s)',$cat->name,$cat->count); ?>
	    	</label>
	    </div><!-- checkbox -->
	<?php endforeach; ?>
	<div class="line"></div>

	<div class="toggle col-md-12">
		<div class="title">
			<?php _e('Show in stock only','odin'); ?>
			<span class="icon-open-close pull-right">+</span>
		</div><!-- title -->
		<div class="content">
			<div class="checkbox col-md-12">
				<label>
					<input type="checkbox" name="instock" value="true">
					<?php _e('Show in stock only?','odin'); ?>
				</label>
			</div><!-- .checkbox col-md-12 -->
		</div><!-- content -->
	</div><!-- toggle -->

	<div class="toggle col-md-12">
		<div class="title">
			<?php _e('Special Offer','odin'); ?>
			<span class="icon-open-close pull-right">+</span>
		</div><!-- title -->
		<div class="content">
			<div class="checkbox col-md-12">
				<label>
					<?php $cat = get_term_by('slug', 'special-offer', 'product_tag',OBJECT); ?>
					<input class="only-onecheck" type="checkbox" name="product_cat" value="<?php echo $cat->slug; ?>">
					<?php echo sprintf('%s (%s)',$cat->name,$cat->count); ?>
	            </label>
	        </div><!-- checkbox -->
		</div><!-- content -->
	</div><!-- toggle -->

	<div class="toggle col-md-12">
		<div class="title">
			<?php _e('Brand','odin'); ?>
			<span class="icon-open-close pull-right">+</span>
		</div><!-- title -->
		<div class="content">
			<?php $categories = get_categories( array('taxonomy' => 'brands', 'orderby' => 'term_group') ); ?>
			<?php foreach($categories as $cat): ?>
			    <div class="checkbox col-md-12">
			    	<label>
			    		<input class="only-onecheck" type="checkbox" name="brands" value="<?php echo $cat->slug; ?>">
			    		<?php echo sprintf('%s (%s)',$cat->name,$cat->count); ?>
	         	    </label>
	            </div><!-- checkbox -->
	        <?php endforeach; ?>
		</div><!-- content -->
	</div><!-- toggle -->

	<div class="toggle col-md-12">
		<div class="title">
			<?php _e('Price','odin'); ?>
			<span class="icon-open-close pull-right">+</span>
		</div><!-- title -->
		<div class="content">
			<?php $categories = get_categories( array('taxonomy' => 'price', 'orderby' => 'term_group') ); ?>
			<?php foreach($categories as $cat): ?>
					<div class="checkbox col-md-12">
						<label>
							<input class="only-onecheck" type="checkbox" name="price" value="<?php echo $cat->slug; ?>">
							<?php echo sprintf('%s (%s)',$cat->name,$cat->count); ?>
						</label>
	                </div><!-- checkbox -->
	            <?php endforeach; ?>
		</div><!-- content -->
	</div><!-- toggle -->

	<div class="toggle col-md-12">
		<div class="title">
			<?php _e('Product Type','odin'); ?>
			<span class="icon-open-close pull-right">+</span>
		</div><!-- title -->
		<div class="content">
			<?php $categories = get_categories( array('taxonomy' => 'tax_product_type', 'orderby' => 'term_group') ); ?>
			<?php foreach($categories as $cat): ?>
			    <div class="checkbox col-md-12">
			    	<label>
			    		<input class="only-onecheck" type="checkbox" name="tax_product_type" value="<?php echo $cat->slug; ?>">
			    		<?php echo sprintf('%s (%s)',$cat->name,$cat->count); ?>
	         	    </label>
	            </div><!-- checkbox -->
	        <?php endforeach; ?>
		</div><!-- content -->
	</div><!-- toggle -->

	<div class="toggle col-md-12">
		<div class="title">
			<?php _e('Material','odin'); ?>
			<span class="icon-open-close pull-right">+</span>
		</div><!-- title -->
		<div class="content">
			<?php $categories = get_categories( array('taxonomy' => 'material', 'orderby' => 'term_group') ); ?>
			<?php foreach($categories as $cat): ?>
			    <div class="checkbox col-md-12">
			    	<label>
			    		<input class="only-onecheck" type="checkbox" name="material" value="<?php echo $cat->slug; ?>">
			    		<?php echo sprintf('%s (%s)',$cat->name,$cat->count); ?>
	         	    </label>
	            </div><!-- checkbox -->
	        <?php endforeach; ?>
		</div><!-- content -->
	</div><!-- toggle -->
	<div class="toggle col-md-12">
		<div class="title">
			<?php _e('Colors','odin'); ?>
			<span class="icon-open-close pull-right">+</span>
		</div><!-- title -->
		<div class="content">
			<?php $categories = get_categories( array('taxonomy' => 'color') ); ?>
			<?php foreach($categories as $cat): ?>
			    <div class="checkbox col-md-12">
			    	<label>
			    		<input class="only-onecheck" type="checkbox" name="color" value="<?php echo $cat->slug; ?>">
			    		<img class="color-img" src="<?php bloginfo('template_url'); ?>/assets/images/admin-<?php echo $cat->slug;?>.jpg">
			    		<?php echo sprintf('(%s)',$cat->count); ?>
	         	    </label>
	            </div><!-- checkbox -->
	        <?php endforeach; ?>
		</div><!-- content -->
	</div><!-- toggle -->

	<div class="toggle col-md-12">
	</div><!-- toggle -->

	<div class="toggle col-md-12">
	</div><!-- toggle -->

	<input type="submit" value="<?php _e('Search >>','odin');?>" class="btn btn-large">
	<div class="clear"></div>
</form><!-- form-advanced-search -->
