<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php if ( is_category() ) {
		echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo ' Archive | '; bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
	} elseif ( is_home() || is_front_page() ) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo 'Error 404 Not Found | '; bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title( ' | ', false, right ); bloginfo( 'name' );
	} ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Kristi' rel='stylesheet' type='text/css'>
	<!-- The HTML5 Shim is required for older browsers, mainly older versions IE -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  <!--[if lt IE 7]>
    <div style=' clear: both; text-align:center; position: relative;'>
    	<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
    </div>
  <![endif]-->
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/normalize.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/prettyPhoto.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/grid.css" />
  <!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/ie_style.css" />
	<![endif]-->
  <!--[if IE 9]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/ie9_style.css" />
	<![endif]-->
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
  <!--[if lt IE 9]>
  <style type="text/css">
    .banner-button, .box-button, #main-content, .top-box, .searching, .widget_nav_menu .menu li a, .searching, #post-author, li.comment .comment-body, #commentform input[type=text], #commentform #submit {
      behavior:url(<?php bloginfo('stylesheet_directory'); ?>/PIE.php)
      }
  </style>
  <![endif]-->
  
  <script type="text/javascript">
  	// initialise plugins
		jQuery(function(){
			// main navigation init
			jQuery("ul.sf-menu").supersubs({ 
				  minWidth:    12,   
				  maxWidth:    127,  
				  extraWidth:  1     
			}).superfish();  
			jQuery('ul.sf-menu').superfish({
				delay:       <?php echo of_get_option('sf_delay'); ?>, 		// one second delay on mouseout 
				animation:   {opacity:'<?php echo of_get_option('sf_f_animation'); ?>',height:'<?php echo of_get_option('sf_sl_animation'); ?>'}, // fade-in and slide-down animation 
				speed:       '<?php echo of_get_option('sf_speed'); ?>',  // faster animation speed 
				autoArrows:  <?php echo of_get_option('sf_arrows'); ?>,   // generation of arrow mark-up (for submenu) 
				dropShadows: false   // drop shadows (for submenu)
			});
			
			// prettyphoto init
			jQuery("a[rel^='prettyPhoto']").prettyPhoto({
				animation_speed:'normal',
				slideshow:5000,
				autoplay_slideshow: false
			});
			
			// easyTooltip init
			jQuery("a.tooltip, .social-networks li a").easyTooltip();
			
			// zoom icon
			/*jQuery(".zoom-icon").css("opacity","0");
			
			jQuery(".image-wrap").hover(function(){
				jQuery(this).find(".zoom-icon").stop().animate({opacity:"1"}, "medium");
			},function(){
				jQuery(this).find(".zoom-icon").stop().animate({opacity:"0"}, "medium");
			});*/
			
		});
		
		// Init for audiojs
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});
  </script>
  <?php if (is_front_page()) { ?>
	  <script type="text/javascript">
		jQuery(document).ready(function(){
		   //  Initialize Backgound Stretcher	   
			jQuery(document).bgStretcher({
				images: ['<?php $background = of_get_option('body_background'); if ($background['image']=="") { echo bloginfo('template_url').'/images/body-home-bg.jpg'; } else { echo $background['image']; } ?>'],
				imageWidth: <?php echo (of_get_option('body_image_w')); ?>, imageHeight: <?php echo (of_get_option('body_image_h')); ?>
			});
		});
	  </script>
  <?php } else { ?>
  	<script type="text/javascript">
		jQuery(document).ready(function(){
		   //  Initialize Backgound Stretcher	   
			jQuery(document).bgStretcher({
				images: ['<?php bloginfo('template_url'); ?>/images/body-bg.jpg'],
				imageWidth: 1920, imageHeight: 1024
			});
		});
	  </script>
  <?php } ?>
  <!-- Custom CSS -->
	<?php if(of_get_option('custom_css') != ''){?>
  <style type="text/css">
  	<?php echo of_get_option('custom_css' ) ?>
  </style>
  <?php }?>
  
  
  
  
  <style type="text/css">
		/* Body styling options */
		<?php $background = of_get_option('body_background');
			if ($background != '') {
				if ($background['image'] != '') {
					echo 'body { background-image:url('.$background['image']. '); background-repeat:'.$background['repeat'].'; background-position:'.$background['position'].';  background-attachment:'.$background['attachment'].'; }';
				}
				if($background['color'] != '') {
					echo 'body { background-color:'.$background['color']. '}';
				}
			};
		?>
		
  	/* Header styling options */
		<?php $header_styling = of_get_option('header_color'); 
			if($header_styling != '') {
				echo '#header {background-color:'.$header_styling.'}';
			}
		?>
		
		/* Links and buttons color */
		<?php $links_styling = of_get_option('links_color'); 
			if($links_styling) {
				echo 'a{color:'.$links_styling.'}';
				echo '.button {background:'.$links_styling.'}';
			}
		?>
		
		/* Body typography */
		<?php $body_typography = of_get_option('body_typography'); 
			if($body_typography) {
				echo 'body {font-family:'.$body_typography['face'].'; color:'.$body_typography['color'].'}';
				echo '.container {font-size:'.$body_typography['size'].'; font-style:'.$body_typography['style'].';}';
			}
		?>
  </style>
</head>

<body <?php body_class(); ?>>

<div id="main"><!-- this encompasses the entire Web site -->
	<header id="header" class="container">
		<div class="container_12 clearfix">
			<div class="grid_12">
      	<div class="logo">
          
          <?php if(of_get_option('logo_type') == 'text_logo'){?>
          
          	<?php if( is_front_page() || is_home() || is_404() ) { ?>
              <h1><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php } else { ?>
              <h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
            <?php } ?>
            
          <?php } else { ?>
          
          	<?php if(of_get_option('logo_url') != ''){ ?>
            	<a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php echo of_get_option('logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
            <?php } else { ?>
            	<a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
            <?php } ?>
            
          <?php }?>
          <p class="description"><?php bloginfo('description'); ?></p>
        </div>
	   <?php if ( of_get_option('g_search_box_id') == 'yes') { ?>  
          <div id="top-search">
            <form method="get" action="<?php echo get_option('home'); ?>/">
              <input type="text" name="s"  class="input-search"/><input type="submit" value="" id="submit">
            </form>
          </div>  
        <?php } ?>
        <nav class="primary">
          <?php wp_nav_menu( array(
            'container'       => 'ul', 
            'menu_class'      => 'sf-menu', 
            'menu_id'         => 'topnav',
            'depth'           => 0,
            'theme_location' => 'header_menu',
		  'link_before' => '<span class="left"><span class="right"><span class="middle">', 
		  'link_after' => '</span></span></span>'
            )); 
          ?>
        </nav><!--.primary-->
        
      </div>
		</div><!--.container-->
	</header>
  <?php if (!is_front_page()) { ?>
			<div id="widget_my_requestquotewidget_wrap">
				<div class="container_12 container clearfix">
					<div class="grid_12 alpha omega">
						<?php if ( ! dynamic_sidebar( 'Before Content Area' ) ) : ?>
						 <!--Widgetized 'Before Content Area'-->
					    <?php endif; ?>
					</div>
				</div>
			</div>
		<?php } ?>	
  <div class="container indent-bottom">
	<div class="container_12 primary_content_wrap clearfix">		