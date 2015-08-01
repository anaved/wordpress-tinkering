<?php
/**
 * Template Name: Portfolio 1 column
 */

get_header(); ?>

<div id="main-content">
<div id="content" class="grid_12 alpha omega">
	<div class="inside alt">
		<?php include_once (TEMPLATEPATH . '/title.php');?>   
  <?php global $more;	$more = 0;?>
  <?php $values = get_post_custom_values("category-include"); $cat=$values[0];  ?>
  <?php $catinclude = 'portfolio_category='. $cat ;?>
  
  <?php $temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query(); ?>
  <?php $wp_query->query("post_type=portfolio&". $catinclude ."&paged=".$paged.'&showposts=5'); ?>
  <?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'theme1385' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'theme1385' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>
<div id="gallery" class="one_column">
  <ul class="portfolio">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php
      $custom = get_post_custom($post->ID);
      $lightbox = $custom["lightbox-url"][0];
      
    ?>
    
      <li>
				<div class="clearfix">
        	<?php if($lightbox!=""){ ?>
          <a class="image-wrap" href="<?php echo $lightbox;?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>"><?php the_post_thumbnail( 'portfolio-post-thumbnail-xl' ); ?><span class="zoom-icon"></span></a>
        <?php }else{ ?>
          <a class="image-wrap" href="<?php the_permalink() ?>" title="<?php _e('Permanent Link to', 'theme1385');?> <?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'portfolio-post-thumbnail-xl' ); ?></a>
          <?php } ?>
          <div class="folio-desc">
            <header>
              <h3><a href="<?php the_permalink(); ?>"><?php $title = the_title('','',FALSE); echo substr($title, 0, 40); ?></a></h3>
            </header>
            <p class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,32);?></p>
            <a href="<?php the_permalink(); ?>" class="button">Read more</a>
          </div>
        </div>
      </li>
    
  
    <?php endwhile; ?>
  </ul>
  <div class="clear"></div>
</div>





<?php if(function_exists('wp_pagenavi')) : ?>
	<?php wp_pagenavi(); ?>
<?php else : ?>
  <?php if ( $wp_query->max_num_pages > 1 ) : ?>
    <nav class="oldernewer">
      <div class="older">
        <?php next_posts_link('&laquo; Older Entries') ?>
      </div><!--.older-->
      <div class="newer">
        <?php previous_posts_link('Newer Entries &raquo;') ?>
      </div><!--.newer-->
    </nav><!--.oldernewer-->
  <?php endif; ?>
<?php endif; ?>
<!-- Page navigation -->

<?php $wp_query = null; $wp_query = $temp;?>
	</div>
</div><!-- #content -->
</div>
<!-- end #main -->
<?php get_footer(); ?>