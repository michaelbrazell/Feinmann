<?php

/* Template Name: Gallery List View Page */

/**
 * This is a custom page for displaying the project details
 * It uses a default header, loses the footer, and changes the sidebar
 *
 */

get_header(); ?>

		<div id="primary-project" class="content-area">
			<div id="content" class="site-content-project" role="main">

				<?php gallery(); ?>

				<?php feinmann_affiliates(); ?>
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar('gallery'); ?>
<?php get_footer(); ?>
