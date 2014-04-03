<?php get_header(); ?>

<div class="container">

	<section class="recent-posts grid cf" role="main">
		
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

</div><!-- .container -->

<section class="about-me">
	<div class="container">
		<h2>Sub-Title</h2>
		<p>Bacon ipsum dolor sit amet bresaola prosciutto beef ex. Shank ground round porchetta laborum pork belly kielbasa aute t-bone boudin in. Jowl ex spare ribs leberkas ad officia eu proident et salami pancetta qui. Consectetur in ex, aliquip commodo tri-tip short ribs sed brisket in non officia. Laborum swine ground round brisket. Corned beef short ribs biltong, commodo id meatball consequat dolore jerky ullamco fatback leberkas pork loin frankfurter ad. Aute meatloaf tail flank biltong porchetta pig dolore eiusmod prosciutto velit.</p>
	</div>
</section>

<?php get_footer(); ?>