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
                    'id' => 'twitter_url',
                    'label' => __('Twitter URL','odin'),
                    'type' => 'text',
                    'description' => ''
                ),
            )
        ),
    )
);
?>
