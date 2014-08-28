<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<div class="row collapse">
		<div class="large-12 small-8 columns">
			<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e('Search', 'mcmullen') ?>" />
		</div>
		<div class="small-4 hide-for-large columns">
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'mcmullen'); ?>" class="prefix button" />
		</div>
	</div>
</form>