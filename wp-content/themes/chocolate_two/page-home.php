<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<header class="site-header" role="banner" style="background-image: url('<?php header_image(); ?>');">
	<section class="branding">						
			<img src="<?php echo get_template_directory_uri(); ?>/img/header-rik.jpg" class="motif" alt="Rik Kendell" />					
		<h1>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'chocolate' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
		</h1>

		<?php bloginfo( 'description' ); ?>
	</section>				
</header><!-- .site-header -->

<div class="container">

	<section class="recent-posts grid cf" role="main">
		
		<?php
			// Find posts 
			$args = array(
				'post_type' => array('post'/*, 'project'*/),			
				'posts_per_page' => 3
			);
			query_posts($args);

			if ( have_posts() ) : while ( have_posts() ) : the_post();
		?>

		<article <?php post_class('grid__item desk-one-third post-tile'); ?> <?php // if ( 'project' == get_post_type() ) : echo 'class="project" '; endif ?>>

			<div class="container tile-content">

				<?php edit_post_link(); ?>

				<header>
					<div class="post-thumb">	
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php if( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail('post-thumb'); ?>
							<?php else : ?>							
							<img src="<?php bloginfo('template_directory'); ?>/img/no-thumb.png" />	
							<?php endif; ?>						
						</a>
					</div>
					<h1 class="equal-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h1> 
				</header>

				<section class="equal-height">	
					<?php the_excerpt(); ?>
				</section>	

				<footer class="cf">	
					<span class="read-more" style="float:right;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read more</a></span>
				</footer>			
			</div><!-- .tile-content -->			

		</article>

		<?php endwhile; endif; ?>

		<?php wp_reset_query(); ?>

	</section><!-- .grid -->

</div><!-- .container -->

<section class="about-me">
	<div class="container cf">
		<div class="about-content lap-three-quarters desk-two-thirds">
			<?php the_content(); ?>

			<a href="mailto:rik.kendell@gmail.com" class="btn btn--themed">Get in touch</a>
		</div>
		<div class="about-img lap-one-quarter desk-one-third">
			<?php if ( has_post_thumbnail() ) { 
				the_post_thumbnail('about-thumb'); 
			} else { ?>
				<img src="<?php bloginfo('template_directory'); ?>/img/no-thumb.png" />
			<?php } ?>
		</div>				
	</div>
</section>

<?php get_footer(); ?>