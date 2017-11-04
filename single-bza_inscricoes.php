<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coletivo
 */

get_header(); ?>


  <div id="content" class="site-content">

    <div class="page-header">
      <div class="container">
        <h1 class="page-title">Inscrição</h1>
      </div><!-- container -->
    </div><!-- page-header -->

    <?php if ( function_exists( 'coletivo_breadcrumb' ) ) : ?>
      <?php echo coletivo_breadcrumb(); ?>
    <?php endif; ?>

    <div id="content-inside" class="container">
      <main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post();

        ?>
        <?php
          $categorias=get_the_category();
          echo '<h2>'.$categorias[0]->name.": </h2>";
         ?>

          <?php
					$user_id=get_the_ID();
          // echo $user_id;

					acf_form(array(
  					'post_id'		=> $user_id,
            'field_groups' => array(79),

  					'new_post'		=> array(
  						'post_type'		=> 'bza_inscricoes',
  						'post_status'		=> 'publish'
  					),
  					'submit_value'		=> 'Atualizar',
            'html_after_fields' => '<input type="hidden" name="post_category" value="Inscrição EDP nas Artes"/>',

  				)); ?>


				<?php endwhile; // End of the loop. ?>

              <a class="btn-theme-primary link-voltar" href="<?php echo get_home_url() ?>/bza_inscricoes">Voltar para lista de inscrições</a>
        			</main><!-- #main -->
        		</div><!--#content-inside -->
        	</div><!-- #content -->

        <?php get_footer(); ?>
