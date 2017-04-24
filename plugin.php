<?php

/**
 * Add an introduction to the site's page using the Wordpress editor on the page_for_posts page.
 *
 * @package     BlogIntro
 * @author      Dan Crews
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Blog Intro
 * Description: Introduce your blog page - Add an introduction to the site's page using the Wordpress editor on the page_for_posts page.
 * Version:     1.0.0
 * Author:      Dan Crews
 * Text Domain: blog_intro
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
namespace BlogIntro;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh:?');
}

require_once( __DIR__ . '/assets/vendor/autoload.php' );
