<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _s
 * @since _s 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<!-- .entry-header -->
	<?php
					/* This pulls in the custom lead in text field in posts & pages
					   If this field is blank it does not display anything
					*/
					
					$lead_in_text = get_post_meta($post->ID, 'lead_in_text', true); 
					if($lead_in_text != '') {
							?> <div class="lead-in-text"><?php echo  $lead_in_text; ?></div><?php
					}
					
					// end special lead in text
	?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', '_s' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', '_s' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
