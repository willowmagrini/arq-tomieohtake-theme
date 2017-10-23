<?php
/**
 * Tomie Ohtake functions and definitions.
 *
 */

// Altera a função do footer, originalmente no arquivo inc/template-tags.php

if ( ! function_exists( 'onepress_footer_site_info' ) ) {
    /**
     * Add Copyright and Credit text to footer
     * @since 1.1.3
     */
    function onepress_footer_site_info()
    {
        ?>
        <?php $onepress_footer_text = get_theme_mod( 'onepress_footer_text', esc_html__('Few Rights Reserved', 'onepress') );?>
        <?php $onepress_footer_text_link = get_theme_mod( 'onepress_footer_text_link' );?>
        <?php if ( $onepress_footer_text_link != '' ) echo '<a href="' . esc_html( $onepress_footer_text_link) . '" alt="" target="_blank">'; ?>
        <?php if ( $onepress_footer_text != '' ) echo '<div class="container">' . esc_html( $onepress_footer_text) . '</div>'; ?>
        <?php if ( $onepress_footer_text_link != '' ) echo '</a>'; ?>

        <?php printf(esc_html__('%2$s %1$s', 'onepress'), esc_attr(date('Y')), esc_attr(get_bloginfo())); ?>
        <span class="sep"> &ndash; </span>
        <?php printf(esc_html__('Desenvolvido pela %1$s com %2$s', 'onepress'), '<a class="logo-brasa" href="' . esc_url('http://brasa.art.br', 'onepress') . '">Brasa</a>', '<a class="logo-wp" href="' . esc_url('https://br.wordpress.org', 'onepress') . '"><i class="fa fa-wordpress" aria-hidden="true"></i></a>'); ?>
        <?php
    }
}
add_action( 'onepress_footer_site_info', 'onepress_footer_site_info' );
