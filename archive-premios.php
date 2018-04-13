<?php
/**
 *
 * @package OnePress
 */

get_header(); ?>

<div id="content" class="site-content">
	<div id="content-inside" class="container no-sidebar">
		<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<h2 class="fullheader-title">
						Edições Anteriores do Prêmio
					</h2>
					<br />
							    
				    
						<?php
							/* $paged é a variável para paginação do Loop CPT Prêmios */	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

							/* $args_loop_cpt_prêmios são os argumentos para o Loop */
							$args_loop_cpt_premios = array(
							'post_type' => 'premios',
							'orderby' => 'date',
							'order' => 'DESC',
							'posts_per_page' => '4',
							'paged' => $paged
							);
							$loop_cpt_premios = new WP_Query( $args_loop_cpt_premios ); if ( $loop_cpt_premios->have_posts() ) {
							while ( $loop_cpt_premios->have_posts() ) : $loop_cpt_premios->the_post();
						?>
							
						<div class="list-article">

							<div class="list-article-thumb">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('list-article-thumb'); ?></a>
							</div><!-- .list-article-thumb -->
						
							<div class="rodape-cada-projeto">
								<h3><a class="titulo-resumo" href="<?php the_permalink(); ?>"><?php the_title(); ?><br />						
								<!-- <span class="data-cada-post">METADADO</span> -->
							</div><!-- .rodape-cada-projeto -->
						</div><!-- .list-article -->

						<?php
							// Fim do Loop
							endwhile;
						}
						?>


			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content-inside -->
</div><!-- #content -->

<?php get_footer(); ?>