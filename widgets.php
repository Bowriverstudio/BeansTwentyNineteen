<?php
/**
 * Beans Child Widget definitions
 *
 * All widgets in here!
 *
 * @author Bowriverstudio
 * @link   https://www.getbeans.io
 * @package beans-sample
 */

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
