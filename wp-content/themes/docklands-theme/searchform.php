<?php
/**
 * The template for displaying Search Form.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<form method="get" id="searchform" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="form-group">
		<label for="s" class="sr-only"><?php _e( 'Search', 'odin' ); ?></label>
		<?php if ( is_singular( 'services' ) ) : ?>
			<input type="hidden" name="post_type" value="product" />
		<?php endif;?>
		<input type="text" class="form-control" name="s" id="s" placeholder="<?php _e('Enter Search..','odin');?>" />
		<input type="submit" class="search-icon" />
	</div>
</form>
