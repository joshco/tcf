<?php
/**
 * Template Name: 1-Column Page
 *
 * @package TCF_2016
 */

get_header(); ?>

<div class="main-container" id="middle">
	<div class="main width-container clearfix">
      
		<!-- _columns_2.html -->
		<div class="onecolumn-container clearfix">
		
		  <div class="content-pages-show-basic-wide">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			
			</div>
		</div>
		<!-- /onecolumn-container -->
          
        </div>
        <!-- .main --> 
      </div>
      <!-- .main-container --> 

<?php
get_footer();
