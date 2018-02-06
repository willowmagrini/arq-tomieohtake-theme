<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package coletivo
 */

 	if (!is_user_logged_in()) {
 		wp_redirect( get_home_url().'/cadastro-edicao-de-usuarios' );

 	}
get_header(); ?>

	<div id="content" class="site-content">

		<div class="page-header">
			<div class="container">
				<h1 class="page-title">Inscrições</h1>
			</div><!-- container -->
		</div><!-- page-header -->

		<?php if ( function_exists( 'coletivo_breadcrumb' ) ) : ?>
			<?php echo coletivo_breadcrumb(); ?>
		<?php endif; ?>

		<div id="content-inside" class="container">
			<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>


						<article id="post-<?php the_ID(); ?>" <?php post_class( array('list-article', 'clearfix') ); ?>>

							<div class="list-article-thumb">
								<a href="<?php echo esc_url( get_permalink() ); ?>">

								</a>
							</div>
							<?php
								$post_meta=get_post_meta( get_the_id());
								$email = get_the_author_meta( 'user_email' );
								$nome = get_the_author_meta( 'user_email' );
								$user_id = get_the_author_meta( 'ID' );
								$user_meta=get_user_meta( $user_id);
								// print_r($post_meta['nome_do_projeto'][0]);
							?>

							<div class="list-article-content">
								<div class="list-article-meta">
									<?php
										$categorias=get_the_category();
										print_r( $categorias[0]->name);
									 ?>
								</div>
								<header class="entry-header">
									<p>E-mail: <?php echo $email;?></p>
									<p>Nome do Candidatos: <?php echo $user_meta['nome'][0];?></p>
									<p>Nome do projeto: <a href="<?php echo get_post_permalink( get_the_id() );?>"> <?php  echo $post_meta['nome_do_projeto'][0] ?></a>	</p>
								</header><!-- .entry-header -->
								<div class="entry-excerpt">
									<?php
										the_excerpt();
									?>
									<?php
										wp_link_pages( array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'coletivo' ),
											'after'  => '</div>',
										) );
									?>
								</div><!-- .entry-content -->
							</div>

						</article><!-- #post-## -->

					<?php endwhile; ?>

					<?php the_posts_navigation(); ?>

				<?php else : ?>


					<section class="no-results not-found">

						<h2><?php esc_html_e( 'Nenhuma inscrição.', 'coletivo' ); ?></h2>
						<div class="page-content">

								<p><?php esc_html_e( 'Você não está inscrito. Clique <a href="'.get_home_url().'/cadastro-edicao-de-usuarios">aqui para se inscrever</a>', 'coletivo' ); ?></p>

						</div><!-- .page-content -->
					</section><!-- .no-results -->

				<?php endif; ?>

			</main><!-- #main -->
		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
