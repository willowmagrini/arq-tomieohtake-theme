<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coletivo
 */
 global $current_user;
 if (!is_user_logged_in()) {
   wp_redirect( get_home_url().'/cadastro-edicao-de-usuarios' );

 }
 elseif ($current_user->ID != $post->post_author)  {
		wp_redirect( get_home_url() );
	}
 acf_form_head();

 get_header('inscricao'); ?>


 	<div id="content" class="site-content">
 		<div id="content-inside" class="container no-sidebar">
      <h2>Inscrição</h2>
 			<div id="primary" class="content-area">
 				<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post();

        ?>
        <?php
          $categorias=get_the_category();
          echo '<h2>'.$categorias[0]->name.": </h2>";
         ?>

          <?php
					$post_id=get_the_ID();
          // echo $user_id;

					acf_form(array(
  					'post_id'		=> 'post_'.$post_id,
            'field_groups' => array(79),
  					'submit_value'		=> 'Atualizar',
            'html_after_fields' => '<input type="hidden" name="post_category" value="Inscrição EDP nas Artes"/>',
            'updated_message' => __("Cadastro atualizado!", 'acf'),


  				)); ?>


				<?php endwhile; // End of the loop. ?>

              <!-- <a class="btn-theme-primary link-voltar" href="<?php echo get_home_url() ?>/bza_inscricoes">Voltar para lista de inscrições</a> -->
        			</main><!-- #main -->
            </div><!-- #primary -->
      		</div><!--#content-inside -->
      	</div><!-- #content -->

      <?php get_footer(); ?>
