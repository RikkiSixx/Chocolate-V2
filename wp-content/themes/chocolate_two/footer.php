
		</div><!-- .hfeed -->

		<footer class="site-footer" role="contentinfo">

			<div class="container">
				<div id="copyright">
				<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'chocolate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo sprintf( __( ' Theme By: %1$s.', 'chocolate' ), '<a href="http://www.rikkendell.co.uk/">Rik Kendell</a>' ); ?>
				</div>
			</div>

		</footer><!-- .site-footer -->

		<?php wp_footer(); ?>


		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexnav.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>

	</body>
</html>