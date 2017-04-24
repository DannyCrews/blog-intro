<?php
/**
 *
 * exception handling
 *
 * @package BlogIntro
 * @author Dan Crews
 * Date: 4/24/17
 * Time: 2:04 PM
 */

namespace BlogIntro;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

add_action( 'init', __NAMESPACE__ . '\load_whoops',1 );

/**
 * Load Whoops
 *
 * @since 1.0.0
 *
 */
function load_whoops() {
	$whoops = new Run();
	$error_page = new PrettyPageHandler();
	$error_page->setEditor( 'sublime' );
	$whoops->pushHandler( $error_page );
	$whoops->register();
}
