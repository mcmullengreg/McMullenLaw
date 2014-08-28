<?php /* Template Name: Author Template */

get_header(); ?>
<?php
// Get all users order by amount of posts
$allUsers = get_users('orderby=post_count&order=DESC');

$users = array();

// Remove subscribers from the list as they won't write any articles
foreach($allUsers as $currentUser)
{
	if(!in_array( 'administrator', $currentUser->roles ) && !in_array( 'subscriber', $currentUser->roles))
	{
		$users[] = $currentUser;
	}
}

?>

<?php get_header(); ?>

<section class="content container author" role="main">
	<div class="row">
		<div class="small-12 large-8 columns">
			<?php while (have_posts()) : the_post(); ?>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile;?>

	<?php
		foreach($users as $user)
		{
			?>
			<div class="row container">
				<div class="small-12">
				<div class="authorAvatar">
					<?php echo get_avatar( $user->user_email, '150' ); ?>
				</div>
				<div class="authorInfo">
					<h2 class="authorName"><?php echo $user->display_name; ?></h2>
					<p class="authorDescrption"><?php echo substr(get_user_meta($user->ID, 'description', true), 0, 250). '...'; ?>
					
					<p><a href="<?php echo get_author_posts_url($user->ID) ?>"><?php echo $user->first_name; ?>'s Full Profile</a></p>
					
					<div class="row">
					<?php $specialty =get_user_meta($user->ID, 'specialty', 'Area(s) of Expertise');
						if ( $specialty != "" ) {
							$specialty = explode( ',', $specialty );
							echo '<div class="small-6 columns">';
							echo '<h4 class="subheader">Area(s) of Expertise</h4>';
							echo '<ul>';
								for ( $i=0; $i < sizeof($specialty); $i++ ) {
									echo '<li>' . $specialty[$i] . '</li>';
								}
							echo '</ul>';
							echo '</div>';
						}
					?>
					<div class="socialIcons small-6 columns">
						<?php 
							$website = $user->user_url;
							$twitter = get_user_meta($user->ID, 'twitter', true);
							$facebook = get_user_meta($user->ID, 'facebook', true);
							$google = get_user_meta($user->ID, 'google', true);
							$linkedin = get_user_meta($user->ID, 'linkedin', true);
							
							if ( $website || $twitter || $facebook || $google || $linkedin ) :
						?>
						<h4 class="subheader">Ways to Connect</h4>
						<ul>
							<?php
								
								if($user->user_url != '')
								{
									printf('<li><a href="%s">%s</a></li>', $user->user_url, 'Website');
								}

								
								if($twitter != '')
								{
									printf('<li><a href="%s" target="_blank">%s</a></li>', $twitter, 'Twitter');
								}

								
								if($facebook != '')
								{
									printf('<li><a href="%s" target="_blank">%s</a></li>', $facebook, 'Facebook');
								}

								if($google != '')
								{
									printf('<li><a href="%s" target="_blank">%s</a></li>', $google, 'Google');
								}
								
								if($linkedin != '')
								{
									printf('<li><a href="%s" target="_blank">%s</a></li>', $linkedin, 'LinkedIn');
								}
							endif;
							?>
						</ul>
					</div>
					</div>
				</div>
			</div></div>
			<?php
		}
	?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php get_footer(); ?>