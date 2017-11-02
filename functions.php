<?php
/**
 * Tomie Ohtake functions and definitions.
 *
 */

// Altera a função do footer, originalmente no arquivo inc/template-tags.php

if ( ! function_exists( 'coletivo_footer_site_info' ) ) {
    /**
     * Add Copyright and Credit text to footer
     * @since 1.1.3
     */
    function coletivo_footer_site_info()
    {
        ?>
        <?php $coletivo_footer_text = get_theme_mod( 'coletivo_footer_text', esc_html__('Few Rights Reserved', 'coletivo') );?>
        <?php $coletivo_footer_text_link = get_theme_mod( 'coletivo_footer_text_link' );?>
        <?php if ( $coletivo_footer_text_link != '' ) echo '<a href="' . esc_html( $coletivo_footer_text_link) . '" alt="" target="_blank">'; ?>
        <?php if ( $coletivo_footer_text != '' ) echo '<div class="container">' . esc_html( $coletivo_footer_text) . '</div>'; ?>
        <?php if ( $coletivo_footer_text_link != '' ) echo '</a>'; ?>

        <?php printf(esc_html__('%2$s %1$s', 'coletivo'), esc_attr(date('Y')), esc_attr(get_bloginfo())); ?>
        <span class="sep"> &ndash; </span>
        <?php printf(esc_html__('Desenvolvido pela %1$s com %2$s', 'coletivo'), '<a class="logo-brasa" href="' . esc_url('http://brasa.art.br', 'coletivo') . '">Brasa</a>', '<a class="logo-wp" href="' . esc_url('https://br.wordpress.org', 'coletivo') . '"><i class="fa fa-wordpress" aria-hidden="true"></i></a>'); ?>
        <?php
    }
}
add_action( 'coletivo_footer_site_info', 'coletivo_footer_site_info' );

//plugin
require get_stylesheet_directory() . '/inc/custom-post.php';
require get_stylesheet_directory() . '/inc/ajax_functions.php';

function bza_inscricoes_scripts() {
    wp_enqueue_style( 'style-bza_inscricoes', get_stylesheet_directory_uri().'/assets/css/bza_inscricoes_style.css' );
    wp_register_script('ajax-login-script', get_stylesheet_directory_uri() . '/assets/js/ajax-login-script.js', array('jquery') );
    wp_enqueue_script( 'ajax-login-script' );
}
add_action( 'wp_enqueue_scripts', 'bza_inscricoes_scripts' );

//ajax login
function ajax_login_init(){

    wp_register_script('ajax-login-script', get_stylesheet_directory_uri() . '/assets/js/ajax-login-script.js', array('jquery') );
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Verificando dados...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}
