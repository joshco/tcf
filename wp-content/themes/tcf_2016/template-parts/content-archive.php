<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TCF_2016
 */

?>


    
    <div class="page-excerpt">
      <a href="<?php the_permalink(); ?>"><?php the_title( '<h3 class="entry-title">', '</h3>' );?></a>
      
      <?php
	      
	    if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php tcf_2016_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

      <div class="excerpt entry-content">
	    <?php the_post_thumbnail('large'); ?>
        <?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'tcf_2016' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tcf_2016' ),
				'after'  => '</div>',
			) );
		?>
        
      </div>

      
      
      <a href="#" class="get button small-button">Share</a>
    </div>

    <hr>
<!--
	<footer class="entry-footer">
		<?php tcf_2016_entry_footer(); ?>
	</footer>--><!-- .entry-footer -->


