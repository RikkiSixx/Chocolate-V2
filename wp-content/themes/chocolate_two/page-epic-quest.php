<?php
/*
Template Name: Epic Quest Page
*/
?>
<?php get_header(); ?>

<section role="main">
	<div class="container">	
		<?php // Page content
			if (have_posts()) :
			while (have_posts()) : the_post(); ?>

				<h1><?php the_title( ); ?></h1>

				<?php the_content(); ?>

		<?php endwhile; endif; ?>
	</div>
	
	<section class="post-wrapper">

		<?php
			// Find 'Quest Level' posts 
			$args = array(
				'post_type' => array('quest-level'),			
				'posts_per_page' => 10
			);

			$projectPosts = get_posts( $args );

			foreach ( $projectPosts as $post ) : setup_postdata( $post ); 
		?>

		<article <?php post_class(); ?>>
			<header class="header cf">
				<h3 class="entry-title"><?php the_title(); ?></h3> <?php edit_post_link(); ?>
			</header>

			<section class="entry-content">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>' ) ); ?>
				
				<div class="entry-links">
					<?php wp_link_pages(); ?>
				</div>
			</section>

		</article>

		<?php endforeach; 
		wp_reset_postdata();?>

	</section>

</section>




<?php get_footer(); ?>