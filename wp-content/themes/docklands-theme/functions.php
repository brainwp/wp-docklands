<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/core/classes/class-taxonomy.php';
require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';
require_once get_template_directory() . '/inc/dams-update-class.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since  2.2.0
	 *
	 * @return void
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' ),
				'top-menu' => __( 'Menu top', 'odin' ),
				'second-footer-menu' => __( 'Second Footer Menu', 'odin' )
			)
		);
		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'square-thumb', 400, 400, array('center','center') );
		add_image_size( 'half-horizontal-thumb', 585, 200, array('center','center') );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );
	}

	/*
	 * Quando o tema Docklands for ativado,
	 * seta a estrutura de permalinks para /%postname%/
	 */
	if ( isset( $_GET['activated'] ) && is_admin() ){
	    update_option( 'permalink_structure', '/%postname%/' );
	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __( 'Left Sidebar', 'odin' ),
			'id' => 'left-sidebar',
			'description' => __( 'Left Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __( 'Cloud Sidebar', 'odin' ),
			'id' => 'cloud-sidebar',
			'description' => __( 'Cloud Sidebar', 'odin' ),
			'before_widget' => '<div id="%1$s" class="widget col-md-12 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __( 'Join Newsletter', 'odin' ),
			'id' => 'join-sidebar',
			'description' => __( 'Join Newsletter Sidebar', 'odin' ),
			'before_widget' => '<div id="%1$s" class="widget col-md-12 nopadding %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Twitter Bootstrap.
	wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array(), null, true );

	// General scripts.
	// FitVids.
	wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );

    // Twitter fetcher.
	wp_enqueue_script( 'twitter-fetcher', $template_url . '/assets/js/libs/twitter.min.js', array(), null, true );

	// Main jQuery.
	wp_enqueue_script( 'odin-main', $template_url . '/assets/js/main.js', array(), null, true );
	if(is_singular('product')){
		global $wp_query;
		wp_localize_script( 'odin-main', 'product_info', array('id' => $wp_query->post->ID, 'ajax_url' => admin_url( 'admin-ajax.php' )) );
	}
	if(is_page('ask-a-question') && isset($_GET['url']) && !empty($_GET['url'])){
		if(!is_user_logged_in()){
			wp_localize_script( 'odin-main', 'form_info', array('url' => esc_url($_GET['url'])) );
		}
		else{
			$user = get_user_by('id', get_current_user_id());
			wp_localize_script( 'odin-main', 'form_info', array(
				'url'        => esc_url($_GET['url']),
				'user_name'  => $user->display_name,
				'user_email' => $user->user_email
				)
			);
		}
	}
	if(is_page('e-mail-a-friend') && isset($_GET['url']) && !empty($_GET['url']) && isset($_GET['product_title']) && !empty($_GET['product_title'])){
		$options = get_option('woo_cfg');
		if(!array_key_exists ( 'send_email_msg' , $options)){
			$options['send_email_msg'] = '';
		}
		if(!is_user_logged_in()){
			wp_localize_script( 'odin-main', 'form_info', array(
				'url'   => esc_url($_GET['url']),
				'title' => $_GET['product_title'],
				'msg'   => $options['send_email_msg'],
				)
			);
		}
		else{
			$user = get_user_by('id', get_current_user_id());
			wp_localize_script( 'odin-main', 'form_info', array(
				'url'        => esc_url($_GET['url']),
				'title'      => $_GET['product_title'],
				'msg'        => $options['send_email_msg'],
 				'user_name'  => $user->display_name,
				'user_email' => $user->user_email
				)
			);
		}
	}

	// Grunt main file with Bootstrap, FitVids and others libs.
	// wp_enqueue_script( 'odin-main-min', $template_url . '/assets/js/main.min.js', array(), null, true );
	//acf google map
	if(is_page_template('page-contact.php')){
		wp_enqueue_script( 'acf-googlemap', 'http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), null, true );
	}
	wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );
	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

function odin_admin_enqueue_scripts(){
	$template_url = get_template_directory_uri();

	wp_enqueue_style( 'woo-admin-css', $template_url . '/assets/css/admin.css', array(), null, 'all' );
	wp_enqueue_script( 'woo-admin-js', $template_url . '/assets/js/admin.js', array(), null, true );

	//check if theme cfg
	$cfg = get_option('is_theme_config_brasa');
	if(!$cfg && $cfg != 'true'){
		$max_term = 8;
		for ($i = 1; $i <= $max_term; $i++) {
			wp_insert_term(
			'Color' . $i, // the term
			'color', // the taxonomy
			array(
				'slug' => 'color' . $i,
				)
			);
		}
		$single = array(
	      'width' 	=> '230',	// px
		  'height'	=> '180',	// px
		  'crop'		=> 1 		// true
	    );
	    // Image sizes
	   update_option( 'shop_single_image_size', $single ); 		// Single product image

	   //add page advanced search
	   // Create post object
	   $my_post = array(
	   	'post_title'    => __('Advanced search','odin'),
	   	'post_status'   => 'publish',
	   	'post_name'     => 'advanced-search',
	   	'post_type'     => 'page'
	   	);

	   // Insert the post into the database
	   wp_insert_post( $my_post );

	   update_option('is_theme_config_brasa', 'true' );
	}
}
add_action( 'admin_init', 'odin_admin_enqueue_scripts');
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}
// Add specific CSS class by filter
function add_woo_class($classes) {
	// add 'class-name' to the $classes array
	$classes[] = 'woocommerce';
	// return the $classes array
	return $classes;
}
add_filter( 'body_class', 'add_woo_class' );
add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

function add_shipping_description(){
	if($option = get_option('woo_cfg')){
		echo esc_textarea($option['shipping_content']);
	}
}
add_action('woocommerce_after_shipping_calculator', 'add_shipping_description');
function brasa_woocommerce_checkout_after_order_review(){
	echo '<div class="col-md-12 accept-terms text-center">';
	echo '<label>';
	echo '<input type="checkbox" required="true" name="terms-check">';
	echo '<a href="'.home_url('/terms').'" target="_blank">&nbsp;';
	_e('You must accept the terms & conditions before continuing','odin');
	echo '</a>';
	echo '</label>';
	echo '</div>';
}
add_action('woocommerce_checkout_after_order_review', 'brasa_woocommerce_checkout_after_order_review');
/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/plugins-support.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';
/**
 * Add file of the Custom Widgets
 */
require_once get_template_directory() . '/inc/widgets.php';
/**
 * Advanced Custom Fields, Addons and Fields.
 */
require_once get_template_directory() . '/inc/advanced-custom-fields/acf.php';
//require_once get_template_directory() . '/inc/acf-options-page/acf-options-page.php';
//require_once get_template_directory() . '/inc/acf-repeater/acf-repeater.php';
require_once get_template_directory() . '/fields.php';
/**
 * User view posts
 */
require_once get_template_directory() . '/inc/product-views-user.php';
/**
 * Custom taxonomy & post types
 */
require_once get_template_directory() . '/inc/custom-taxs.php';
require_once get_template_directory() . '/inc/custom-posts.php';
/**
 * Custom search
 */
require_once get_template_directory() . '/inc/custom-search.php';
/**
 * options
 */
require_once get_template_directory() . '/inc/options.php';
/**
 * role seller
 */
require_once get_template_directory() . '/inc/role-seller.php';
ini_set('error_reporting', E_ALL);
