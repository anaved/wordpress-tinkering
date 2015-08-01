<?php get_header(); ?>
<div class="<?php echo of_get_option('blog_sidebar_pos') ?>" id="main-content">
<div id="content" class="grid_8 <?php echo of_get_option('blog_sidebar_pos'); if (of_get_option('blog_sidebar_pos')=='left') { echo ' omega'; } else { echo ' alpha'; } ?>">
	<div class="inside">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
      <article>
        <h1><?php the_title(); ?></h1>
        <?php if(has_post_thumbnail()) {
					echo '<a href="'; the_permalink(); echo '">';
					echo '<figure class="featured-thumbnail"><span class="img-wrap">'; the_post_thumbnail(); echo '</span></figure>';
					echo '</a>';
					}
				?>
        <div id="page-content">
          <?php the_content(); ?>
          <div class="pagination">
            <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
          </div><!--.pagination-->
        </div><!--#pageContent -->
      </article>
    </div><!--#post-# .post-->

  <?php endwhile; ?>
	</div>
</div><!--#content-->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
