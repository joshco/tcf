<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TCF_2016
 */

get_header(); ?>
<div class="main-container" id="middle">
	<div class="main width-container clearfix">
      
		<!-- _columns_2.html -->
		<div class="twocolumn-container clearfix">
		
		  <div class="left-column">

			<div class="content-pages-show-blog">
				
				<div class="blog">

		<?php
		if ( have_posts() ) : ?>
		
		<div id="page-nav" class="page-nav">
		  <ul class="breadcrumbs">
		    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> <span class="divider">/</span></li>
		    <li><a href="<?php $cat = get_the_category(); $cat = $cat[0]; echo esc_url(get_category_link( $cat ) ); ?>"><?php echo $cat->cat_name; ?></a></li>
		  </ul>
		</div>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-archive', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content-archive', 'none' );

		endif; ?>

		</div>
			</div>

		</div><!-- .left_column -->

<?php
get_sidebar();
?>
			</div>
          <!-- .twocolumn_container --> 
          
          <!-- /_columns_2.html --> 
          
        </div>
        <!-- .main --> 
      </div>
      <!-- .main-container --> 

<?php
get_footer();
