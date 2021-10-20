<?php

/*

Plugin Name: My Plugin yessss

Plugin URI: http://placeholder.com

Description: Plugin that says hello world!

Version: 0.0.1

Author: Mo

Author URI: http://placeholder.com

License: GPLv2 or later

*/

// add a shortcode that prints hello world!
// ===============================================
function hello_world_shortcode() {
  return '<h5 style="color:turquoise;"> HELLO WORLD </h5>';
}

add_shortcode('helloworldshortcode', 'hello_world_shortcode');
// wp function for adding shortcode
// 1st arg is the actual shortcode
// 2nd arg is our callback function which is what gets rendered! :D
// shortcode looks like this [helloworldshortcode]

// you can upload js and css with a plugin!! wow!
// add js and jquery to tha plugin :D
// ===============================================
function my_plugin_scripts() {
  wp_enqueue_script('jquery-plugin-script', plugin_dir_url(__FILE__) . 'js/jquery.min.js');
  // 1st arg is the name of the script in an id, you have to make sure its different from any other youve used in the website
  // 2nd arg is telling where the plugin directory is to access the link

  wp_enqueue_script('customjs-plugin-script', plugin_dir_url(__FILE__) . 'js/custom.js');
}

add_action('wp_enqueue_scripts','my_plugin_scripts');
// 1st arg when to run
// 2nd arg callback

// add in a css file
// ===============================================
wp_enqueue_style('custom-plugin-css', plugin_dir_url(__FILE__) . 'css/custom.css');

?>
