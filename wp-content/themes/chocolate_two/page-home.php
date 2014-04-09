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
					<h1 class="equal-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h1> 
				</header>

				<section class="equal-height">	
					<?php the_excerpt(); ?>
				</section>	

				<footer class="cf">					

					<span class="read-more" style="float:right;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more</a></span>

					<?php edit_post_link(); ?>
				</footer>			
			</div><!-- .tile-content -->

			

		</article>

		<?php endwhile; endif; ?>

		<?php wp_reset_query(); ?>

	</section><!-- .grid -->

</div><!-- .container -->

<section class="about-me">
	<div class="container cf">
		<div class="about-content desk-two-thirds">
			<?php the_content(); ?>
		</div>
		<div class="about-img desk-one-third">
			<?php if ( has_post_thumbnail() ) { 
				the_post_thumbnail('about-thumb'); 
			} else { ?>
				<img src="<?php bloginfo('template_directory'); ?>/img/no-thumb.png" />
			<?php } ?>
		</div>				
	</div>
</section>

<?php get_footer(); ?>