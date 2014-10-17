<?php
/*
Template Name: Projects Page
*/
?>
<?php get_header(); ?>

<section role="main">

	<?php
		// Find posts in 'Projects' post type 
		$args = array(
			'post_type' => array('project'),			
			'posts_per_page' => 6
		);

		$projectPosts = get_posts( $args );

		foreach ( $projectPosts as $post ) : setup_postdata( $post ); 
	?>

	<article <?php post_class(); ?>>
		<header class="header">
			<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
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


<?php get_sidebar(); ?>

<?php get_footer(); ?>