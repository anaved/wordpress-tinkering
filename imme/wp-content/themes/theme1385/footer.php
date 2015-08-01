	  </div><!--.container-->
    </div>  
</div><!--#main-->
<footer id="footer" class="container">
		<div class="container_12 clearfix">
			<div class="grid_12">
			<div id="widget-footer">
				<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?>
				<!--Widgetized Footer-->
			   <?php endif; ?>
			 </div>
       <div class="copyright"><?php $myfooter_text = of_get_option('footer_text'); ?>
          
				<?php if($myfooter_text){?>
          <?php echo of_get_option('footer_text'); ?>
        <?php } else { ?>
          <?php bloginfo('name'); ?> (c) <?php echo date('Y'); ?> &nbsp;|&nbsp; <a href="<?php bloginfo('url'); ?>/privacy-policy/" title="Privacy Policy">Privacy Policy</a>&nbsp;&nbsp;

        <?php } ?>
        <?php if( is_front_page() ) { ?>
        Designed by <a rel="nofollow" href="http://www.purplecube.in" target="_blank">PurpleCube.in</a>
        <?php } ?></div>
        
      </div>
		</div><!--.container-->
	</footer>
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work proporly -->
<?php if(of_get_option('ga_code')) { ?>
	<script type="text/javascript">
		<?php echo stripslashes(of_get_option('ga_code')); ?>
	</script>
  <!-- Show Google Analytics -->	
<?php } ?>
</body>
</html>