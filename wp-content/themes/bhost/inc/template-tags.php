<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bhost
 */

function bhost_author(){
	echo '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>';
} 

if ( ! function_exists( 'bhost_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
 
 
function bhost_entry_footer() {
	
	// Author name with url.
	$byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a> ';
	
	printf( '<span class="by_admin">' . __( 'By in : %1$s', 'bhost' ) .  '</span>' , $byline );
	
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'bhost' ) );
		if ( $categories_list && bhost_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( '- Posted in : %1$s', 'bhost' ) . '</span>', $categories_list .' ');
		}
		
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'bhost' ) );
		if ( $tags_list ) {
			printf( ' <span class="tags-links">' . __( ' - Tagged : %1$s - ', 'bhost' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo ' <span class="comments-link">';
		comments_popup_link( __( ' Leave a comment', 'bhost' ), __( ' 1 Comment', 'bhost' ), __( ' % Comments', 'bhost' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'bhost' ), '<span class="edit-link">', '</span>' );
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function bhost_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bhost_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bhost_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bhost_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bhost_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in bhost_categorized_blog.
 */
function bhost_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bhost_categories' );
}
add_action( 'edit_category', 'bhost_category_transient_flusher' );
add_action( 'save_post',     'bhost_category_transient_flusher' );
