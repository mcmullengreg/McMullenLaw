<?php get_header(); ?>
<div class="container">
<div class="row">
	<div class="small-12 large-8 columns" role="main">

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php entryMeta(); ?>
			</header>

			<div class="entry-content">

			<?php if ( has_post_thumbnail() ): ?>
				<div class="row">
					<div class="column">
						<?php the_post_thumbnail('', array('class' => 'th')); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'mcmullen'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
		</article>
		<div class="row">
		<div class="small-2 columns">
		<?php echo get_avatar( get_the_author_meta('ID', 70)); ?>
		</div>
		<div class="small-10 columns">
		<div class="panel media profile">
			
			<div class="bio">
				<h4 class="title">
					<?php 
					if ( get_user_meta(get_the_author_meta('ID'), 'google', true) ){ ?>
						<a href="<?php echo get_user_meta(get_the_author_meta('ID'), 'google', true); ?>" target="_blank" rel="me">
							<?php printf( esc_attr__('About %s'), get_the_author() ); ?>
						</a>
					<?php } else { ?>
						<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author">
							<?php printf( esc_attr__('About %s'), get_the_author() ); ?>
						</a>
					<?php } ?>
				</h4>
				
				<p><?php if ( get_user_meta(get_the_author_meta('ID'), 'short-bio', true) ){
					
					
				} else {
					echo substr(get_user_meta(get_the_author_meta('ID'), 'description', true), 0, 298) . '...';
				}
				?></p>
			</div>
		</div>
		</div></div>
	<?php endwhile;?>
	
	</div>
	<?php get_sidebar(); ?>
</div>
</div>
<?php comments_template(); ?>
<?php get_footer(); ?>