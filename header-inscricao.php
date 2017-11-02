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
  <form id="login" action="login" method="post">
       <h1>Site Login</h1>
       <p class="status"></p>
       <label for="username">Username</label>
       <input id="username" type="text" name="username">
       <label for="password">Password</label>
       <input id="password" type="password" name="password">
       <a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a>
       <input class="submit_button" type="submit" value="Login" name="submit">
       <a class="close" href="">(close)</a>
       <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
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
