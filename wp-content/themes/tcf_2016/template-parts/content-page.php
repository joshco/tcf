<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TCF_2016
 */

?>

<?php the_title( '<h2 class="entry-title headline">', '</h2>' ); ?>

<div id="content">

  <div id="intro" class="intro">
    <div class="text-content entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
  </div>
</div>