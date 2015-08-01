<div class="banners_cycle" id="banners-cycle">
	<?php $limittext = $limit;?>
	<?php global $more;	$more = 0; $counter=1;?>
	<?php query_posts("posts_per_page=4&post_type=banners");?>
	<?php while (have_posts()) : the_post(); ?>	
	<?php 
		$custom = get_post_custom($post->ID);
		$bannertitle = $custom["banner-title"][0];
	?>
	<div class="banners_item banners_item_<?php echo $counter; ?>">
		<span class="banner-title"><?php echo $bannertitle; ?></span>
		<span class="description">
			<?php the_title(); ?>
		</span>
	</div>
	<?php $counter++; endwhile; ?>
	<?php wp_reset_query(); ?>
</div>