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
		<div id="content-inside" class="container no-sidebar">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
			<div class="container">
				<?php the_title( '<h2 class="fullheader-title">', '</h2>' ); ?>
			</div>
			<div class="container">
				<?php if(has_post_thumbnail() && $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large', true )):?>
					<img src="<?php echo $img[0];?>"/>
				<?php endif;?>
			</div>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php endwhile; // End of the loop. ?>

				<div class="container">
				<h2 class="fullheader-title">PREMIADOS</h2>
			<?php $premiado_1 = get_field('premiado_1'); ?>
			<?php // $premiado_1 = wp_get_attachment_image_src( $premiado_1 ); ?>
				<img src="<?php echo $premiado_1; ?>" alt="<?php the_title(); ?>" class="img">
				</div>
				<hr />


			<?php if ( $selecionados = get_field('selecionados') ): ?>
				<div class="container">
					<h2 class="fullheader-title">FINALISTAS</h2>
					<p class="lead position"><?php the_field('selecionados'); ?></p>
				</div>
				<hr />
			<?php endif; ?>
			<?php if ( $juri = get_field('juri') ): ?>
				<div class="container">
					<h2 class="fullheader-title">MEMBROS DO JÚRI</h2>
					<p class="lead position"><?php the_field('juri'); ?></p>
				</div>
				<hr />
			<?php endif; ?>
			<?php if ( $premiacoes = get_field('premiacoes') ): ?>
				<div class="container">
					<h2 class="fullheader-title">PREMIAÇÕES</h2>
					<p class="lead position"><?php the_field('premiacoes'); ?></p>
				</div>
			<?php endif; ?>
				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!--#content-inside -->
	</div><!-- #content -->
<?php get_footer(); ?>
