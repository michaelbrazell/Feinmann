<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _s
 * @since _s 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php the_title(); ?></title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<meta name="google-site-verification" content="DNhTdqcp8euTupZRQCOrnnIX4AtfdyCk4k0zDBEXGUM" />
<![endif]-->

  <!-- Google Fonts --> <link href='http://fonts.googleapis.com/css?family=Lato:300,400,400italic,300italic,700' rel='stylesheet' type='text/css'> <!-- End Google Fonts -->
<?php wp_head(); ?>
<!--[if IE]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style-ie8.css">
<![endif]-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/nick.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/jon.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/jcarousel/skin.css">


<style type="text/css">
    .hidden-fix {display:none;}
</style>
  <script type="text/javascript">
    jQuery('html').addClass('hidden-fix');
    jQuery(document).ready(function() {
      jQuery('html').show();
     });
   </script>

<script type="text/javascript">

jQuery(document).ready(function( $ ) {
	// Begin Cycle Commands
	$(function() {
	    $('.featured-image-container').cycle({
	        fx:     'none',
	        speed:  'fast',
	        timeout: 0,
	        pager:  '#cycle-pager',
			prev:   '#prev',
			next:   '#next',
			after:	onAfter,
	        pagerAnchorBuilder: function(idx, slide) {
	            return '<li><a href="#"><img src="' + slide.src + '" height="54px" width="70" /></a></li>';
	        }
	    });

		// unbind default behavior and rebind click to use new 'none2' effect
		$('#nav li').unbind().each(function(i,o) {
			$(this).click(function() {
				$('.featured-image-container').cycle(i,'none2');
				return false;
			});
		});

		function onAfter(curr, next, opts, fwd) {
			var index = opts.currSlide;
			// $('#prev,#prev2,#prev3,#prev4,#prev5')[index == 0 ? 'hide' : 'show']();
			// $('#next,#next2,#next3,#next4,#next5')[index == opts.slideCount - 1 ? 'hide' : 'show']();
			//get the height of the current slide
			var $ht = $(this).height();
			//set the container's height to that of the current slide
			$(this).parent().css({height: $ht});
		}

		$.fn.cycle.transitions.none2 = function($cont, $slides, opts) {
			var css = { top: 0, left: 0 }
			opts.fxFn = function(curr,next,opts,after){
				$.fn.cycle.commonReset(curr,next,opts,after);
				$([curr,next]).css(css);
				$(next).show();
				$(curr).hide();
				after();
			};
		}


	});
});
</script>

<script>

<? // Get sort order of project
$sort = get_post_meta($post->ID, 'sort', true);
$sort_fix = $sort-2;
?>

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        start: 1 <?php // echo $sort_fix; ?>
    });
});

</script>


</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="project-header">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="/wp-content/uploads/2013/03/logo-small.png" alt="Feinmann Inc" title="Feinman Inc"></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>


		<div class="project-view-menu hide-mobile">
		<!-- <?php project_select(); ?> -->
		<span class="project-view-menu-item project-view-menu-title">All Projects</span>
		<!-- Commenting this out by request, 6/26, MBM
		<span class="project-view-menu-item project-view-menu-title" >Sort Projects By</span>
		<span class="project-view-menu-item submenu-filter-project-1" id="all-projects">All</span>
		<span class="project-view-menu-item project-view-menu-text" >or</span>
		<span class="project-view-menu-item submenu-filter-project-1" id="awards">Awards</span>

		<!--
		<span id="spaces-menu-head-project">Spaces</span>
		<span id="styles-menu-head-project">Styles</span>

		<ul id="spaces-menu-project">
            <li class="submenu-filter-project" id="kitchen">Kitchen</li>
            <li class="submenu-filter-project" id="bath">Bath</li>
            <li class="submenu-filter-project" id="living">Living</li>
           Removing Specialty for now <li class="submenu-filter-project" id="specialty">Specialty</li>
            <li class="submenu-filter-project" id="exterior">Exterior</li>
        </ul>

        <ul id="styles-menu-project">
            <li class="submenu-filter-project" id="transitional">Transitional</li>
            <li class="submenu-filter-project" id="traditional">Traditional</li>
            <li class="submenu-filter-project" id="contemporary">Contemporary</li>
        </ul>-->

		</div>
		<div class="align-right">
		<a href="/projects/"> <span class="sidebar-button align-right">Close Project View</span></a>
		</div>
		</div>
	<?php project_carousel(); ?>
	</header><!-- #masthead .site-header -->
	<div id="main" class="site-main">
