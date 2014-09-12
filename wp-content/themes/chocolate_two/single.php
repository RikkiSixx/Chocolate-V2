<?php get_header(); ?>

<section class="post-wrapper container" role="main">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry' ); ?>
	
		<footer class="footer">
			<?php
				$image_source = get_post_meta_value('image-source');
	            $image_source_url = get_post_meta_value('image-source-url'); 

	            if ($image_source != '') { 
	        ?>
	        <p><em>Image source: <a href="<?php echo $image_source_url; ?>" title="<?php echo $image_source ?>"><?php echo $image_source ?></a></em></p>
	        <?php } ?>

	        <?php get_template_part( 'nav', 'below-single' ); ?>			
		</footer>

		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
	
</section>

<?php get_footer(); ?>