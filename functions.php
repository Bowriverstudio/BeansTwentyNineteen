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

	// Useful UIKit components
	beans_uikit_enqueue_components(array( 'sticky', 'slideshow', 'dotnav', 'slidenav' ), 'add-ons');
	beans_uikit_enqueue_components(array( 'cover', 'section', 'block', 'flex', 'padding', 'grid', 'width', 'animation', 'overlay', 'utility', 'thumbnav', 'thumbnail' ));
}

// Use style.css instead of style.less
add_action('wp_enqueue_scripts', 'beans_child_enqueue_styles');
function beans_child_enqueue_styles()
{
    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

// Add child theme customizations
add_action('beans_before_load_document', 'custom_modify_child_theme');

function custom_modify_child_theme()
{

    // Remove undesired page elements
    beans_remove_action('beans_breadcrumb');
    //beans_remove_action('beans_post_title');

		//TODO: Remove skip links

		beans_modify_action_callback('beans_header', 'beans_child_modify_header');
}

function beans_child_modify_header()
{
	?>

	<h1>LA PINGA DE POLLO</h1>

	<?php
}
