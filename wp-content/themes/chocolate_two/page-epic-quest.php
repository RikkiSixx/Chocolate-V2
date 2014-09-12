<?php
/*
Template Name: Epic Quest Page
*/
?>
<?php get_header(); ?>

<section role="main" class="page-quest">
	<div class="container">
		<?php // Page content
			if (have_posts()) :
			while (have_posts()) : the_post(); ?>

				<h1><?php the_title( ); ?></h1>
				<?php the_content(); ?>

		<?php endwhile; endif; ?>
	</div>	

	<?php
		// Find 'Quest Level' posts 
		$args = array(
			'post_type' => array('quest-level'),			
			'posts_per_page' => 10
		);

		$projectPosts = get_posts( $args );

		foreach ( $projectPosts as $post ) : setup_postdata( $post ); 
	?>

		<article class="quest-item">
			<?php $thumbUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

			<header class="quest-banner header cf" <?php if (has_post_thumbnail()) { echo 'style="background-image: url('. $thumbUrl .');" '; } ?>>
				<div class="container">
					<h2 class="entry-title"><?php the_title(); ?></h2> 	

					<?php edit_post_link(); ?>					
				</div>
			</header>

			<section class="entry-content container">
				<?php the_content(); ?>

				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>' ) ); ?>
				
				<div class="entry-links">
					<?php wp_link_pages(); ?>
				</div>						

				<?php
					$image_source = get_post_meta_value('image-source');
		            $image_source_url = get_post_meta_value('image-source-url'); 

		            if ($image_source != '') { 
		        ?>
		        <p><em>Image source: <a href="<?php echo $image_source_url; ?>" title="<?php echo $image_source ?>"><?php echo $image_source ?></a></em></p>
		        <?php } ?>

		    </section>

		</article>

	<?php endforeach; 
	wp_reset_postdata();?>

</section>

<?php get_footer(); ?>