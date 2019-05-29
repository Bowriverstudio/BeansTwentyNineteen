<?php
/**
 * Default Block Editor settings for Beans - Over writable in the child theme.
 *
 * @package Beans\Config
 */


return array(
	'editor-color-palette' => array(
		array(
			'name'  => __( 'Primary', 'beans' ),
			'slug'  => 'primary',
			'color' => '#2d7091',
		),
		array(
			'name'  => __( 'Muted', 'beans' ),
			'slug'  => 'muted',
			'color' => '#999',
		),
		array(
			'name'  => __( 'Success', 'beans' ),
			'slug'  => 'success',
			'color' => '#659f13',
		),
		array(
			'name'  => __( 'Warning', 'beans' ),
			'slug'  => 'warning',
			'color' => '#e28327',
		),
		array(
			'name'  => __( 'Danger', 'beans' ),
			'slug'  => 'danger',
			'color' => '#d85030',
		),
		array(
			'name'  => __( 'Dark Gray', 'twentynineteen' ),
			'slug'  => 'dark-gray',
			'color' => '#111',
		),
		array(
			'name'  => __( 'Light Gray', 'twentynineteen' ),
			'slug'  => 'light-gray',
			'color' => '#767676',
		),
		array(
			'name'  => __( 'White', 'twentynineteen' ),
			'slug'  => 'white',
			'color' => '#FFF',
		),
	),
	'editor-font-sizes'    => array(
		array(
			'name'      => __( 'Small', 'twentynineteen' ),
			'shortName' => __( 'S', 'twentynineteen' ),
			'size'      => 16.5,
			'slug'      => 'small',
		),
		array(
			'name'      => __( 'Normal', 'twentynineteen' ),
			'shortName' => __( 'M', 'twentynineteen' ),
			'size'      => 22,
			'slug'      => 'normal',
		),
		array(
			'name'      => __( 'Large', 'twentynineteen' ),
			'shortName' => __( 'L', 'twentynineteen' ),
			'size'      => 27.5,
			'slug'      => 'large',
		),
		array(
			'name'      => __( 'Larger', 'twentynineteen' ),
			'shortName' => __( 'XL', 'twentynineteen' ),
			'size'      => 33,
			'slug'      => 'larger',
		),
		array(
			'name'      => __( 'Huge', 'twentynineteen' ),
			'shortName' => __( 'XXL', 'twentynineteen' ),
			'size'      => 44,
			'slug'      => 'huge',
		),
	)
);
