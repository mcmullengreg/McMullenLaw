	</section>

	<footer class="container">
		
		<?php if (!dynamic_sidebar( 'footer-widgets' )) : ?>
		<div class="row">
			<?php dynamic_sidebar( 'footer-widget' ); ?>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="small-12 columns">
				<hr />
			</div>
		</div>
		<div class="row">
			<div class="small-6 columns">
				<p class="text-left colophon">
				<?php if (get_theme_mod('advertisement_disclaimer')) : ?>
				<span class="uppercase advertisement-disclaimer"><?php echo get_theme_mod('advertisement_disclaimer'); ?></span>
				<?php endif; if (get_theme_mod('site_disclaimer_page')) :
					 echo ' | ';
				?>
				<span class="site-disclaimer"><a href="<?php echo get_permalink(get_theme_mod('site_disclaimer_page')); ?>">
				<?php if (!get_theme_mod('site_disclaimer_text')) {
						echo get_the_title(get_theme_mod('site_disclaimer_page'));
					 } else {
						echo get_theme_mod('site_disclaimer_text');
					 } ?>
				</a></span>
				<?php endif; ?>
				</p>
			</div>
			<div class="small-6 columns">
				<p class="text-right colophon">© <?php echo date('Y') . ' ' . get_bloginfo('name'); ?></p>
			</div>
	</footer>
	</div>

	<?php wp_footer(); ?>

</body>
</html>