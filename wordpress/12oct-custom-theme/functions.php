<!-- basically the backend of your theme is in this file -->

<!-- functions that render different post files, filter hooks and action hooks. etc. -->

<?php

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

?>
