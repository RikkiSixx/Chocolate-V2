
		</div><!-- .hfeed -->

		<footer class="site-footer" role="contentinfo">

			<div class="container cf">

				<div class="lap-and-up-three-quarters foot-nav">
					<nav class="foot-menu" role="navigation">
						<?php wp_nav_menu( 
							array( 
								'menu_class' => 'nav',
								'theme_location' => 'foot-menu', 
								'container' => false								
							) 
						); ?>					
					</nav>
					
					<p>A website by Rik Kendell, Leeds-based developer &amp; designer, geek, foodie and bassist.</p>
					<p><?php echo sprintf( __( '%1$s %2$s %3$s', 'chocolate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?></p>
									
				</div><!-- .foot-nav -->
			
				<div class="copyright lap-and-up-one-quarter">
					<?php $options = get_option('chocolate_two_theme_options'); ?>
					<nav>
						<ul class="nav social-links lap-and-up-one-third">
							<li><a href="http://www.twitter.com/<?php echo $options["social_twitter"]; ?>" title="Follow on Twitter">Twitter</a></li>
							<li><a href="<?php echo $options["social_linkedin"]; ?>" title="Connect on LinkedIn">LinkedIn</a></li>
							<li><a href="http://www.instagram.com/<?php echo $options["social_instagram"]; ?>" title="Instagram">Instagram</a></li>
						</ul>
					</nav>
				</div>		
				
			</div>


		</footer><!-- .site-footer -->

		<?php wp_footer(); ?>


		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexnav.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>

	</body>
</html>