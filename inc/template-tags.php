<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package _s
 * @since _s 1.0
 */

if ( ! function_exists( '_s_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since _s 1.0
 */
function _s_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = 'site-navigation paging-navigation';
	if ( is_single() )
		$nav_class = 'site-navigation post-navigation';

	?>
	<div class="topic-content">
	<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
		<h1 class="assistive-text"><?php _e( 'Post navigation', '_s' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', '_s' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', '_s' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><span class="sidebar-button"><?php next_posts_link( __( 'Older posts', '_s' ) ); ?></span></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><span class="sidebar-button"><?php previous_posts_link( __( 'Newer posts', '_s' ) ); ?></span></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav>
	</div>
	<!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif; // _s_content_nav


if ( ! function_exists( 'feinmann_affiliates' ) ) :
/**
 * Lists out the affiliates at the bottom of the page when called into the tempate
 */
function feinmann_affiliates() {
$affiliations = pods('affiliates');
$params = array(
      'search' => false,
      'pagination' => false,
      'limit' => -1
);
$affiliations->find($params);
$total_affiliations = $affiliations->total();
?>
<div class="affiliations-bar">
<ul class="affiliations-list">
     <?php
     // if there are no affiliates, do not run this code
     if( $total_affiliations > 0 ) :
     //looping through each slide
     while ( $affiliations->fetch() ) :
           // set our variables
           $affiliations_name = $affiliations->field('name');
           $affiliations_logo = $affiliations->field('logo.guid');
           $affiliations_slug = $affiliations->field('permalink');
           $affiliations_url = $affiliations->field('url');
?>
<li class="affiliate <?php echo $affiliations_slug; ?>"><a href="<?php echo $affiliations_url; ?>" target="_blank"><img src="<?php echo $affiliations_logo ?>" alt="<?php echo $affiliations_name; ?>" ></a></li>
<?php endwhile; ?>
<li class="affiliate guildquality"><a href="http://www.guildquality.com/feinmann?src=badge"><img border=0 src="http://www.guildquality.com/Guildquality.gif?k=55A492.C591" title="Feinmann Inc. reviews and customer comments at GuildQuality" alt="Remodelers, home builders, and real estate developers rely on GuildQuality's customer satisfaction surveying to monitor and improve the quality of service they deliver."/></a></li>
</ul>
<?php endif; ?>
</div> <?php


}
endif; // ends Feinmann affiliate code


if ( ! function_exists( 'gallery' ) ) :
/**
 * Displays the gallery code
 */
function gallery() {
	$gallery = pods('projects');
	$params = array(
    'search' => false,
    'pagination' => false,
    'limit' => -1
	);
	$gallery->find($params);
	$total_gallery_items = $gallery->total();
	?>
	<article id="project-listing-grid" class="page type-page status-publish hentry">
     <?php
     // if there are no affiliates, do not run this code
     if( $total_gallery_items > 0 ) {
			 //looping through each item
			 while ( $gallery->fetch() ) {
				 // set our variables
 				$gallery_item_name = $gallery->display('name');
 				$gallery_item_image = $gallery->field('thumb.guid');
 				$gallery_item_url = $gallery->field('slug');
				$gallery_archived = $gallery->field('archived');
					?>
					<div class="gallery-item">
						<div class="container">
							<a href="/projects/<?php echo $gallery_item_url ?>/" class="gallery-link">
							<img src="<?php echo $gallery_item_image ?>" alt="<?php echo $gallery_item_name ?>" >
							<span class="gallery-item-title"><?php echo $gallery_archived ?></span></a>
						</div>
					</div>
					<?php
			} // end while
		} // end if
		?>
	</article>
	<?php
}
endif; // ends Feinmann gallery code


if ( ! function_exists( 'subGalleryMenu' ) ) :
/**
 * Displays the Feinmann sub-gallery menu code
 */
function subGalleryMenu() { ?>

<aside id="nav_menu-4" class="widget widget_nav_menu"><div class="menu-gallery-navigation-container">
<h1 class="widget-title gallery-widget-title">Sort Images By</h1>
<ul id="menu-gallery-navigation" class="menu">
<p id="all-projects-toggle" class="menu-item-all-projects"><a href="/projects">All Projects</a></p>
<p id="awards-toggle" class="menu-item-awards"><a href="/gallery/awards/">Awards</a></p>
<li id="menu-item-795" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-795">


<span id="spaces-menu-head">Spaces</span>
<ul class="sidebar-sub-menu" id="spaces-menu">
<li id="menu-item-787" class="menu-item menu-item-type-taxonomy menu-item-object-space menu-item-787"><a href="/gallery/spaces-kitchen/">Kitchen</a></li>

<li id="menu-item-785" class="menu-item menu-item-type-taxonomy menu-item-object-space menu-item-785"><a href="/gallery/spaces-bath/">Bath</a></li>
<li id="menu-item-788" class="menu-item menu-item-type-taxonomy menu-item-object-space menu-item-788"><a href="/gallery/spaces-living/">Living</a></li>
<li id="menu-item-790" class="menu-item menu-item-type-taxonomy menu-item-object-space menu-item-790"><a href="/gallery/spaces-specialty/">Specialty</a></li>
<li id="menu-item-786" class="menu-item menu-item-type-taxonomy menu-item-object-space menu-item-786"><a href="/gallery/spaces-exterior/">Exterior</a></li>
</ul>
</li>
<li id="menu-item-794" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-794">
<span id="styles-menu-head">Styles</span>
<ul class="sidebar-sub-menu" id="styles-menu">
<li id="menu-item-792" class="menu-item menu-item-type-taxonomy menu-item-object-style menu-item-792"><a href="/gallery/style-traditional/">Traditional</a></li>
<li id="menu-item-793" class="menu-item menu-item-type-taxonomy menu-item-object-style menu-item-793"><a href="/gallery/style-transitional/">Transitional</a></li>
<li id="menu-item-791" class="menu-item menu-item-type-taxonomy menu-item-object-style menu-item-791"><a href="/gallery/style-modern/">Modern</a></li>
</ul>
</li>
</ul>
<span class="sidebar-button open-project-view"><a href="/projects/game-changer/">Open Project View</a></span>
</div>
</aside>

<?php


}
endif; // ends Feinmann project sub-gallery menu code


if ( ! function_exists( 'project_carousel' ) ) :
/**
 * Displays the carousel at the top of the project detail page
 */
function project_carousel() {
$project_carousel = pods('projects');
$params = array(
      'search' => false,
      'orderby' => 'sort ASC',
      'pagination' => false,
      'limit' => -1
);
$project_carousel->find($params);
$total_projects = $project_carousel->total();
?>
	<div class="project-carousel">
	<div class="project-carousel-interior">
	<ul id="mycarousel" class="jcarousel-skin-tango">
     <?php
     // if there are no items in the carousel, do not run this code
     if( $total_projects > 0 ) :
     //looping through each slide
     while ( $project_carousel->fetch() ) :
           // set our variables
					 $archived = $project_carousel->field('archived');
					 if ( $archived != true ) {
						 $project_name = $project_carousel->field('name');
	           $project_thumb = $project_carousel->field('thumb.guid');
	           $project_slug = $project_carousel->field('slug');
	           $project_url = $project_carousel->field('slug');
	           $project_taxonomy = $project_carousel->field("filter_taxonomy");
						 ?>
						 <li class="<?php echo $project_taxonomy ?>"><a href="/projects/<?php echo $project_url; ?>/"><img src="<?php echo $project_thumb ?>" alt="<?php echo $project_name; ?>" ><div class="overlay"></div><span class="carousel-item-title <?php echo $project_slug ?>"><?php echo $project_name; ?></span></a></li>
						 <?php
					 }

				 endwhile;
				 ?>
</ul>
<?php endif; ?>
	</div></div> <?php


}
endif; // ends Feinmann carousel code


if ( ! function_exists( 'project_select' ) ) :
/**
 * Displays the Project selection list at the top of mobile pages
 */
function project_select() {
$project_select = pods('projects');
$params = array(
      'search' => false,
      'pagination' => false,
      'limit' => -1
);
$project_select->find($params);
$total_projects = $project_select->total();
?>
	<form>
	<select id="project-dropdown" name="URL" onchange="window.location.href=this.form.URL.options[this.form.URL.selectedIndex].value" style="margin-bottom:1em; max-width:80%;">
	<option id="default-option">Select a Project</option>
     <?php
     // if there are no items in the carousel, do not run this code
     if( $total_projects > 0 ) :
     //looping through each slide
     while ( $project_select->fetch() ) :
           // set our variables
           $project_name = $project_select->field('name');
           $project_url = $project_select->field('slug');
?>
<option value="/projects/<?php echo $project_url; ?>"><?php echo $project_name; ?></option>
<?php endwhile; ?>
<?php endif; ?>
	</select></form> <?php


}
endif; // ends Feinmann project select code


if ( ! function_exists( '_s_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since _s 1.0
 */
function _s_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', '_s' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', '_s' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', '_s' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', '_s' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', '_s' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', '_s' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for _s_comment()

if ( ! function_exists( '_s_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since _s 1.0
 */
function _s_posted_on() {
	printf( __( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>', '_s' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', '_s' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 *
 * @since _s 1.0
 */
function _s_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so _s_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so _s_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in _s_categorized_blog
 *
 * @since _s 1.0
 */
function _s_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', '_s_category_transient_flusher' );
add_action( 'save_post', '_s_category_transient_flusher' );

/**
 * Expandable Contact widget
 */

function contact_widget() {
	?>
  <div class="pulldown-widget">
    <div class="contact-widget">
      <div class="textwidget">
				<h1 class="widget-title"><a href="/contact/">Book A Consultation</a></h1>
				<p>
					<span class="contact-title">Email</span><br>
					<span class="sidebar-button"><a href="mailto:info@feinmann.com">info@feinmann.com</a></span>
				</p>
				<p>
					<span class="contact-title">Phone</span><br>
					781-860-9800
				</p>
				<p><span class="contact-title">Fax</span><br>
					781-860-7800
				</p>
				<p>
					<span class="contact-title">Location</span><br>
					27 Muzzey Street<br> Lexington MA. 02421
				</p>
    	</div>
  	</div>
		<div class="pulldown-trigger">
			<p class="trigger">Contact Us</p>
		</div>
	</div>
	<?php
}
