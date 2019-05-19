<?php
/**
 * Beans Sample Child theme.
 *
 * We strongly recommend to read the Beans documentation to find out more about
 * how to customize the Beans theme.
 *
 * @author Bowriverstudio
 * @link   https://www.getbeans.io
 * @package eans-sample
 */

// Include Beans. Do not remove the line below.
require_once get_template_directory() . '/lib/init.php';

add_action( 'beans_uikit_enqueue_scripts', 'beans_child_enqueue_uikit_assets' );

/**
 * Enqueue's Sample themes default LESS Styles.
 *
 * Remove this action and callback function if you do not wish to use LESS to style your site or overwrite UIkit variables.
 * If you are using LESS, make sure to enable development mode via the Admin->Appearance->Settings option. LESS will then be processed on the fly.
 *
 * @since 1.0.0
 * @author bowriverstudio.com
 *
 * @return void
 */
function beans_child_enqueue_uikit_assets() {
// Enqueue uikit overwrite theme folder
	beans_uikit_enqueue_theme( 'jenkins', get_stylesheet_directory_uri() . '/assets/less/uikit' );

	// Add the theme style as a uikit fragment to have access to all the variables
	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/less/style.less', 'less' );
}

// Remove breadcrumbs.
beans_remove_action( 'beans_breadcrumb' );
