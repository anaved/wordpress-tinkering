<?php
// =============================== My Banners widget ======================================
class MY_BannersWidget extends WP_Widget {
    /** constructor */
    function MY_BannersWidget() {
        parent::WP_Widget(false, $name = 'My - Banners');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
				$limit = apply_filters('widget_limit', $instance['limit']);
				$count = apply_filters('widget_count', $instance['count']);
				$linktext = apply_filters('widget_linktext', $instance['linktext']);
        ?>
              <?php echo $before_widget; ?>
                 	    
				  
				    <div class="banners_cycle" id="banners-cycle">
						<?php $limittext = $limit;?>
						<?php global $more;	$more = 0; $counter=1;?>
						<?php query_posts("posts_per_page=".$count."&post_type=banners");?>
						<?php while (have_posts()) : the_post(); ?>	
						<?php 
							$custom = get_post_custom($post->ID);
							$bannertitle = $custom["banner-title"][0];
							$buttonurl = $custom["button-url"][0];
						?>
						<div class="banners_item banners_item_<?php echo $counter; ?>">
							<span class="banner-title"><div class="title-text"><?php echo $bannertitle; ?></div></span>
							<div class="description">
								<div class="inside">
									<h1><?php the_title(); ?></h1>
									<p><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,$limit);?></p>
									
									<?php if ($buttonurl=="") { ?>
											<a href="<?php the_permalink(); ?>" class="banner-button"><?php if ($linktext=="") { echo 'Read more'; } else { echo $linktext; } ?></a>
									<?php } else { ?>	
										<a href="<?php echo $buttonurl; ?>" class="banner-button"><?php if ($linktext=="") { echo 'Read more'; } else { echo $linktext; } ?></a>
									<?php } ?>
									
								</div>
							</div>
						</div>
						<?php $counter++; endwhile; ?>
						<?php wp_reset_query(); ?>
					</div>
				    		
							
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
			$limit = esc_attr($instance['limit']);
			$category = esc_attr($instance['category']);
			$count = esc_attr($instance['count']);
			$linktext = esc_attr($instance['linktext']);
    ?>
     

      <p><label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Limit Text:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label></p>
      <p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Posts per page:'); ?><input class="widefat" style="width:30px; display:block; text-align:center" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>
	 <p><label for="<?php echo $this->get_field_id('linktext'); ?>"><?php _e('Link Text:', 'theme1385'); ?> <input class="widefat" id="<?php echo $this->get_field_id('linktext'); ?>" name="<?php echo $this->get_field_name('linktext'); ?>" type="text" value="<?php echo $linktext; ?>" /></label></p>
			 
       
      <?php 
    }

} // class Cycle Widget


?>