<?php
/**
 * Beans Child Related Markup Functions
 *
 * We strongly recommend to put here all functions adding or modifying
 * theme markup
 *
 * @author Bowriverstudio
 * @link   https://www.getbeans.io
 * @package beans-sample
 */

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

			<div class="footer-copyright-info">
				<?php echo get_theme_mod( 'footer-copyright-info', $default = false ) ?>
			</div>

			<div class="footer-copyright-info">
					<a class="site-name" href="<?php echo get_bloginfo( 'url' ); ?>"><?php echo get_bloginfo( 'name'); ?></a>,
					<spam class="site-description"><?php echo get_bloginfo( 'description'); ?></spam>
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
				<img class="uk-responsive-height" src="<?php echo get_the_post_thumbnail_url(); ?>"/>
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
				<?php if ( is_blog_page() ): ?>
					<div class="uk-grid white-text">
						<div class="field-box">
							<i class="uk-icon uk-icon-user"></i>
							<?php echo get_bloginfo( 'author' ); ?>
						</div>
						<div class="field-box">
							<i class="uk-icon uk-icon-clock-o"></i>
							<?php echo get_the_date(); ?>
						</div>
						<div class="field-box uk-align-right">
							<i class="uk-icon uk-icon-comments"></i>
							<?php echo get_comments_number( ) . " Comments"; ?>
						</div>
					</div>

				</div>
				<?php endif; ?>
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

/**
 * WordPress' missing is_blog_page() function.  Determines if the currently viewed page is
 * one of the blog pages, including the blog home page, archive, category/tag, author, or single
 * post pages.
 *
 * Taken from (https://gist.github.com/wesbos/1189639)
 *
 * @return bool
 */
function is_blog_page()
{
    global $post;

    // Post type must be 'post'.
    $post_type = get_post_type($post);

    // Check all blog-related conditional tags, as well as the current post type,
    // to determine if we're viewing a blog page.
    return ( $post_type === 'post' ) && ( is_home() || is_archive() || is_single() );
}
