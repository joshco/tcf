<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TCF_2016
 */

get_header(); ?>

<div class="main-container" id="middle">
	<div class="main width-container clearfix">
      
		<!-- _columns_2.html -->
		<div class="twocolumn-container clearfix">
		
		  <div class="left-column">

			<div class="content-pages-show-blog-post">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
/*
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
*/

		endwhile; // End of the loop.
		?>

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
