<?php get_header(); ?>

<?php get_template_part('parts/hero'); ?>

<div class="feature container">
	<div class="row">
			<?php if ( !dynamic_sidebar('homepage-features') ) : ?>
				<div class="small-12 columns">
					<h4 class="title">Congrats!</h4>
					<p>You have the option to put widgets here!</p>
				</div>
			<?php endif; ?>
	</div> <!-- row -->
</div><!-- container -->

<div class="main container">
	<div class="row">
		<div class="small-12 large-8 columns">
			<?php if ( have_posts() ) : ?>
	
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h1><?php the_title(); ?></h1>
					</header>
					<div class="entry-content">
						<?php the_content(__('Continue reading...', 'mcmullen')); ?>
					</div>
				</article> 
			<?php endwhile; ?>
	
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>	
		<?php endif;?>

		</div>
			<?php get_sidebar() ?>
	</div> <!-- row -->
</div><!-- container -->

<?php get_footer(); ?>