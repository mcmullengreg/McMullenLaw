<div class="top-bar-container contain-to-grid">
    <nav class="top-bar" data-topbar="">
        <ul class="title-area">
            <li class="name show-for-small-only">
            	<?php 
            		if ( is_home() || is_front_page()) { 
					echo '<h1 class="title"><a href="' . get_bloginfo('url') . '">' . get_bloginfo('name') . '</a></h1>'; 
				} else {
					echo '<h4 class="title"><a href="' . get_bloginfo('url') . '">' . get_bloginfo('name') . '</a></h4>';
				}
			?>
            </li>
            <li class="toggle-topbar menu-icon"><a href="<?php echo get_bloginfo('home'); ?>"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
            <?php topBarL(); ?>
            <ul class="right hide-for-small">
            	<li class="has-dropdown">
            		<a href="#!" id="showSearch">Search</a>
            	</li>
            </ul>
        </section>
    </nav>
</div>
<div class="navSearch">
	<?php get_search_form(); ?>
</div>
<?php breadcrumb(); ?>