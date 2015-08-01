<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>
<div class="clearfix">
  <div class="grid_12">
  	<?php if ( ! dynamic_sidebar( 'Home Area' ) ) : ?>
				<!--Widgetized Home Page-->
			   <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>