
		</div><!-- .hfeed -->

		<footer class="site-footer" role="contentinfo">

			<?php $options = get_option('chocolate_two_theme_options'); ?>

			<ul class="social-links">
				<li><a href="http://www.twitter.com/<?php echo $options["social_twitter"]; ?>" title="Follow on Twitter">Twitter</a></li>
				<li><a href="<?php echo $options["social_linkedin"]; ?>" title="Connect on LinkedIn">LinkedIn</a></li>
				<li><a href="http://www.instagram.com/<?php echo $options["social_instagram"]; ?>" title="Instagram">Instagram</a></li>
			</ul>

			<div class="container">
				<div class="copyright">
					<p><?php echo sprintf( __( '%1$s %2$s %3$s', 'chocolate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?>
				</div>
			</div>


		</footer><!-- .site-footer -->

		<?php wp_footer(); ?>


		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexnav.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>

	</body>
</html>