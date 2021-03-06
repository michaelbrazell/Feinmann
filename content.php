<?php
/**
 * @package _s
 * @since _s 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-meta">
			<?php _s_posted_on(); ?>
		</div>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', '_s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<!-- <div class="entry-meta">
			<?php _s_posted_on(); ?>
		</div> --><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Read more...', '_s' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', '_s' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', '_s' ) );
				if ( $categories_list && _s_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( '<em>CATEGORIES:</em> %1$s', '_s' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', '_s' ) );
				if ( $tags_list ) :
			?>
			<span class="sep"> &nbsp; </span>
			<span class="tags-links">
				<?php printf( __( '<em>TAGS:</em> %1$s', '_s' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
			
			
		<?php endif; // End if 'post' == get_post_type() ?>
					
		<?php /* Comment out comment notice on blog index
		<?php  if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="sep"> | </span>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', '_s' ), __( '1 Comment', '_s' ), __( '% Comments', '_s' ) ); ?></span>
		<?php endif; ?> 
		End comment on comments */ ?>

		<?php edit_post_link( __( 'Edit', '_s' ), '<span class="sep"> &nbsp; </span><span class="edit-link">', '</span>' ); ?>
		<?php	/* Begin socialable */ ?>
				<span class="sep"> &nbsp; </span>
				<span class="social-links"><?php if( function_exists( do_sociable() ) ){ do_sociable(); }?></span>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
