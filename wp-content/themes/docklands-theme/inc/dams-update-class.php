<?php
/**
 * Brasa_Dams_FTP_Update
 *
 * @author Brasa
 */
class Brasa_Dams_FTP_Update{
	public function __construct() {
		add_action('init', array($this,'do_cron'));
	}
	public function add_cron(){
		if( wp_next_scheduled( 'brasa_dams_cron' ) )
			return;

		wp_schedule_event( time(), 'hourly', 'brasa_dams_cron' );
	}
	private function get_xml_file(){
		$cfg = get_option('woo_cfg');
		if($cfg && $cfg['dams_ftp_host']){
			$conect = sprintf('ftp://%s:%s@%s/Stock.xml', $cfg['dams_ftp_user'], $cfg['dams_ftp_pass'], $cfg['dams_ftp_host']);
			$content = file_get_contents($conect);
			$content = simplexml_load_string($content);
			return $content;
		}
	}
	public function do_cron(){
		if(is_admin() || !isset($_GET['do_dams_cron']))
			return;

		$file = $this->get_xml_file();
		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'product' ),
			'meta_query'             => array(
				array(
					'key'       => '_sku',
					'compare'   => 'EXISTS',
				),
			),
		);

		// The Query
		$query = new WP_Query( $args );
		// The Loop

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$path = sprintf('//Product[@Code="%s"]', get_post_meta( get_the_ID(), '_sku', true));
				$xml = json_decode(json_encode( (array) $file->xpath($path)), true);
				if($xml && !empty($xml) && is_array($xml)){
					$qty = $xml[0]['Warehouse']['@attributes']['Available'];
					update_post_meta( get_the_ID(), '_stock', $qty);
					update_post_meta( get_the_ID(), '_manage_stock', 'yes');
					if(intval($qty) > 0){
						update_post_meta( get_the_ID(), '_stock_status', 'instock');
					}
					else{
						update_post_meta( get_the_ID(), '_stock_status', 'outofstock');
					}
				}

			}
		}
		// Restore original Post Data
		wp_reset_postdata();
	}
}
new Brasa_Dams_FTP_Update();
