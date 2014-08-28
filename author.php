<?php get_header(); ?>
<div class="author container">
	<div class="row">
		<div class="small-12 large-8 columns" role="main">
			<?php 
				$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
				$avatar = get_avatar($curauth->user_email, 200);
			?>
			
			<h1>About <?php echo $curauth->display_name; ?></h1>
			<?php echo $avatar; ?>
			
			<?php echo $curauth->user_description; ?>
				
			<?php // The Loop (ONLY if have posts) 
				if ( have_posts() ) : ?>
				
					<h4 class="subheader">Posts by <?php echo $curauth->display_name; ?></h4>
					<ul>
					<?php while ( have_posts() ) : the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php the_title(); ?>
							</a>
						</li>
											
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>