<?php


	if (!is_user_logged_in()) {
		wp_redirect( get_home_url().'/cadastro-edicao-de-usuarios' );

	}

acf_form_head(); ?>
<?php
/**
 *Template Name: Inscicao
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package coletivo
 */

get_header('inscricao'); ?>

	<div id="content" class="site-content">
<?php if(has_post_thumbnail() && $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true )):?>
		<div class="page-fullheader">
		 <img src="<?php echo $img[0];?>"/>
		</div>
		<?php endif;?>
		<div id="content-inside" class="container no-sidebar">
		<?php the_title( '<h2 class="fullheader-title">', '</h2>' ); ?>
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
          <?php
					$user_id=get_current_user_id();

					acf_form(array(
  					'post_id'		=> 'new_post_'.$user_id,
            'field_groups' => array(79),

  					'new_post'		=> array(
  						'post_type'		=> 'bza_inscricoes',
  						'post_status'		=> 'publish'
  					),
  					'submit_value'		=> 'Inscrever'
  				)); ?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
