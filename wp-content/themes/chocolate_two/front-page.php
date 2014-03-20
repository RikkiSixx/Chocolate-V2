<?php get_header(); ?>

<section class="grid cf" role="main">
	
	<?php
		// Find posts in 'Projects' post type 
		$args = array(
			'post_type' => array('post'/*, 'project'*/),			
			'posts_per_page' => 3
		);
		query_posts($args);

		if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

	<article <?php post_class('grid__item desk-one-third post-tile'); ?> <?php if ( 'project' == get_post_type() ) : echo 'class="project" '; endif ?>>

		<div class="container tile-content">
			<header>
				<h1>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h1> 
			</header>

			<section>	
				<div class="post-thumb" style="margin: auto; overflow: hidden; height: 150px; width: 150px; border-radius: 75px;">	
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
				<?php the_tags( $before, $sep, $after ); ?> 
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more</a>
			</footer>
		</div>

	</article>

	<?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>

</section><!-- .grid -->

<?php get_footer(); ?>