<aside class="sidebar desk-one-quarter" role="complementary">

	<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>

		<?php
			// Find posts
			$args = array(
				'post_type' => array('post'),			
				'posts_per_page' => 3
			);
			query_posts($args);

			if ( have_posts() ) {
		?>
		<div>
			<h3>Latest Posts</h3>
			<ul>
				<?php while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>

		</div>
		<?php } ?>
		
		<?php wp_reset_query(); ?>

	<?php endif; ?>

</aside><!-- .sidebar -->