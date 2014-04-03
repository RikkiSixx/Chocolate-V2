<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />

		<title><?php wp_title( ' | ', true, 'right' ); ?></title>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>	

		<header class="site-header" role="banner" 
		style="background-image: url('<?php header_image(); ?>');">
			
			<nav class="main-menu" role="navigation">					
				<?php wp_nav_menu( 
					array( 
						'theme_location' => 'main-menu', 
						'container' => false,
						'menu_class' => 'nav'
					) 
				); ?>					
			</nav>

			<section class="branding text--center">
				<img src="<?php echo get_template_directory_uri(); ?>/img/motif.png" class="motif" alt="Rik Kendell" />
				
				<h1>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'chocolate' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				</h1>

				<?php bloginfo( 'description' ); ?>
			</section>

			
		</header><!-- .site-header -->

		<div class="hfeed">