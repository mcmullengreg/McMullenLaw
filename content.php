<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php if (!is_search()) entryMeta(); ?>
	</header>
	<div class="entry-content">
		<?php 
		if ( is_search() && has_excerpt()  ) {
			the_excerpt();
		} else {
			the_content(__('Continue reading...', 'mcmullen'));
		}
		?>
	</div>
	<footer>
		<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
	<hr />
</article> 