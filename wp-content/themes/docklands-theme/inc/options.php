<?php
//options
$odin_theme_options = new Odin_Theme_Options(
	'odin-options', // Slug/ID da página (Obrigatório)
	__( 'Theme Options', 'odin' ), // Titulo da página (Obrigatório)
	'manage_options' // Nível de permissão (Opcional) [padrão é manage_options]
);
$odin_theme_options->set_tabs(
	array(
		array(
			'id' => 'social', // ID da aba e nome da entrada no banco de dados.
			'title' => __( 'Social', 'odin' ), // Título da aba.
		),
		array(
			'id' => 'home_cfg', // ID da aba e nome da entrada no banco de dados.
			'title' => __( 'Home', 'odin' ), // Título da aba.
		),
		array(
			'id' => 'footer_cfg', // ID da aba e nome da entrada no banco de dados.
			'title' => __( 'Footer', 'odin' ), // Título da aba.
		),
		array(
			'id' => 'woo_cfg', // ID da aba e nome da entrada no banco de dados.
			'title' => __( 'WooCommerce', 'odin' ), // Título da aba.
		),
	)
);
$odin_theme_options->set_fields(
	array(
		'social_section' => array(
			'tab'   => 'social', // Sessão da aba odin_general
			'title' => __( 'Social options', 'odin' ),
			'fields' => array(
				array(
					'id' => 'twitter_widget',
					'label' => __('Twitter Widget ID','odin'),
					'type' => 'text',
					'description' => ''
				),
				array(
					'id' => 'twitter_widget_max',
					'label' => __('Twitter Widget Max Posts','odin'),
					'type' => 'text',
					'default' => '5',
					'attributes' => array(
						'type' => 'number'
					),
					'description' => ''
				),
				array(
					'id' => 'twitter_url',
					'label' => __('Twitter URL','odin'),
					'type' => 'text',
					'description' => ''
				),
			)
		),
	    'woo_section' => array(
			'tab'   => 'woo_cfg', // Sessão da aba odin_general
			'title' => __( 'WooCommerce options', 'odin' ),
			'fields' => array(
				array(
					'id' => 'shipping_content',
					'label' => __('Shipping description','odin'),
					'type' => 'textarea',
					'description' => ''
				),
			   	array(
					'id' => 'send_email_msg',
					'label' => __('Default send e-mail message','odin'),
					'type' => 'textarea',
					'description' => ''
				),
			)
		),
		'home_section' => array(
			'tab'   => 'home_cfg', // Sessão da aba odin_general
			'title' => __( 'Home options', 'odin' ),
			'fields' => array(
				array(
					'id' => 'slider_cat',
					'label' => __('Slider Category Name','odin'),
					'type' => 'text',
					'description' => __('Set category for product slider in home','odin'),
				),
				array(
					'id' => 'home_banner_1',
					'label' => __('First Banner','odin'),
					'type' => 'image',
					'description' => __('Select imagem for first banner in home','odin'),
				),
				array(
					'id' => 'home_banner_1_link',
					'label' => __('First Banner Link','odin'),
					'type' => 'text',
					'description' => __('Link of first banner','odin'),
				),
				array(
					'id' => 'home_video',
					'label' => __('Video','odin'),
					'type' => 'textarea',
					'description' => __('Paste embed code for feature video in home','odin'),
				),
				array(
					'id' => 'home_differential',
					'label' => __('Differential','odin'),
					'type' => 'textarea',
					//'description' => __('Add URL for feature video in home','odin'),
				),
				array(
					'id' => 'home_banner_2',
					'label' => __('Second Banner','odin'),
					'type' => 'image',
					'description' => __('Select imagem for second banner in home','odin'),
				),
				array(
					'id' => 'home_banner_2_link',
					'label' => __('Second Banner Link','odin'),
					'type' => 'text',
					'description' => __('Link of second banner','odin'),
				),
				array(
					'id' => 'home_banner_3',
					'label' => __('Third Banner','odin'),
					'type' => 'image',
					'description' => __('Select imagem for third banner in home','odin'),
				),
				array(
					'id' => 'home_banner_3_link',
					'label' => __('Third  Banner Link','odin'),
					'type' => 'text',
					'description' => __('Link of third banner','odin'),
				),
			)
		),
		'footer_section' => array(
			'tab'   => 'footer_cfg', // Sessão da aba odin_general
			'title' => __( 'Footer', 'odin' ),
			'fields' => array(
				array(
					'id' => 'footer_address',
					'label' => __('Address','odin'),
					'type' => 'text',
					'description' => ''
				),
				array(
					'id' => 'footer_phone',
					'label' => __('Phone','odin'),
					'type' => 'text',
					'description' => ''
				),
				array(
					'id' => 'footer_fax',
					'label' => __('Fax','odin'),
					'type' => 'text',
					'description' => ''
				),
				array(
					'id' => 'footer_email',
					'label' => __('Email','odin'),
					'type' => 'text',
					'description' => ''
				),
			)
		),
	)
);
?>
