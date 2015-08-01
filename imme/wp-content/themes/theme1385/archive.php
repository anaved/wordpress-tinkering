<?php get_header(); ?>
<div class="<?php echo of_get_option('blog_sidebar_pos') ?>" id="main-content">
	<div id="content" class="grid_8 <?php echo of_get_option('blog_sidebar_pos'); if (of_get_option('blog_sidebar_pos')=='left') { echo ' omega'; } else { echo ' alpha'; } ?>">
	  <div class="inside">
	  	<h1>
	    <?php if ( is_day() ) : /* if the daily archive is loaded */ ?>
		 <?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
	    <?php elseif ( is_month() ) : /* if the montly archive is loaded */ ?>
		 <?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date('F Y') ); ?>
	    <?php elseif ( is_year() ) : /* if the yearly archive is loaded */ ?>
		 <?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date('Y') ); ?>
	    <?php else : /* if anything else is loaded, ex. if the tags or categories template is missing this page will load */ ?>
		 Blog Archives
	    <?php endif; ?>
	  </h1>
	
	  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		 <h2 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		 <div class="post-meta">
		   <div class="fleft">Submitted by <?php the_author_posts_link() ?> on <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('D, d/m/Y'); ?> - <?php the_time('g:i') ?></time></div>
		   <div class="fright"><?php comments_popup_link('0', '1', '%', 'comments-link', 'Comments are closed'); ?></div>
		 </div><!--.post-meta-->
		 <?php if ( has_post_thumbnail()) { ?>
		 	<?php echo '<figure class="featured-thumbnail">'; the_post_thumbnail(); echo '</figure>'; ?>
		<?php } ?>	
		 
		 <div class="post-content extra-wrap">
		   <div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,33);?></div>
		   <a href="<?php the_permalink() ?>" class="button">Read more</a>
		 </div>
	    </article>
	    
	  <?php endwhile; else: ?>
	    <div class="no-results">
		 <p><strong>There has been an error.</strong></p>
		 <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
		 <?php get_search_form(); ?> <!-- outputs the default Wordpress search form-->
	    </div><!--noResults-->
	  <?php endif; ?>
	    
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
	  </div>	  
	</div><!--#content-->
	<?php get_sidebar(); ?>
</div>	
<?php get_footer(); ?>