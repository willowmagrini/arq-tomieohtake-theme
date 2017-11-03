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



// add user
function my_acf_save_user( $post_id ) {

    if( wp_is_post_revision( $post_id ) || is_admin() ) {
        return;
    }

    // get the user name field
    $first_name = get_field('first_name', $post_id);

    // get the user name field
    $last_name = get_field('last_name', $post_id);

    if ( $first_name && $last_name ) {
        // create the user
        wp_create_user( $first_name . "_" . $last_name, bin2hex(random_bytes(16)) );

        // delete the unused post
        wp_delete_post($post_id);
    }

}

// run after ACF saves the $_POST['acf'] data
add_action('acf/save_post', 'my_acf_save_user', 20);





// Add a custom user role

$result = add_role( 'candidato', __(

'Candidato' ),

array(

'read' => true, // true allows this capability
'edit_posts' => true, // Allows user to edit their own posts
'edit_pages' => false, // Allows user to edit pages
'edit_others_posts' => false, // Allows user to edit others posts not just their own
'create_posts' => true, // Allows user to create new posts
'manage_categories' => true, // Allows user to manage post categories
'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
'edit_themes' => false, // false denies this capability. User can’t edit your theme
'install_plugins' => false, // User cant add new plugins
'update_plugin' => false, // User can’t update any plugins
'update_core' => false // user cant perform core updates

)

);

/**
 * Add / Edit users
 */
function trac_load_value_user_email( $value, $post_id, $field ) {
	if ( false !== strpos($post_id, 'user_') && $user_id = str_replace('user_', '', $post_id) ) {
		$userdata = get_userdata( $user_id );
		if ( $userdata ) {
			$value = $userdata->user_email;
		}
	}
    return $value;
}
add_filter( 'acf/load_value/name=user_email', 'trac_load_value_user_email', 10, 3 );



function trac_update_userdata( $post_id ) {
	if ( empty($_POST['acf']) || empty($_POST['acf']['field_59fc6a2a127ad']) || empty($_POST['acf']['field_59fc712d7a1fc']) || false === strpos($post_id, 'user') ) {
    set_transient( "validacao_user_error", 'Verifique os campo obrigatorios', 60 );
    return false;
  }
  $user_name= $_POST['acf']['field_59fc6a2a127ad'];
	$user_email = $_POST['acf']['field_59fc712d7a1fc'];
  $nome_completo= $_POST['acf']['field_59fbfafd7b7da'];
  $data_nasc = $_POST['acf']['field_59fbfb077b7db'];
  $site = $_POST['acf']['field_59fbfbae7b7e1'];
  // set_transient( "post_transient", $_POST, 60 );
	// Create a new user
	if ( 'new_user' === $post_id ) {
    if (username_exists($user_name)) {
      set_transient( "validacao_user_error", 'usuario ja existe', 60 );
      return false;
    }
		// If email already exists, this should be part of validation or at least return an error...
		if ( email_exists( $user_email ) ) {
      set_transient( "validacao_user_error", 'email ja existe', 60 );
      return false;
    }

		// Create a password
		$length = 13;
		$include_standard_special_chars = false;
		$random_password = wp_generate_password( $length, $include_standard_special_chars );
		// Create the user, use email as username
		$user_id = wp_create_user( $user_name, $random_password, $user_email );

    if (!is_int($user_id)){
      set_transient( "validacao_user_error", $user_id, 60 );
      return false;
    }
    else{
      delete_transient( "validacao_user_error");
      set_transient( "validacao_user_error", $user_id, 60 );
    }
		// Update name and role
		wp_update_user([
			'ID' => $user_id,
			'first_name' => ( ! empty($_POST['acf']['field_59fbfafd7b7da']) ? $_POST['acf']['field_59fbfafd7b7da'] : '' ),
			'role' => 'candidato',
      'user_url' => $site
		]);

    set_transient( "validacao_user_error", $user_id, 60 );


	// Edit the user's email
	} else {
    $user=str_replace('user_', '', $post_id);
    delete_transient( "validacao_user_error");

		wp_update_user([
			'ID' => $user,
			'user_email' => $user_email,
      'first_name' => $nome_completo,
      'user_url' => $site

		]);
	}
  do_action('acf/save_post', $post_id);

}
add_action( 'acf/pre_save_post', 'trac_update_userdata', 1 );


if(!function_exists('log_it')){
 function log_it( $message ) {
   if( WP_DEBUG === true ){
     if( is_array( $message ) || is_object( $message ) ){
       error_log( print_r( $message, true ) );
     } else {
       error_log( $message );
     }
   }
 }
}
