<?php
/**
 * The template used for displaying individual project content used in project-page.php
 *
 * @package _s
 * @since _s 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
	
	<?php
					// pull in custom lead in text
					$lead_in_text = get_post_meta($post->ID, 'lead_in_text', true); 
					if($lead_in_text != '') {
							?> <div class="lead-in-text"><?php echo  $lead_in_text; ?></div><?php
					}
					
					// end special lead in text
	?>
	
	<header class="project-header-mobile hide-desktop">

			<?php project_select(); ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php
					// Show gallery thumbnails
					$gallery_image = get_post_meta($post->ID, 'gallery_image.guid', false); ?>
					<?php foreach($gallery_image as $gallery_image) {
					?> <img src="<?php echo $gallery_image; ?>" class=""width="100%" alt="<?php the_title(); ?>"> <?php
					} ?>
			
	</header>
					
					
					
	<div class="entry-content project-content">
		<div class="slideshow hide-mobile">			
		<!-- Previous and Next Arrows being removed as we cull this decision, MBM 7/11/13
		<div id="prevnext"><a id="prev" class="sidebar-button" href="">Prev</a><a id="next" class="sidebar-button" href="">Next</a></div>-->
		<div class="featured-image-container">
		<?php
		
		/* Removing this because now using a static image and foobox controls gallery
		
		$gallery_image = get_post_meta($post->ID, 'gallery_image.guid', false); ?>
		<?php foreach($gallery_image as $gallery_image) {
		?> <img src="<?php echo $gallery_image; ?>" class="featured-image hide-mobile" id="largeImage" alt="<?php the_title(); ?>"><?php
		} 
		*/
		
		
		// pull in featured image
		$featured_image = get_post_meta($post->ID, 'featured_image.guid', true);
		if($featured_image != '') {
		?><div class="featured-image-container "><img src="<?php echo $featured_image; ?>" class="featured-image hide-mobile" alt="<?php the_title(); ?>"></div><?php
		}
		?>

		</div>
		</div>
		
		
		<div class="project-content-bg"><div class="project-content-interior">

		<?php 
		// pull in storyline title
		$storyline = get_post_meta($post->ID, 'storyline_title', true);
		if($storyline != '') {
			?>
			<h3><?php echo $storyline; ?></h3><?php
		}
		else {
			?><h3>Storyline</h3><?php
		}
		?>

		
		 <?php the_content(); ?></div></div> 
		 <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', '_s' ), 'after' => '</div>' ) ); ?>  
		 
		<?php 
		// pull in awards area
		$awards = get_post_meta($post->ID, 'awards', true);
		if($awards != '') {
			?><div class="project-awards hide-desktop">
		<h3 class="padding-hack">Awards</h3> <p><?php echo $awards ?></p></div><?php
		}
		?>
		
	
		<?php 
		// pull in awards area
		$client_testimonial = get_post_meta($post->ID, 'client_testimonial', true);
		if($client_testimonial != '') {
			?><div class="project-testimonial hide-desktop">
		<h3 class="padding-hack">Our Client Said</h3> <p><?php echo $client_testimonial ?></p></div><?php
		}
		?>
		

				
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
