<?php
/**
 * Template Name: 2-Column Page
 *
 * @package TCF_2016
 */

get_header(); ?>

<div class="page-header-container">
	<?php the_post_thumbnail(‘full’, array('class' => ‘header-image’)); ?>
	</div><!-- .page-header-container -->

<div class="main-container" id="middle">
	<div class="main width-container clearfix">

      
		<!-- _columns_2.html -->
		<div class="twocolumn-container clearfix">
		
		  <div class="left-column">

			<div class="content-pages-show-basic">

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