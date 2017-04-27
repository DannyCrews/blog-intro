<?php
/**
 *
 * Business logic for front-end to grab contents out of the database, prepare it for rendering, and then call the view.
 *
 * @package
 * BlogIntro
 * @since   1.0.0
 * @author  Dan Crews
 * Date: 4/24/17
 * Time: 2:10 PM
 * @license GNU General Public License 2.0+
 */

namespace BlogIntro;

//add_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
add_action( 'genesis_before_loop', __NAMESPACE__ . '\render_content' );
/**
 * Display the content for the posts page.
 *
 * @since 1.0.0
 *
 */
function render_content() {
	if (! is_home() ) {
		return;
	}

	$posts_page = get_posts_page();
	if ( ! $posts_page ) {
		return;
	}

	echo $posts_page->post_content;
}

/**
 * Get Posts Page data and object from database
 *
 * @since 1.0.0
 *
 * @return null|\WP_Post
 */
function get_posts_page() {
	$posts_page_id = get_option( 'page_for_posts' );

	return get_post( $posts_page_id );
}