<?php
/**
 * Enable editor feature for the post page in the back-end
 *
 * @package BlogIntro
 * @since   1.0.0
 * @author  Dan Crews
 * Date: 4/24/17
 * Time: 2:06 PM
 * @license GNU General Public License 2.0+
 */

namespace BlogIntro;

add_action('edit_form_after_title', __NAMESPACE__ . '\enable_page_for_posts_editor' );
/**
 * Add the posts editor to the page_for_posts page
 *
 * @since 1.0.0
 *
 * @param \WP_Post $post Current Post Object
 *
 * @return void
 */
function enable_page_for_posts_editor( $post ) {
	if ( get_option( 'page_for_posts' ) === $post->ID ) {
		add_post_type_support( 'page', 'editor' );
	}
}