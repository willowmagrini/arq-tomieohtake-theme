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
							    
				    <?php while ( have_posts() ) : the_post(); ?>

				        <?php get_template_part( 'content', 'list' ); ?>
 
       				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content-inside -->
</div><!-- #content -->

<?php get_footer('contact'); ?>