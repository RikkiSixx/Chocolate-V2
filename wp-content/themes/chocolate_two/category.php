<?php get_header(); ?>

<div class="post-listing container">
	<section class="cf" role="main">
		
		<header class="header">
			<h1 class="entry-title"><?php _e( 'Category Archives: ', 'chocolate' ); ?><?php single_cat_title(); ?></h1>
			<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
		</header>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="post-preview post-tile">
			<div class="tile-content">

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
					<span class="read-more"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more</a></span>
				</footer>	

			</div><!-- .tile-content -->
		</article><!-- .post-preview -->
		<?php endwhile; endif; ?>

		<?php get_template_part( 'nav', 'below' ); ?>

	</section>

</div><!-- .post-listing -->


<?php get_footer(); ?>