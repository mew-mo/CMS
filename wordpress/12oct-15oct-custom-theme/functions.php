<?php
// basically the backend of your theme is in this file
//
// functions that render different post files, filter hooks and action hooks. etc.

// the WORDPRESS CODEX is ur BIBLE

// turning on the thumbnails--
// turn on theme support
add_theme_support('post-thumbnails');

function import_stylesheet() {
  wp_enqueue_style('custom-style', get_stylesheet_uri());
  // the arguments we are using are string $handle, which just names it
  // the second argument is the src-- a wordpress function that grabs the style.css from the root directory. it ONLY looks for sheets named style.css so HAVE TO CALL IT THAT.
}

// load custom dashboard css
function custom_dashboard_css() {
  wp_enqueue_style('new-dashboard-styles', get_template_directory_uri() . '/dashboard.css');
}

// running the scripts at a specific time
add_action('admin_enqueue_scripts', 'custom_dashboard_css');

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

// set up a custom metabox!! :D
// ================================================
function add_fruit_metabox() {
  add_meta_box(
    'fruit_metabox',
    // giving an id in the dashboard that we can edit in css
    'our first metabox!',
    // the title that displays in the dashboard
    'fruit_metabox_callback',
    // the callback function to call that runs and renders the elements
    'fruit',
    // the custom posttype we attach the metabox to
    'normal'
    // gets the metabox to show on the dashboard. it can be (normal) or (side). this is just the position it displays in :D
  );
}

// the callback funtion -- its like a promise
// argument where wordpress grabs all the information about that post so you have access to all of the post data :D
function fruit_metabox_callback($post) {
  $blurb_data = get_post_meta($post->ID, 'blurb_input', true);
  // 1. getting the post
  // 2. the data you want to obtain (lined to the input field)
  // 3. true is returning a single string. false would be like returning an array of values. so like! its true it does return a single bit of data!

  $review_data = get_post_meta($post->ID, 'review_input', true);

  $radio_rating_data = get_post_meta($post->ID, 'radio_rating', true);

  echo '<label for "blurb" class="blurb-label">Blurb</label>' .
  '<input type ="text" id="blurb_input" name="blurb_input" size="50" value="' . $blurb_data . '"><br><br>';

  echo '<label for "review" class="blurb-label">Review the fruit:</label><br>' .
  '<textarea id="review_input" name="review_input" rows="5" cols="57">' . $review_data . '</textarea><br><br>';
  // need to run a save and retrieve function to the database to make it useful :D
  ?>
  <div class="fields">
    Star Rating:<br>
    <div class="fields">
      <label>
        <input type="radio" name="radio_rating" value="1" <?php
          if ($radio_rating_data == 1) {
            echo 'checked';
          }
        ?>> One Star
      </label><br>
      <label>
        <input type="radio" name="radio_rating" value="2" <?php
          if ($radio_rating_data == 2) {
            echo 'checked';
          }
        ?>> Two Stars
      </label><br>
      <label>
        <input type="radio" name="radio_rating" value="3" <?php
          if ($radio_rating_data == 3) {
            echo 'checked';
          }
        ?>> Three Stars
      </label><br>
      <label>
        <input type="radio" name="radio_rating" value="4" <?php
          if ($radio_rating_data == 4) {
            echo 'checked';
          }
        ?>> Four Stars
      </label><br>
      <label>
        <input type="radio" name="radio_rating" value="5" <?php
          if ($radio_rating_data == 5) {
            echo 'checked';
          }
        ?>> Five Stars
      </label><br>
    </div>
  </div>

  <?php
  echo 'You rated ' . $radio_rating_data . ' out of 5';
}

// run the metabox function during the admin menu WP function. its the time where wp sets up the admin panel in the dashboard
add_action('admin_menu', 'add_fruit_metabox');

// save our fruit metabox input :>

// wp arguments
// 1. gets the post id
// 2. gets the rest of the info about the post
function save_fruit_metabox_data($post_id, $post) {
  // check current permissions of the user.
  $post_type = get_post_type_object($post->post_type);
  if (! current_user_can($post_type->cap->edit_post, $post_id)) {
    // the above line checks if the user CANT edit the post
    // cap = capability
    return $post_id;
    // returns the data that already exists. wont change anything as the user cant update it
  }
  // do not save the data if WP is autosaving
  // ensures theres no clash between auto save and regular save
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  // check if the post type = fruit
  if ($post->post_type != 'fruit') {
    return $post_id;
  }
  // this is in case the page does a fucky wucky and ur somehow on a different type of post. ensuring the saving system will not mess up.

  // check if it's been posted
  // IF is checking if it exists (if data has actually been entered into the input)
  if (isset($_POST['blurb_input'])) {
    update_post_meta($post_id, 'blurb_input', sanitize_text_field($_POST['blurb_input']));
    // 1st arg. grabbing the particular post we are saving to
    // 2nd arg. updating with the name of the input we created.
    // 3rd arg. grab info from the input and remove ANY html that mightve been included. stop them. stop. it will render the input as pure
  } else {
    // ELSE in case nothing exists or if someone wants to delete a value that WAS there
    delete_post_meta($post_id, 'blurb_input');
    // grab the post id to delete the blurb input that is linked to that particular post.
  }

  // if you have another input field you'll need to check over these aspects again for the new field :>
  if (isset($_POST['review_input'])) {
    update_post_meta($post_id, 'review_input', sanitize_text_field($_POST['review_input']));
  } else {
    delete_post_meta($post_id, 'review_input');
  }

  if (isset($_POST['review_input'])) {
    update_post_meta($post_id, 'radio_rating', sanitize_text_field($_POST['radio_rating']));
  } else {
    delete_post_meta($post_id, 'radio_rating');
  }

  return $post_id;
  // return it as original if no conditions are met
}

// action hook for saving the metabox data
// this function needs more arguments. the action is going to be a little bit different.
add_action('save_post', 'save_fruit_metabox_data', 10, 2);
// two number args at the end!
// 1st arg = priority, used to specify order in which the action is executed. so saving posts HAS to occur at position 10, this is just due to how wordpress is structured.
// 2nd arg = integer -- telling it to use two arguments at the end,,,,,, ??? don't know.
?>
