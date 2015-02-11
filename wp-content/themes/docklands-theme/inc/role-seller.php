<?
/**
 * WooCommerce role seller
 *
 * @author Brasa
 */
class Woo_Seller_Role{
	public function __construct() {
		$this->add_role();
		add_action( 'admin_enqueue_scripts', array($this,'scripts') );
		add_action( 'wp_ajax_woo_stock', array($this,'ajax_woo_stock') );
		add_action( 'admin_init', array($this,'admin_init'), 9999);
		add_action( 'admin_footer', array($this,'add_modal') );
	}
	private function get_user_role() {
		global $current_user;

		$user_roles = $current_user->roles;
		$user_role = array_shift($user_roles);

		return $user_role;
	}
	public function ajax_woo_stock(){
		if(is_user_logged_in() && $this->get_user_role() == 'woo_seller'){
			$id = $_POST['id'];
			$value = $_POST['value'];
			update_post_meta( $id, '_stock', $value);
			echo 'true';
		}
        die();
	}
	public function scripts(){
		$template_url = get_template_directory_uri();
		wp_enqueue_script( 'woo-role-js', $template_url . '/assets/js/role.js', array(), null, true );
	}
	private function add_role(){
		add_role(
			'woo_seller',
			__( 'Seller', 'odin' ),
			array(
                'read'              => true,
                'product'           => true,
                'edit_product'      => true,
                'edit_others_products'=> true,
                'edit_products' => true
            )
		);
	}
	public function admin_init(){
	    // gets the author role
		$role = get_role( 'woo_seller' );
		$role->add_cap( 'edit_others_products' );
		$role->add_cap( 'edit_products' );
	}
	public function add_modal(){
		add_thickbox();
	}
}
new Woo_Seller_Role();
