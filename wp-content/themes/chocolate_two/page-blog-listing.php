<?php
/*
Template Name: Blog Listing Page
*/
?>
<?php get_header(); ?>

<section role="main">

	<?php
		// Find posts in 'Projects' post type 
		$args = array(
			'post_type' => array('post'),			
			'posts_per_page' => 6
		);
		query_posts($args);

		if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php if ( 'project' == get_post_type() ) : echo 'class="project" '; endif ?>>
		<header>
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1> 
		</header>

		<section>					
			<?php the_excerpt(); ?>

			<div class="entry-links">
				<?php wp_link_pages(); ?>
			</div>

			<?php edit_post_link(); ?>
		</section>

		<footer class="cf">
			<?php the_tags( $before, $sep, $after ); ?> 
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more</a>
		</footer>

	</article>

	<?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>

</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>