<?php
/**
 * Archive Page
 *
 * @package     BeansSample
 * @since       1.0.0
 * @author      Maurice Tadros
 * @link        https://bowriverstudio.com
 * @license     GNU General Public License 2.0+
 */

add_filter( 'the_content', 'beans_sample_post_excerpt' );

/**
 * Callback that returns the excerpt() instead of the_content
 *
 * @since 1.0.0
 * @author Maurice Tadros
 * @param string $content WordPress the_content().
 *
 * @return string
 */
function beans_sample_post_excerpt( $content ) {
	if ( has_excerpt() ) {
		return '<p>' . get_the_excerpt() . '</p><p>' . beans_post_more_link() . '</p>';
	}
	return $content;
}

beans_load_document();
