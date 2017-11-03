<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coletivo
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <form id="login-user" action="login" method="post">
        <a id="register-user-link" href="#register-user">Ainda não tem cadastro?</a>
       <h1>Entrar</h1>
       <p class="status"></p>
       <label for="username">Nome de usuário</label>
       <input id="username" type="text" name="username">
       <label for="password">Senha</label>
       <input id="password" type="password" name="password">
       <a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Perdeu a senha?</a>
       <input class="submit_button" type="submit" value="Login" name="submit">
       <a class="close" href="">(fechar)</a>
       <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
   </form>


   
   <form id="cadastro-user" class="form-horizontal registraion-form" role="form">
     <a id="login-user-link" href="#register-user">Já tenho cadastro?</a>

    <div class="form-group">
      <label for="vb_name" class="sr-only">Your Name</label>
      <input type="text" name="vb_name" id="vb_name" value="" placeholder="Your Name" class="form-control" />
    </div>

    <div class="form-group">
      <label for="vb_email" class="sr-only">Your Email</label>
      <input type="email" name="vb_email" id="vb_email" value="" placeholder="Your Email" class="form-control" />
    </div>

    <div class="form-group">
      <label for="vb_nick" class="sr-only">Your Nickname</label>
      <input type="text" name="vb_nick" id="vb_nick" value="" placeholder="Your Nickname" class="form-control" />
    </div>

    <div class="form-group">
      <label for="vb_username" class="sr-only">Choose Username</label>
      <input type="text" name="vb_username" id="vb_username" value="" placeholder="Choose Username" class="form-control" />
      <span class="help-block">Please use only a-z,A-Z,0-9,dash and underscores, minimum 5 characters</span>
    </div>

    <div class="form-group">
      <label for="vb_pass" class="sr-only">Choose Password</label>
      <input type="password" name="vb_pass" id="vb_pass" value="" placeholder="Choose Password" class="form-control" />
      <span class="help-block">Minimum 8 characters</span>
    </div>

    <?php wp_nonce_field('vb_new_user','vb_new_user_nonce', true, true ); ?>
    <a class="close" href="">(fechar)</a>

    <input type="submit" class="btn btn-primary" id="btn-new-user" value="Register" />
  </form>
   <?php if (is_user_logged_in()) { ?>
    <a class="login_button" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
<?php } else { ?>
    <a class="login_button" id="show_login" href="">Login</a>
<?php } ?>
<?php do_action( 'coletivo_before_site_star' ); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'coletivo' ); ?></a>
    <?php
    /**
     * Hooked: coletivo_site_header
     *
     * @see coletivo_site_header
     */
    do_action( 'coletivo_site_start' );
    ?>
