<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TCF_2016
 */

?>

<div id="page-nav" class="page-nav">
  <ul class="breadcrumbs">
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> <span class="divider">/</span></li>
    
    
    
    <li><a href="<?php $cat = get_the_category(); $cat = $cat[0]; echo esc_url(get_category_link( $cat ) ); ?>"><?php echo $cat->cat_name; ?></a></li>
    
    
    
  </ul>
</div>

<div class="headline">

	<?php the_title( '<h2 class="entry-title">', '</h2>' );

		if ( 'post' === get_post_type() ) : ?>
		<?php the_subheading( '<h3 class="entry-subhed">', '</h3>' ); ?>
		<div class="entry-meta">
			<?php tcf_2016_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
</div>

	<div class="entry-content excerpt">
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
	</div><!-- .entry-content -->

<!--
	<footer class="entry-footer">
		<?php tcf_2016_entry_footer(); ?>
	</footer>--><!-- .entry-footer -->
