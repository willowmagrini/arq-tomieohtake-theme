<?php
/**
 *
 * @package OnePress
 */

get_header(); ?>
<div id="content" class="section-padding">
	<div class="container">
		<header class="entry-header">
			<div class="col-lg-6 col-sm-9">
				<h2 class="fullheader-title">
						Edições Anteriores do Prêmio
				</h2>
				<br />
			</div>
		</header>
        <div class="section-content">
			<div class="row">
					
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
						<div class="feature-item col-lg-4 col-sm-6">
							<div class="feature-media">
									<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail('coletivo-blog-small'); ?>
									</a>
							</div><!-- .feature-media -->
								<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>	
						</div><!-- .feature-item -->
						<?php
							// Fim do Loop
							endwhile;
						}
						?>
			</div><!-- .row -->
		</div><!-- .section-content -->
	</div><!-- .container -->
</div><!-- #content -->

<?php get_footer(); ?>