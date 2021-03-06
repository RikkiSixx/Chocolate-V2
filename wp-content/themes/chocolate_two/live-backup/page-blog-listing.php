<?php
/*
Template Name: Blog Listing Page
*/
?>
<?php get_header(); ?>

<div class="post-listing container">

	<section class="cf" role="main">

		<?php
			// Find posts in 'Projects' post type 
			$args = array(
				'post_type' => array('post'),			
				'posts_per_page' => 6
			);

			$blogPosts = get_posts( $args );

			foreach ( $blogPosts as $post ) : setup_postdata( $post ); 
		?>

		<article class="post-preview">

			<?php edit_post_link(); ?>

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
			</section>

			<footer class="cf">	
				<span class="tags"><?php the_tags( 'Tags: ', ', '. $after ); ?></span>
				<span class="read-more" style="float:right;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more</a></span>
			</footer>	

		</article><!-- .post-preview -->

		<?php endforeach; 
		wp_reset_postdata();?>

	</section>

</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>