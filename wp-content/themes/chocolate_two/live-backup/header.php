<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width" />

		<title><?php wp_title( ' | ', true, 'right' ); ?></title>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />

		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/libs/modernizr-2.6.1.min.js"></script>
	
		<?php wp_head(); ?>

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-12505531-1', 'auto');
			ga('send', 'pageview');
		</script>

	</head>

	<body <?php body_class(); ?>>	

		<header class="site-header" role="banner" style="background-image: url('<?php header_image(); ?>');">
			
			<div class="nav-bar cf">
				<nav class="main-menu" role="navigation">
					<div class="menu-button">Menu</div>
					<?php wp_nav_menu( 
						array( 
							'theme_location' => 'main-menu', 
							'container' => false,
							'menu_class' => 'nav flexnav'
						) 
					); ?>					
				</nav>
			</div><!-- .nav-bar -->

			<section class="branding text--center">				 

				<?php if ( is_front_page() ) { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/header-rik.jpg" class="motif" alt="Rik Kendell" />
				<?php } ?>
				
				<h1>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'chocolate' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				</h1>

				<?php bloginfo( 'description' ); ?>
			</section>

			
		</header><!-- .site-header -->

		<div class="hfeed">