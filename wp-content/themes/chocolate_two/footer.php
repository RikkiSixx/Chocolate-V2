
		</div><!-- .hfeed -->

		<footer class="site-footer" role="contentinfo">

			<div class="container">
				<div class="copyright">
					<p><?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'chocolate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?>
				</div>
			</div>

		</footer><!-- .site-footer -->

		<?php wp_footer(); ?>


		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexnav.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>

	</body>
</html>