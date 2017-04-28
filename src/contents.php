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

add_action( 'after_setup_theme', __NAMESPACE__ . '\unregister_callbacks');
/**
 * Unregister callbacks after they have been registered
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_callbacks() {
	remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
}

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

	$contents = prepare_contents_for_rendering( $posts_page->post_content );
	$title = esc_html( $posts_page->post_title );

	include( 'views/contents.php' );
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

/**
 * Prepare raw content from database for rendering
 *
 * @since 1.0.0
 *
 * @param string $post_content
 *
 * @return string Returns HTML
 */
function prepare_contents_for_rendering( $post_content ) {
	$post_content = wp_kses_post( $post_content );
	$post_content = do_shortcode( $post_content );

	return wpautop( $post_content );
}