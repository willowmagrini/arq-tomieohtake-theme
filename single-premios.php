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
				<?php the_title( '<h2 class="fullheader-title">', '</h2>' ); ?>
			<div class="container">
				<?php if(has_post_thumbnail() && $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large', true )):?>
					<img src="<?php echo $img[0];?>"/>
				<?php endif;?>
				<?php while ( have_posts() ) : the_post(); ?>
					<br /><br />
					<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php endwhile; // End of the loop. ?>
			</div>
		<hr />
	    <h2 class="fullheader-title">PREMIADOS</h2>
	<div class="container">
        <div class="row">
        	<?php if ( $premiado_1 = get_field('premiado_1') ): ?>
                <div class="feature-item col-lg-4 col-sm-6">
                    <div class="feature-media">
			<?php $premiado_1 = get_field('premiado_1'); ?>
			<?php $img_premiado_1 = wp_get_attachment_link( $premiado_1, 'coletivo-square', true); ?>
				<?php echo $img_premiado_1; ?></a>
                    </div>
                    <h3>1º Lugar - <?php the_field('nome_premiado_1'); ?></h3>
                    <div><?php the_field('desc_premiado_1'); ?></div>
                </div>
            <?php endif; ?>
            <?php if ( $premiado_2 = get_field('premiado_2') ): ?>
                <div class="feature-item col-lg-4 col-sm-6">
                    <div class="feature-media">
			<?php $premiado_2 = get_field('premiado_2'); ?>
			<?php $img_premiado_2 = wp_get_attachment_link( $premiado_2, 'coletivo-square', true); ?>
				<?php echo $img_premiado_2; ?>
                    </div>
                    <h3>2º Lugar - <?php the_field('nome_premiado_2'); ?></h3>
                    <div><?php the_field('desc_premiado_2'); ?></div>
                </div>
                <?php endif; ?>
                <?php if ( $premiado_3 = get_field('premiado_3') ): ?>
                <div class="feature-item col-lg-4 col-sm-6">
                    <div class="feature-media">
			<?php $premiado_3 = get_field('premiado_3'); ?>
			<?php $img_premiado_3 = wp_get_attachment_link( $premiado_3, 'coletivo-square', true); ?>
				<?php echo $img_premiado_3; ?>
                    </div>
                    <h3>3º Lugar - <?php the_field('nome_premiado_3'); ?></h3>
                    <div><?php the_field('desc_premiado_3'); ?></div>
            	</div>
            	<?php endif; ?>
        </div>
	</div>
		<br />
			<?php if ( $mencao_honrosa = get_field('mencao_honrosa') ): ?>
			<hr />
			<h2 class="fullheader-title">MENÇÃO HONROSA</h2>
		<div class="container">
	        <div class="row">
					<div class="feature-item col-lg-4 col-sm-6">
						<div class="feature-media">
					<?php $mencao_honrosa = get_field('mencao_honrosa'); ?>
					<?php $img_mencao_honrosa = wp_get_attachment_link( $mencao_honrosa, 'coletivo-square', true); ?>
					<?php echo $img_mencao_honrosa;?>
		                </div>
		                    <h3 style="text-align: center;"><?php the_field('nome_mencao_honrosa'); ?></h3>
		                    <div><?php the_field('desc_mencao_honrosa'); ?></div>
		            </div>
					<div class="feature-item col-lg-4 col-sm-6">
					<?php if ( $mencao_honrosa_2 = get_field('mencao_honrosa_2') ): ?>
						<div class="feature-media">
					<?php $mencao_honrosa_2 = get_field('mencao_honrosa_2'); ?>
					<?php $img_mencao_honrosa_2 = wp_get_attachment_link( $mencao_honrosa_2, 'coletivo-square', true); ?>
					<?php echo $img_mencao_honrosa_2;?>
		                </div>
		                    <h3 style="text-align: center;"><?php the_field('nome_mencao_honrosa_2'); ?></h3>
		                    <div><?php the_field('desc_mencao_honrosa_2'); ?></div>
		            <?php endif; ?>
		            </div>
		            <div class="feature-item col-lg-4 col-sm-6"></div>
	        </div>
        </div>
	        <br />
			<?php endif; ?>
				<?php if ( $selecionados = get_field('selecionados') ): ?>
				<hr />
				<h2 class="fullheader-title">SELECIONADOS</h2>
					<div class="container">
						<?php $selecionados = get_post_meta( get_the_ID(), 'selecionados', true );?>
						<?php if ( $selecionados && ! empty( explode( ',', $selecionados ) ) ) :?>
							<?php $value = '<div id="gallery">[gallery ids="%s" type="square"]</div>';?>
							<?php $value = sprintf( $value, $selecionados );?>
							<?php echo apply_filters( 'the_content', $value );?>
						<?php endif;?>
					</div>
				<?php endif; ?>
				<?php if ( $juri = get_field('juri') ): ?>
				<hr />
				<h2 class="fullheader-title">MEMBROS DO JÚRI</h2>
					<div class="container">
						<div><?php the_field('juri'); ?></div>
					</div>
				<?php endif; ?>
				<?php if ( $premiacoes = get_field('premiacoes') ): ?>
				<hr />
				<h2 class="fullheader-title">PREMIAÇÕES</h2>
					<div class="container">
						<div><?php the_field('premiacoes'); ?></div>
					</div>
				<?php endif; ?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!--#content-inside -->
</div><!-- #content -->
<?php get_footer(); ?>
