<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<div class="container">

	<section class="recent-posts grid cf" role="main">
		
		<?php
			// Find posts 
			$args = array(
				'post_type' => array('post'/*, 'project'*/),			
				'posts_per_page' => 3
			);
			query_posts($args);

			if ( have_posts() ) : while ( have_posts() ) : the_post();
		?>

		<article <?php post_class('grid__item desk-one-third post-tile'); ?> <?php if ( 'project' == get_post_type() ) : echo 'class="project" '; endif ?>>

			<div class="container tile-content">
				<div class="equal-height">
					<header>
						<div class="post-thumb">	
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php if ( has_post_thumbnail() ) { 
									the_post_thumbnail('thumbnail'); 
								} else { ?>
									<img src="<?php bloginfo('template_directory'); ?>/img/no-thumb.png" />
								<?php } ?>
							</a>
						</div>
						<h1>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h1> 
					</header>

					<section>	
						<?php the_excerpt(); ?>

						<div class="entry-links">
							<?php wp_link_pages(); ?>
						</div>

					</section>	
				</div><!-- .equal-height -->

				<footer class="cf">
					<span><?php the_tags( $before, $sep, $after ); ?></span>

					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more</a>

					<span><?php edit_post_link(); ?></span>
				</footer>			
			</div><!-- .tile-content -->

			

		</article>

		<?php endwhile; endif; ?>

		<?php wp_reset_query(); ?>

	</section><!-- .grid -->

</div><!-- .container -->

<section class="about-me">
	<div class="container">		
		<?php the_content(); ?>
	</div>
</section>

<?php get_footer(); ?>