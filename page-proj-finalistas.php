<?php acf_form_head(); ?>
<?php
/**
 *Template Name: Projetos Finalistas
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package coletivo
 */
 // if (is_user_logged_in()) {
 // 	wp_redirect( get_home_url().'/cadastro-edicao-de-usuarios' );
 //
 // }
 if 	( !current_user_can( 'jurado' ) && !current_user_can( 'administrator' ) ){
 	wp_redirect( get_home_url());

 }
get_header('inscricao'); ?>

	<div id="content" class="site-content">
<?php if(has_post_thumbnail() && $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true )):?>
		<div class="page-fullheader">
		 <img src="<?php echo $img[0];?>"/>
		</div>
		<?php endif;?>
		<div id="content-inside" class="container no-sidebar">
			<div id="primary" class="content-area">
				<br />
				<h1 class="fullheader-title">
					Selecionados
				</h1>
				<main id="main" class="site-main" role="main">
					<div class="col-md-12" id="login-preliminar">
            <div class="candidatos">
  						<?php
              // add_user_meta( 212, 'perfil_completo', '1', true );
              // add_user_meta( 218, 'perfil_completo', 1, true );
              // add_post_meta( 356, 'inscricao_completa', 1, true );

			  $args = array(
				  'post_type'         => 'bza_inscricoes',
				  'posts_per_page'   => -1,
				  'tax_query' => array(
					  array(
						  'taxonomy' => 'category',
						  'field'    => 'name',
						  'terms'    => '2018',
					  ),
				  ),

			  );
				$args['meta_query']= array(
					array(
						'key' => 'finalista',
						'value' =>  true,

					)
				);
			  $posts = get_posts($args);
								// print_r($posts);
								if (!$posts) {
									echo "<h3>Nenhum projeto finalista</h3>";
								}
								else{
									foreach ($posts as $post) {

										// print_r($post->post_author);
										$user_id=$post->post_author;
										$user_nome = ( get_field('nome', 'user_'.$user_id) ) ? get_field('nome', 'user_'.$user_id) : 'Usuário não completou o cadastro.';

										?>
										<div id="<?php echo $user_id ?>" class="candidato">
											<a href="#" class="inscricao_ajax" data-user-id="<?php echo $user_id;?>" data-id="<?php echo $post->ID;?>">
												<?php echo $user_nome." - ". get_field('nome_do_projeto',  $post->ID ); ?>
											</a>
											<?php $checked = (1 == get_post_meta($post->ID, 'finalista', true)) ? 'checked' : '';?>
											<button data-id="<?php echo $user_id;?>" class="btn btn-theme-primary cadastro-finalista">DADOS ARQUITETO PROPONENTE</button>
											<button data-user-id="<?php echo $user_id;?>" data-id="<?php echo $post->ID;?>" class="btn btn-theme-primary inscricao-finalista">DADOS PROJETO</button>

											<?php $checked = (1 == get_post_meta($post->ID, 'finalista', true)) ? 'checked' : '';?>
											<input class="seleciona-candidato" type="checkbox" data-id="<?php echo $post->ID;?>" id="user_<?php echo $post->ID;?>"  value="1" <?php echo $checked ?>/>
											<label for="user_<?php echo $post->ID;?>">
											</label>
												<br>

											<?php
											// print_r($value->ID);
											// echo "mais uma<br>";
											?>
									</div>
									<?php
									}

								}
              ?>
            </div>
					</div>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!--#content-inside -->
	</div><!-- #content -->
  <div id="modal">
    <div id="modal-fundo">
      <div id="user-loading" data-state=""></div>
      <div id="modal-cadastro" data-state=""></div>
      <div id="modal-inscricao" data-state=""></div>
    </div>
  </div>
<?php get_footer(); ?>
