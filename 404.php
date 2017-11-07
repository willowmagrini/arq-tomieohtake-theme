<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package coletivo
 */

get_header(); ?>
	<div id="content" class="site-content">

		<div class="page-header">
			<div class="container">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'coletivo' ); ?></h1>
			</div><!-- container -->
		</div><!-- page-header -->

		<div id="content-inside" class="container right-sidebar">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<section class="error-404 not-found">

						<div class="page-content">
							<p><?php esc_html_e( 'Acho que você está na página errada...', 'coletivo' ); ?></p>


						</div><!-- .page-content -->
					</section><!-- .error-404 -->

				</main><!-- #main -->
			</div><!-- #primary -->


		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
