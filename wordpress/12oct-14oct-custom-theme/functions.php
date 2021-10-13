<?php
// basically the backend of your theme is in this file
//
// functions that render different post files, filter hooks and action hooks. etc.

// turning on the thumbnails--
// turn on theme support
add_theme_support('post-thumbnails');

function import_stylesheet() {
  wp_enqueue_style('custom-style', get_stylesheet_uri());
  // the arguments we are using are string $handle, which just names it
  // the second argument is the src-- a wordpress function that grabs the style.css from the root directory. it ONLY looks for sheets named style.css so HAVE TO CALL IT THAT.
}

// action hook - it will run something at a given time.
add_action('wp_enqueue_scripts', 'import_stylesheet');
// 1st argument: the action you want to attach the callback to (this is WHEN the action runs)
// 2nd argument (WHAT action we want it to run)
// look up ACTION REFERENCE to find the wordpress action execution order- to make things do things at different times
// https://codex.wordpress.org/Plugin_API/Action_Reference
// wordpress wont load things unless they occur at the right time. so you need to choose what times things should load Carefully. here we cannot use init because that will simply not work.
// wp wp_enqueue_scripts runs as part of wp_head function which is the funtion that runs the head of the website- so basically the stylesheets and whatever else is in the head.

// telling the theme we are going to make a custom menu in our theme. bascially registering it

register_nav_menus(['primary' => 'mo! primary menu']);
// telling it that it will exist in the primary slot. mos primary menu IS the primary slot

// customise the excerpt length (filter hook)
function new_excerpt_length() {
  return 20;
}
// use a filter hook to modify wordpress function at runtime
add_filter('excerpt_length', 'new_excerpt_length');
// 1st arg: what we want to change
// 2nd argument: OUR function as a callback (the new change)

// creating custom post type!!
function create_fruit_posttype() {
  // set up arguments
  $args = array(
    // first arg: the label, which is an array itself
    'labels' => array(
      // name of the post type
      'name' => 'Fruit',
      'singular_name' => 'Fruit' //for words that could be plurals. ex name = cats, singular_name = cat.
    ),
    'public' => true,
    // public on dashboard so anyone can use it
    'menu_icon' => 'dashicons-carrot',
    // https://developer.wordpress.org/resource/dashicons/#location-alt
    // the icon that'll display on the dashboard menu
    'supports' => array('title', 'editor', 'thumbnail'),
    // tells wordpress whats available in the post (these ones r basic but yes)
    'menu_position' => 5
    // changes where it is located on the menu tab in the wordpress dashboard
    // https://developer.wordpress.org/reference/functions/register_post_type/#menu_position
   );
   // Within the createfruit function, we need to register the posttype
   register_post_type('fruit', $args);
   // must use lowercase registering bc this is the dataname of the posttype
}
// gonna create this function with an action hook

add_action('init', 'create_fruit_posttype');

// creating custom post type!!
function create_sport_posttype() {
  // set up arguments
  $args = array(
    'labels' => array(
      'name' => 'Sports',
      'singular_name' => 'Sport'
    ),
    'public' => true,
    'menu_icon' => 'dashicons-universal-access',
    'supports' => array('title', 'editor', 'thumbnail'),
    'menu_position' => 5
   );
   register_post_type('sports', $args);
}

add_action('init', 'create_sport_posttype');

function create_photographs_posttype() {
  // set up arguments
  $args = array(
    'labels' => array(
      'name' => 'Photographs',
      'singular_name' => 'Photograph'
    ),
    'public' => true,
    'menu_icon' => 'dashicons-camera',
    'supports' => array('title', 'editor', 'thumbnail'),
    'menu_position' => 5
   );
   register_post_type('photographs', $args);
}

add_action('init', 'create_photographs_posttype');


?>
