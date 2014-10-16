<footer class="entry-footer cf">

	<span class="cat-links"><?php _e( 'Categories: ', 'chocolate' ); ?><?php the_category( ', ' ); ?></span>

	<?php if ( comments_open() ) { 
		echo '<span class="comments-link"><a href="' . get_comments_link() . '">' . sprintf( __( 'Comments', 'chocolate' ) ) . '</a></span>';
	} ?>
</footer> 