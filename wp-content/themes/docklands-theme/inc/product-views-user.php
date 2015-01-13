<?php
/**
 * WooCommerce latest post view
 *
 * @author Brasa
 */
class Woo_Post_Views{
	public function __construct( $number) {
		(int) $this->show_posts = $number;
		add_action( 'admin_footer', array( $this, 'debug' ) );
	}

	public function get_posts(){
		$wp_cookie = $_COOKIE['woocommerce_recently_viewed'];
		if(empty($wp_cookie) || !isset($wp_cookie))
			return false;
		$wp_cookie = explode( '|', $_COOKIE['woocommerce_recently_viewed'] );
		$wp_cookie = array_reverse( array_filter( array_map( 'absint', $viewed_products ) ) );
		return array_unique($wp_cookie);
	}
}
global $woo_post_views;
$woo_post_views = new Woo_Post_Views(5);
