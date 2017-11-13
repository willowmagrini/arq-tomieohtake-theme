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
       <h1>Entrar</h1>
       <p class="status"></p>
       <label for="username">Email</label>
       <input id="username" type="text" name="username">
       <label for="password">Senha</label>
       <input id="password" type="password" name="password">
       <a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Perdeu a senha?</a>
       <input class="submit_button" type="submit" value="Entrar" name="submit">
       <a class="close" href="">X</a>
       <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
   </form>


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
