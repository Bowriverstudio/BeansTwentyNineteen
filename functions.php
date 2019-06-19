<?php
/**
 * Beans Sample Child theme.
 *
 * We strongly recommend to read the Beans documentation to find out more about
 * how to customize the Beans theme.
 *
 * @author Bowriverstudio
 * @link   https://www.getbeans.io
 * @package beans-sample
 */

// Include Beans. Do not remove the line below.
require_once get_template_directory() . '/lib/init.php';

// Include markup functions
require_once get_stylesheet_directory() . '/markup.php';

// Include widgets
require_once get_stylesheet_directory() . '/widgets.php';

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

add_action( 'beans_uikit_enqueue_scripts', 'beans_child_enqueue_uikit_assets' );

function beans_child_enqueue_uikit_assets() {
  // Enqueue uikit overwrite theme folder
	beans_uikit_enqueue_theme( 'jenkins', get_stylesheet_directory_uri() . '/assets/less/uikit' );

	// Add the theme style as a uikit fragment to have access to all the variables
	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/less/style.less', 'less' );
	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/style.less', 'less' );

	// Load UIKit components
	beans_uikit_enqueue_components(array( 'sticky', ), 'add-ons');
	beans_uikit_enqueue_components(array( 'cover', 'overlay', 'utility', ));
}

// Add child theme customizations
add_action('beans_before_load_document', 'custom_modify_child_theme');

function custom_modify_child_theme()
{

    // Remove undesired page elements
    beans_remove_action('beans_breadcrumb');
    beans_remove_action('beans_post_title');

		//TODO: Remove skip links

		// Header customizations
		beans_add_attribute('beans_site_branding', 'class', 'uk-grid uk-pull-1-10');
		beans_remove_attribute('beans_primary_menu', 'class', 'uk-float-right');
		beans_add_attribute('beans_post', 'class', 'uk-width-medium-7-10');

		beans_modify_action_callback('beans_site_title_tag', 'site_title_description');
		beans_modify_action_hook('beans_primary_menu', 'beans_site_title_tag_after_markup');

		// Post title customizations
		beans_add_smart_action('beans_header_after_markup', 'beans_child_post_title');

		// Home banner and featured image customizations
		beans_add_smart_action('beans_header_after_markup', 'beans_child_home_banner');

		// Move featured image position
		beans_modify_action('beans_post_image', 'beans_head_after_markup', 'beans_child_post_image');

		// Footer customizations
		beans_modify_action_callback('beans_footer_content', 'beans_child_footer_content');

		// Blog related customizations
		beans_remove_action('beans_post_meta');
}

// Social links menu registration
add_action( 'after_setup_theme', 'beans_child_register_menus' );

function beans_child_register_menus() {
	register_nav_menus( array(
		'social_links_menu' => 'Social Links Menu',
	) );
}
