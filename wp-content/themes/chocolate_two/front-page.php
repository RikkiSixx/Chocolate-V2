<?php get_header(); ?>

<section class="grid cf" role="main">
	
	<?php
		// Find posts in 'Projects' post type 
		$args = array(
			'post_type' => array('post', 'project'),			
			'posts_per_page' => 3
		);
		query_posts($args);

		if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('desk-one-third grid__item float--left'); ?> <?php if ( 'project' == get_post_type() ) : echo 'class="project" '; endif ?>>
		<header>
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1> 

			<?php edit_post_link(); ?>
		</header>

		<section>
			<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			<?php } ?>

			<?php the_excerpt(); ?>

			<div class="entry-links">
				<?php wp_link_pages(); ?>
			</div>
		</section>

		<footer class="cf">
			<?php the_tags( $before, $sep, $after ); ?> 
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more</a>
		</footer>

	</article>

	<?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>

</section><!-- .grid -->

<?php get_footer(); ?>