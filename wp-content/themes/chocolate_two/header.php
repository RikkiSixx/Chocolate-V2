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

		<header class="site-header" role="banner">
			<div class="cf">
				<nav class="main-menu" role="navigation">					
					<?php wp_nav_menu( 
						array( 
							'theme_location' => 'main-menu', 
							'container' => false,
							'menu_class' => 'nav'
						) 
					); ?>					
				</nav>

				<div class="search">
					<?php get_search_form(); ?>
				</div>
			</div>

			<!--<img src="<?php header_image(); ?>" width="100%" height="auto" alt="">-->

			<section id="branding" class="text--center island">
				<div id="site-title"><?php if ( ! is_singular() ) { echo '<h1>'; } ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'chocolate' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
					<?php if ( ! is_singular() ) { echo '</h1>'; } ?>
				</div>
				<div id="site-description">
					<?php bloginfo( 'description' ); ?>
				</div>
			</section>

			
		</header><!-- .site-header -->

		<div class="wrapper hfeed">

			<div class="container cf">