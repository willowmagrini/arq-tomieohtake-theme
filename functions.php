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

if ( ! function_exists( 'coletivo_site_header' ) ) {

    function coletivo_site_header(){
        ?>
        <header id="masthead" class="site-header" role="banner">
            <div class="container">
                <div class="site-branding">
                	<div class="site-brand-inner has-logo-img no-desc">
	                	<div class="site-logo-div"><a href="http://institutotomieohtake.org.br/" class="custom-logo-link" rel="home" itemprop="url" target="_blank">
	                		<img width="326" height="57" src="<?php echo get_stylesheet_directory_uri(); ?>/images/ito_logo_menu.png" class="custom-logo" alt="Instituto Tomie Ohtake" itemprop="logo"></a>
	                	</div>
                	</div>
                </div>
                <!-- .site-branding -->

                <div class="header-right-wrapper">
                    <a href="#0" id="nav-toggle"><?php _e('Menu', 'coletivo'); ?><span></span></a>
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <ul class="coletivo-menu">
                            <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s')); ?>
                        </ul>
                    </nav>
                    <!-- #site-navigation -->
                </div>
            </div>
        </header><!-- #masthead -->
        <?php
    }
}
add_action( 'coletivo_site_header', 'coletivo_site_header' );