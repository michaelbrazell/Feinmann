<?php 
/**
The custom Feinmann Template for Nextgen Gallery

This is the standard code for generating the images in the feinmann galleries:

<div class="gallery-item"><div class="container">
    <a href="{@detail_url}" class="gallery-link"><img src="{@thumb.guid}" alt="{@name}"><div class="overlay"></div><span class="gallery-item-title">{@name}</span></a></div></div>
    

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<div class="ngg-galleryoverview" id="<?php echo $gallery->anchor ?>">

<?php if ($gallery->show_piclens) { ?>
	<!-- Piclense link -->
	<div class="piclenselink">
		<a class="piclenselink" href="<?php echo $gallery->piclens_link ?>">
			<?php _e('[View with PicLens]','nggallery'); ?>
		</a>
	</div>
<?php } ?>
	<!-- Test Code -->
	<div class="project-gallery">
	<!-- Thumbnails -->
	<?php foreach ( $images as $image ) : ?>
	<div class="gallery-item"><div class="container">
			<a href="<?php echo $image->imageURL ?>" title="<?php echo $image->description ?>" data-url="<?php echo $image->ngg_custom_fields["Project URL"]; ?>" <?php echo $image->thumbcode ?>>
				<?php if ( !$image->hidden ) { ?>
				<img alt="<?php echo $image->description ?>" title="<?php echo $image->description ?>" src="<?php echo $image->thumbnailURL ?>" <?php echo $image->size ?> /><div class="overlay"></div><span class="gallery-item-title"><?php echo $image->description ?></span>
				<?php } ?>
			</a>
		</div>
	</div>
	
	<?php if ( $image->hidden ) continue; ?>
	<?php if ( $gallery->columns > 0 && ++$i % $gallery->columns == 0 ) { ?>
		<br style="clear: both" />
	<?php } ?>

 	<?php endforeach; ?>
	</div>
	<!-- Pagination -->
 	<?php echo $pagination ?>
 	
</div>

<?php endif; ?>