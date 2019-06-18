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
	beans_uikit_enqueue_components(array( 'sticky', 'slideshow', 'dotnav', 'slidenav' ), 'add-ons');
	beans_uikit_enqueue_components(array( 'cover', 'section', 'block', 'flex', 'padding', 'grid', 'width', 'animation', 'overlay', 'utility', 'thumbnav', 'thumbnail' ));
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
}

add_action('widgets_init', 'setup_widgets');

function setup_widgets()
{
    for ($i=1; $i<=2; $i++) {
        beans_register_widget_area(array(
            'name' => 'Footer Column '.$i,
            'id' => 'footer-column-'.$i,
            'description' => 'Footer widgets Area '.$i,
        ));
    }
}


function beans_child_footer_content()
{
    ?>
    <div class="uk-container uk-container-center" data-uk-grid-margin>

			<div class="uk-grid">

				<div class="footer-column footer-column-1 uk-width-medium-1-2">
						<?php echo beans_get_widget_area_output('footer-column-1'); ?>
				</div>

        <div class="footer-column footer-column-2 uk-width-medium-1-2">
					<?php echo beans_get_widget_area_output('footer-column-2'); ?>
        </div>

			</div>

    </div>
    <?php
}

// Featured image fixes
function beans_child_post_image()
{
	?>

		<!-- Featured image -->
		<div class="tm-article-image">
			<div class="uk-overlay">
				<img src="<?php echo get_the_post_thumbnail_url(); ?>"/>
				<div class="uk-overlay-panel uk-overlay-background">
				</div>
			</div>
		</div>

	<?php
}

// Social links menu registration
add_action( 'after_setup_theme', 'beans_child_register_menus' );

function beans_child_register_menus() {
	register_nav_menus( array(
		'social_links_menu' => 'Social Links Menu',
	) );
}

function site_title_description()
{
	$site_info_color_suffix = "";
	if ( has_post_thumbnail()) {
		$site_info_color_suffix = "-white";
	}
	?>
		<div>
			<?php beans_open_markup_e('beans_site_title_tag', 'div', array()  ); ?>
				<div class="uk-grid">
					<p>
						<a class="site-title<?php echo $site_info_color_suffix; ?>" href="<?php echo get_bloginfo( 'url'); ?>" rel="home"><?php echo get_bloginfo( 'name'); ?></a>
					</p>
					<p class="site-description<?php echo $site_info_color_suffix; ?>">
						<?php echo get_bloginfo( 'description'); ?>
					</p>
				</div>
			<?php beans_close_markup_e('beans_site_title_tag', 'div' ); ?>
		</div>
	<?php
}

function beans_child_post_title()
{
	$post_title_class = "post-title";
	if ( has_post_thumbnail()) {
		$post_title_class = "post-title-big-margin";
	}
	?>
		<div class="uk-container uk-container-center">
				<h1 class="<?php echo $post_title_class; ?>"><?php the_title(); ?></h1>
		</div>

	<?php
}


/**
 * Home banner and featured image customization
 */
function beans_child_home_banner()
{
	if ( ! has_post_thumbnail()):
	?>
		<div class="has-background-cover">
			<div class="has-background-cover-opacity">
			</div>
		</div>
	<?php
	endif;
}
