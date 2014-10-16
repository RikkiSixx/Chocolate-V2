<?php get_header(); ?>

<?php $thumbUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<header class="site-header" 
	<?php if (has_post_thumbnail()) { ?> 
		style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>)" 
	<?php } else { ?>
		style="background-image: url('<?php header_image(); ?>');"
	<?php } ?> 
role="banner">

	<section class="branding">
		<h1><?php the_title(); ?></h1>

	</section>				
</header><!-- .site-header -->
			
<section class="post-wrapper container" role="main">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry' ); ?>
	
		<footer class="footer">
			<?php
				$image_source = get_post_meta_value('image-source');
	            $image_source_url = get_post_meta_value('image-source-url'); 

	            if ($image_source != '') { 
	        ?>
	        <p><em>Image credit: <a href="<?php echo $image_source_url; ?>" title="<?php echo $image_source ?>"><?php echo $image_source ?></a></em></p>
	        <?php } ?>

	        <?php get_template_part( 'nav', 'below-single' ); ?>			
		</footer>

		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
	
</section>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>