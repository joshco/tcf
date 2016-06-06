<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TCF_2016
 */

get_header(); ?>


	<!-- IMAGE SLIDER -- BEGIN -->
      <div class="fullwidth clearfix site-logo-wrap"> 
		  <?php 
    echo do_shortcode("[metaslider id=638]"); 
?>
	<div class="header-container clearfix">
		
		</div>
		<!-- fullwidth --> 
		
		<!-- IMAGE SLIDER -- END --> 
		
		<!-- MOBILE QUICK NAV - MOBILE HOMEPAGE ONLY -- BEGIN --> 
		
		<!-- _header-mobile-quicknav.html --> 
		<!--Mobile device only navigation -->
		
		<div id="mobile-quicknav-wrap" class="mobile-visible">
		  <div id="header-mobile-quick-nav" role="navigation" class="width-container mobile-visible">
		    <div class="row-fluid">
		      <?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
		    </div>
		    <!-- row fluid - end --> 
		  </div>
		  <!-- header-mobile-quick-nav - end --> 
		</div>
		<!-- mobile-quicknav-wrap - end --> 
		<!-- /_header-mobile-quicknav.html --> 
		
		<!-- MOBILE QUICK NAV - MOBILE HOMEPAGE ONLY -- END --> 
		
		<!-- NEW MEMBER SIGNUP - HOMEPAGE ONLY - YELLOW BAR -- BEGIN -->
		
		<div id="home_yellow_bar"  class="mobile-visible">
		<div id="home_signup_container">
			<!-- TODO This probably doesn't work, have to figure out how to get this to NB -->
		
		
		<!-- NEW MEMBER SIGNUP - YELLOW BAR -- END --> 
		
		<!-- HOMEPAGE - MEDIA BAR - START --> 
		
		<!-- _homepage_media_bar.html -->
		<div class="clearfix"></div>
		<div id="home-media-bar">
		  <div id="home-media-bar-container" class="desktop-visible">
		    <div id="home-media-bar-header"> The Tyler Clementi Foundation in the media <a href="<?php echo esc_url(get_category_link( get_cat_ID( 'Press' ) ) ); ?>">View all ></a> </div>
		    
		    <ul id="home-media-bar-logos">
		          
		        <?php
			    query_posts('cat=7'); // just press category
			    
				if ( have_posts() ) :
		
					if ( is_home() && ! is_front_page() ) : ?>
					
						
		
					<?php
					endif;
		
					/* Start the Loop */
					while ( have_posts() ) : the_post();
		
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content-press', get_post_format() );
		
					endwhile;
		
					//the_posts_navigation();
		
				else :
		
					get_template_part( 'template-parts/content-press', 'none' );
		
				endif; ?>
		          </ul>
		  </div>
		  <!-- Media Bar - Container --> 
		</div>
		<!-- Media Bar - END --> 
		<!-- /_homepage_media_bar.html --> 
		
		<!-- HOMEPAGE - MEDIA BAR - END --> 
		
		<!-- .width-container --> 
		
		</div>
		<!-- .header-container -->
		
		<div class="main-container" id="middle">
		<div class="main width-container clearfix"> 
		  
		  <!-- _columns_2.html -->
		  <div class="twocolumn-container clearfix">
		    <div class="left-column">
		      <div id="flash_container"> </div>
		      <div class="content-pages-show-basic"> 
		        
		        <!-- _breadcrumbs.html --> 
		        
		        <!-- /_breadcrumbs.html -->
		        
		        <h2 class="headline">Welcome to the Tyler Clementi Foundation</h2>
		        <div id="content">
		          <div class="mobile-visible"></div>
		          <div id="intro" class="intro">
		            <div class="text-content">
		              <h2 class="frontpage_title"><a href="<?php echo esc_url(get_category_link( get_cat_ID( 'News' ) ) ); ?>">Upstander News</a></h2>
		              <a href="<?php echo esc_url(get_category_link( get_cat_ID( 'News' ) ) ); ?>">See All News ></a> </div>
		          </div>
		          
		          
		          <ul class="homepage_excerpt-list">
		          
		        <?php
			    query_posts('tag=featured');
			    
				if ( have_posts() ) :
		
					if ( is_home() && ! is_front_page() ) : ?>
					
						
		
					<?php
					endif;
		
					/* Start the Loop */
					while ( have_posts() ) : the_post();
		
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content-index', get_post_format() );
		
					endwhile;
		
					//the_posts_navigation();
		
				else :
		
					get_template_part( 'template-parts/content-index', 'none' );
		
				endif; ?>
		          </ul>

		         
		        </div>
		      </div>
		    </div>
		    <!-- .left_column -->



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
