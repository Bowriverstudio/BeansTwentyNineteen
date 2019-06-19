<?php
/**
 * Beans Child Customizer Settings
 *
 * @author Bowriverstudio
 * @link   https://www.getbeans.io
 * @package beans-sample
 */

add_action('customize_register', 'beans_child_customizer_settings');

function beans_child_customizer_settings($wp_customize)
{
    // Before header social icons section
    $wp_customize->add_section('social_links', array(
      'title'      => 'Social Links Settings',
      'priority'   => 1,
    ));

    $social_links = array( 'facebook', 'instagram', 'twitter' );

    foreach ($social_links as $social) {
        $wp_customize->add_setting('social_' . $social, array(
          'default'     => 'https://wwww.' . $social . '.com',
          'transport'   => 'postMessage',
        ));

        $wp_customize->add_control('social_' . $social, array(
          'label' => ucfirst($social),
          'section'	=> 'social_links',
          'type'	 => 'url',
        ));
    }
}
