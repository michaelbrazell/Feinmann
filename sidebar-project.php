<?php
/**
 * The Sidebar that is pulled into the gallery detail page
 *
 * @package _s
 * @since _s 1.0
 */
?>
		<div id="secondary-project" class="widget-area project-sidebar" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			
				<header class="entry-header hide-mobile">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
			
					<aside class="project-gallery-image-container hide-mobile">
					<div class="foobox fbx-instance">
						<!-- <div id="thumbs"> -->
						<?php
						// Show gallery thumbnails
						/* Old Gallery Thumbnail code before applying the pager */
						$gallery_image = get_post_meta($post->ID, 'gallery_image.guid', false); ?>
						<?php foreach($gallery_image as $gallery_image) {
						?> <a rel="foobox" class="fbx-link" href="<?php echo $gallery_image; ?>"><img src="<?php echo $gallery_image; ?>" class="gallery-image" height="54px" width="70" alt="<?php the_title(); ?>"></a> <?php
						} ?>
						
						<!-- <ul id="cycle-pager"></ul>-->
						<!-- </div> -->
					</div>
					</aside>
				
					<?php 
					// pull in awards area
					$awards = get_post_meta($post->ID, 'awards', true);
					if($awards != '') {
						?><aside class="project-awards hide-mobile">
					<h3 class="padding-hack">Awards</h3> <p><?php echo $awards ?></p></aside><?php
					}
					?>
			
				
					<?php 
					// pull in awards area
					$client_testimonial = get_post_meta($post->ID, 'client_testimonial', true);
					if($client_testimonial != '') {
						?><aside class="project-testimonial hide-mobile">
					<h3 class="padding-hack">Our Client Said</h3> <p><?php echo $client_testimonial ?></p></aside><?php
					}
					?>
					<?php edit_post_link( __( 'Edit Project', '_s' ), '<span class="edit-link">', '</span>' ); ?>
				

		</div>
