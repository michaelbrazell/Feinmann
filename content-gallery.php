<?php
/**
 * The template used for displaying the gallery list
 *
 * @package _s
 * @since _s 1.0
 */
?>
 
		<?php gallery(); ?>
		
		<?php
		// pull in the gallery image
		/*
		
		$thumb = get_post_meta($post->ID, 'thumb.guid', false);
		$url = get_post_meta($post->ID, 'slug', true);
		$name = get_post_meta($post->ID, 'name', true);
		foreach($thumb as $thumb) {
			?><div class="gallery-item"><div class="container">
    <a href="<?php the_permalink(); ?>" class="gallery-link"><img src="<?php echo $thumb ?>" alt="<?php the_title(); ?>"><span class="gallery-item-title"><?php the_title(); ?></span></a></div>
				</div><?php
		}
		 */ ?>
		