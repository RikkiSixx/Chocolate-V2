<?php
/*
Template Name: Blog Listing Page
*/
?>
<?php get_header(); ?>

<section class="post-listing" role="main">

	<?php
		// Find posts in 'Projects' post type 
		$args = array(
			'post_type' => array('post'),			
			'posts_per_page' => 6
		);
		query_posts($args);

		if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

	<article class="post-preview">
		<header>
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1> 
		</header>

		<section>				
			<div class="post-thumb">	
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php if ( has_post_thumbnail() ) { 
						the_post_thumbnail('thumbnail'); 
					} else { ?>
						<img src="<?php bloginfo('template_directory'); ?>/img/no-thumb.png" />
					<?php } ?>
				</a>
			</div>	

			<?php the_excerpt(); ?>

			<div class="entry-links">
				<?php wp_link_pages(); ?>
			</div>

			<?php edit_post_link(); ?>
		</section>

		<footer class="cf">
			<p><?php the_tags( $before, ', '. $after ); ?></p>
			<p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more</a></p>
		</footer>

	</article>

	<?php endwhile; // have_posts ?>

	<?php
		// Previous/next page navigation.
		chocolate_paging_nav(); 
	?>

	<?php endif; // have_posts ?>



	<?php wp_reset_query(); ?>

</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>