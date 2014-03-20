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
		query_posts($args);

		if ( have_posts() ) : while ( have_posts() ) : the_post();
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

	<?php if ( ! post_password_required() ) comments_template( '', true ); ?>


	<?php endwhile; // have_posts ?>

	<?php
		// Previous/next page navigation.
		chocolate_paging_nav(); 
	?>

	<?php endif; // have_posts ?>

</section>


<?php get_sidebar(); ?>

<?php get_footer(); ?>