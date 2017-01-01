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
<title><?php
if ( is_post_type_archive( 'projects' ) ) {
	echo 'Project Gallery';
} else {
	the_title();
}
?>
</title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
  <!-- Google Fonts --> <link href='http://fonts.googleapis.com/css?family=Lato:300,400,400italic,300italic,700' rel='stylesheet' type='text/css'> <!-- End Google Fonts -->
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/nick.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/jon.css">
<!--[if IE]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style-ie8.css">
<![endif]-->
<meta name="google-site-verification" content="DNhTdqcp8euTupZRQCOrnnIX4AtfdyCk4k0zDBEXGUM" />
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php contact_widget(); ?>
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
	<div class="slidedeck-header">



	<?php
		/* Custom Slidedeck in header code
		   This pulls in the SlideDeck shortcode defined in each page/post
		   If no SlideDeck is defined, it displays the default
		*/
		$slidedeck_shortcode = get_post_meta($post->ID, 'slidedeck_shortcode', true);
		if($slidedeck_shortcode != '') {
			?> <?php echo do_shortcode($slidedeck_shortcode); ?> <?php
		}
		else {
			?> <?php echo do_shortcode('[SlideDeck2 id=857 ress=1 proportional=false]'); ?> <?php
		}
		?>

	<!-- Slidedeck short code-->

		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="/wp-content/uploads/2016/10/feinmann-logo-2016-resized.png" alt="Feinmann Inc" title="Feinman Inc"></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<!-- Start CTA area -->
		<div class="call-to-action"><div class="cta-container">
		<?php
		/* Custom CTA Area
		   This pulls in two fields, cta_text and cta_button
		   And styles them to appear in the header
		   This wil display the default wording of "Creating Smart, Beautiful Spaces" if blank
		*/
		$cta_text = get_post_meta($post->ID, 'cta_text', true);
		$cta_button = get_post_meta($post->ID, 'cta_button', true);
		$cta_link = get_post_meta($post->ID, 'cta_link', true);
		if($cta_text !='') {
			?><p class="cta-text"><?php echo $cta_text; ?></p><?php
		}
		else {
			?><p class="cta-text">View Our Award Winning Renovations</p><?php
		}
		if($cta_button !='') {
			?><a href="<?php echo $cta_link; ?>" class="cta-link"><span class="cta-button"><?php echo $cta_button; ?></span></a><?php
		}
		else {
			?><a href="/gallery/awards/" class="cta-link"><span class="cta-button">View Awards</span></a><?php
		}
		?>
		</div>
		<!-- End CTA area -->
		</div>
	</div>

		<nav role="navigation" class="site-navigation main-navigation">
			<h1 class="assistive-text"><?php _e( 'Menu', '_s' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', '_s' ); ?>"><?php _e( 'Skip to content', '_s' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

		</nav>
		<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div><!-- .site-navigation .main-navigation -->
	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main">
