<?php
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

  if (strpos($post_id, 'new_post_') !== false) {
    $user=str_replace('new_post_', '', $post_id);
    $post = array(
       'post_status'  => 'publish' ,
       'post_title'  => $_POST['acf']['field_59fca3266ece7'] ,
       'post_type'  => 'bza_inscricoes' ,
       'post_author' => $user
   );

   // insert the post
   $post_id = wp_insert_post( $post );

   // return the new ID
   return $post_id;
  }
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
      wp_set_current_user($user_id);
      wp_set_auth_cookie($user_id);
      delete_transient( "validacao_user_error");
      set_transient( "validacao_user_error", $user_id, 60 );
      wp_update_user([
  			'ID' => $user_id,
  			'first_name' => ( ! empty($_POST['acf']['field_59fbfafd7b7da']) ? $_POST['acf']['field_59fbfafd7b7da'] : '' ),
  			'role' => 'candidato',
        'user_url' => $site
  		]);
      $post_id='user_'.$user_id;
      delete_transient( "validacao_user_error");

    }
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

      // You can change home_url() to the specific URL,such as
  //wp_redirect( 'http://www.wpcoke.com' );
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

function logout_redirect($logouturl, $redir)
    {
        return $logouturl . '&amp;redirect_to='.get_permalink();
    }
add_filter('logout_url', 'logout_redirect', 10, 2);

function hwl_home_pagesize( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        // Display only 1 post for the original blog archive
        $query->set( 'posts_per_page', 1 );
        return;
    }

    if ( is_post_type_archive( 'bza_inscricoes' ) ) {
        $user_id=get_current_user_id();

        // Display 50 posts for a custom post type called 'movie'
        $query->set( 'author', $user_id );
        return;
    }
}
add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );
