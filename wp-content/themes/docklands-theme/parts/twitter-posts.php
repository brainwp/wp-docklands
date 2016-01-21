<?php
/*
Display twitter posts
*/
$opts = get_option('social');
?>
<div id="twitter-container">
	<a href="<?php echo esc_url($opts['twitter_url']); ?>">
		<img src="<?php bloginfo('template_url'); ?>/assets/images/twitter-link.jpg">
	</a>
	<?php echo sprintf('<div id="twitter-fetcher" data-widget-id="%s" data-widget-max="%s"></div>',esc_attr($opts['twitter_widget']),esc_attr($opts['twitter_widget_max'])); ?>
</div><!-- #twitter-container -->
