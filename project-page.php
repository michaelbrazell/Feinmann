<?php

/* Template Name: Project Detail Page */

/**
 * This is a custom page for displaying the project details
 * It uses a default header, loses the footer, and changes the sidebar
 *
 */

get_header('project'); ?>

		<div id="primary-project" class="content-area">
			<div id="content" class="site-content-project" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( 'content', 'project' ); ?>

					<?php comments_template( '', true ); ?>
					

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar('project'); ?>
<?php get_footer(); ?>