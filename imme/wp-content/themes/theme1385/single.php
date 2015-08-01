<?php get_header(); ?>
<div class="<?php echo of_get_option('blog_sidebar_pos') ?>" id="main-content">
<div id="content" class="grid_8 <?php echo of_get_option('blog_sidebar_pos'); if (of_get_option('blog_sidebar_pos')=='left') { echo ' omega'; } else { echo ' alpha'; } ?>">
	<div class="inside">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="single-post">
        <h2 class="post-title"><?php the_title(); ?></h2>
	   <div class="post-meta">
		   <div class="fleft">Submitted by <?php the_author_posts_link() ?> on <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('D, d/m/Y'); ?> - <?php the_time('g:i') ?></time></div>
		   <div class="fright"><?php comments_popup_link('0', '1', '%', 'comments-link', 'Comments are closed'); ?></div>
		 </div><!--.post-meta-->
        <?php $single_image_size = of_get_option('single_image_size'); ?>
				<?php if($single_image_size=='' || $single_image_size=='normal'){ ?>
          <?php if(has_post_thumbnail()) {
            echo '<figure class="featured-thumbnail">'; the_post_thumbnail(); echo '</figure>';
            }
          ?>
        <?php } else { ?>
          <?php if(has_post_thumbnail()) {
            echo '<figure class="featured-thumbnail large"><span class="f-thumb-wrap">'; the_post_thumbnail('post-thumbnail-xl'); echo '</span></figure>';
            }
          ?>
        <?php } ?>
        <div class="post-content">
          <?php the_content(); ?>
          <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
        </div><!--.post-content-->
      </article>

        

			<?php /* If a user fills out their bio info, it's included here */ ?>
      <div id="post-author">
        <h3>Written by <?php the_author_posts_link() ?></h3>
        <p class="gravatar"><?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '80' ); /* This avatar is the user's gravatar (http://gravatar.com) based on their administrative email address */  } ?></p>
        <div id="author-description">
          <?php the_author_meta('description') ?> 
          <div id="author-link">
            <p>View all posts by: <?php the_author_posts_link() ?></p>
          </div><!--#author-link-->
        </div><!--#author-description -->
      </div><!--#post-author-->

    </div><!-- #post-## -->
    
    
    <nav class="oldernewer">
      <div class="older">
        <?php previous_post_link('%link', '&laquo; Previous post') ?>
      </div><!--.older-->
      <div class="newer">
        <?php next_post_link('%link', 'Next Post &raquo;') ?>
      </div><!--.newer-->
    </nav><!--.oldernewer-->

    <?php comments_template( '', true ); ?>

  <?php endwhile; /* end loop */ ?>
	</div>
</div><!--#content-->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>