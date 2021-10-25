<?php
// basically the backend of your theme is in this file
//
// functions that render different post files, filter hooks and action hooks. etc.

// the WORDPRESS CODEX is ur BIBLE

// turning on the thumbnails--
// turn on theme support
add_theme_support('post-thumbnails');
// adding support for woocommerce too!
add_theme_support('woocommerce');


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

// set up a custom metabox!! :D - 151021
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
  // get post meta gets a specific piece of data from the post, so the data we are getting is the blurb input
  // 1. getting the post
  // 2. the data you want to obtain (lined to the input field)
  // 3. true is returning a single string. false would be like returning an array of values. so like! its true it does return a single bit of data!

  $review_data = get_post_meta($post->ID, 'review_input', true);

  $radio_rating_data = get_post_meta($post->ID, 'radio_rating', true);

  $drop_data = get_post_meta($post->ID, 'fruit_dropdown', true);

  // $check_data = get_post_meta($post->ID, 'drop', false);

  echo '<label for "blurb" class="blurb-label">Blurb</label>' .
  '<input type ="text" id="blurb_input" name="blurb_input" size="50" value="' . $blurb_data . '"><br><br>';

  echo '<label for "review" class="blurb-label">Review the fruit:</label><br>' .
  '<textarea id="review_input" name="review_input" rows="5" cols="57">' . $review_data . '</textarea><br><br>';
  // need to run a save and retrieve function to the database to make it useful :D
  ?>
  <div class="fields">
    <label class="blurb-label">
      Star Rating:
    </label><br>
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

  // now the dropdown!
  ?>
  <br><br>
  <label class="blurb-label">
    This fruit is...
  </label><br>
  <select name="fruit_dropdown" id="fruit_dropdown">
    <option name="drop" value="my favourite fruit" <?php
      if ($drop_data == 'my favourite fruit') {
        echo 'selected';
      }
    ?>>my favourite fruit</option>
    <option name="drop" value="a fruit I like" <?php
      if ($drop_data == 'a fruit I like') {
        echo 'selected';
      }
    ?>>a fruit I like</option>
    <option name="drop" value="a fruit I don't have strong opinions on" <?php
      if ($drop_data == "a fruit I don't have strong opinions on") {
        echo 'selected';
      }
    ?>>a fruit I don't have strong opinions on</option>
    <option name="drop" value="a fruit I dislike" <?php
      if ($drop_data == 'a fruit I dislike') {
        echo 'selected';
      }
    ?>>a fruit I dislike</option>
    <option name="drop" value="a fruit I hate" <?php
      if ($drop_data == 'a fruit I hate') {
        echo 'selected';
      }
    ?>>a fruit I hate</option>
  </select>

  <?php
  echo 'To you, this fruit is ' . $drop_data;
  ?>

  <!-- checkbox :') -->

  <?php
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
  // checking if someone has posted value to blurb_input into the metabox
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

  if (isset($_POST['fruit_dropdown'])) {
    update_post_meta($post_id, 'fruit_dropdown', sanitize_text_field($_POST['fruit_dropdown']));
  } else {
    delete_post_meta($post_id, 'fruit_dropdown');
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

// new metaboxes - for sport - 181021
// ==========================================

function add_sport_metabox() {
  add_meta_box(
    'sport_metabox',
    'blurb & is it contact?',
    'sport_metabox_callback',
    'sports',
    'normal'
  );
}

function sport_metabox_callback($post) {
  $sportblurb_data = get_post_meta($post->ID, 'sportblurb_input', true);

  $sportcontact_data = get_post_meta($post->ID, 'sportcontact_input', true);

  // blurb
  echo '<label for "sportblurb_input" class="blurb-label">Blurb</label><br>' .
  '<textarea id="sportblurb_input" name="sportblurb_input" rows="5" cols="57">' . $sportblurb_data . '</textarea><br><br>';

  // radiobox
  ?>
  <div class="fields">
    <label class="blurb-label">
      Is it a contact sport?
    </label><br>
    <div class="fields">
      <label>
        <input type="radio" name="sportcontact_input" value="contact" <?php
          if ($sportcontact_data == 'contact') {
            echo 'checked';
          }
        ?>> Contact Sport
      </label><br>
      <label>
        <input type="radio" name="sportcontact_input" value="non-contact" <?php
          if ($sportcontact_data == 'non-contact') {
            echo 'checked';
          }
        ?>> Non-contact Sport
      </label><br>
    </div>
  <?php
} //callback ends

add_action('admin_menu', 'add_sport_metabox');

function save_sport_metabox_data($post_id, $post) {
  $post_type = get_post_type_object($post->post_type);
  if (! current_user_can($post_type->cap->edit_post, $post_id)) {
    return $post_id;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  if ($post->post_type != 'sports') {
    return $post_id;
  }

  if (isset($_POST['sportblurb_input'])) {
    update_post_meta($post_id, 'sportblurb_input', sanitize_text_field($_POST['sportblurb_input']));
  } else {
    delete_post_meta($post_id, 'sportblurb_input');
  }

  if (isset($_POST['sportcontact_input'])) {
    update_post_meta($post_id, 'sportcontact_input', sanitize_text_field($_POST['sportcontact_input']));
  } else {
    delete_post_meta($post_id, 'sportcontact_input');
  }
  return $post_id;
} //end saving metabox data

add_action('save_post', 'save_sport_metabox_data', 10, 2);


// setting up custom taxonomies (for categories) for our custom post type sports
// ==============================================
function create_sport_taxonomy() {
  $labels = array(
    'name' => 'Custom Attributes',
    // shows in the front end, whatis seen as the category set of names
    'singular_name' => 'Attribute',
    'search_items' => 'Search Attributes',
    // so user can search
    'all_items' => 'All Attributes',
    'parent_item' => 'Parent Attribute',
    'parent_item_colon' => 'Parent Attribute:',
    // for how it displays on the dash
    'edit_item' => 'Edit Attribute',
    'update_item' => 'Update Attribute',
    'add_new_item' => 'Add new Attribute',
    'new_item_name' => 'New Attribute Name',
    'menu_name' => 'Attribute'
  );

  // within the function, register the taxonomy
  register_taxonomy(
    'attribute',
    // taxonomy key! the dataname for it! or whatevs!
    array('sports'),
    array(
      'hierarchical' => true,
      // taxonomy type- relates to the use of parents, whether you use them or not.
      'labels' => $labels,
      // pluggin in our labelsz
      'show_ui' => true
      // show it in the dashboard
    )
  );
  // wp funciton that takes our labels
  // 1st arg = taxonomy name
  // 2nd arg = custom post type u want to associate it to, taken as an array
  // 3rd arg = array of the labels and other taxonomy stuff, including taxonomy type
}

// action hoook to set up the custom taxonomy woowoo
add_action('init', 'create_sport_taxonomy', 0);
// taxonomies load up during the init
// priority number at the end. taxonomies need a priority of 0 (loaded up first) as they will not work if you load them too late

// creating a new taxonomy for fruit colours - 191021
// ======================================================
function create_colour_taxonomy() {
  $labels = array(
    'name' => 'Fruit Colours',
    'singular_name' => 'Colour',
    'search_items' => 'Search Fruit Colours',
    'all_items' => 'All Fruit Colours',
    'parent_item' => 'Parent Fruit Colours',
    'parent_item_colon' => 'Parent Fruit Colour:',
    'edit_item' => 'Edit Fruit Colour',
    'update_item' => 'Update Fruit Colour',
    'add_new_item' => 'Add new Fruit Colour',
    'new_item_name' => 'New Fruit Colour Name',
    'menu_name' => 'Fruit Colour'
  );

  register_taxonomy(
    'fruit-colour',
    array('fruit'),
    array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true
    )
  );
}

add_action('init', 'create_colour_taxonomy', 0);

// woocommerce checkout editing/customisation - 201021
// ======================================================

// hooking into the checkout fields
add_filter('woocommerce_checkout_fields', 'custom_placeholder');
// filter hook we r modifying an existing function
// 1st arg what we want to hook into
// 2nd arg callback function used to edit that

function custom_placeholder($fields) {
  // $fields is a woocommerce variable which inidicates all of the data relating to the fields in woocommerce. all of the fields on ur page you dont define it, you get it from woocommerce.

  $fields['order']['order_comments']['placeholder'] = 'New Placeholder for the order notes thingy';
  // fields found here (scroll downdowndown):
  // https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/

  $fields['order']['order_comments']['label'] = 'Delivery Instructions';
  // says delivery instructions on the frontend instead of order notes now >O<

  return $fields;
  // returning the updated variables and update with the filter hook !
}

add_filter('woocommerce_billing_fields', 'billing_update');

function billing_update($fields) {
  $fields['billing_phone']['required'] = false;
  $fields['billing_email']['required'] = false;
  return $fields;
}

// custom woocommerce field
// ================================

add_action('woocommerce_after_order_notes', 'custom_field');

function custom_field($checkout) {
  echo '<div id="custom_field"><h2>' . __('NEW FIELD!') . '</h2>';

  woocommerce_form_field( 'custom_field', array(
      'type'          => 'text',
      'class'         => array('my-field-class form-row-wide'),
      'label'         => __('Fill in this field'),
      'placeholder'   => __('this is the placeholdertext yoooooo'),
      ), $checkout->get_value( 'custom_field' ));
      // 1st arg is your field name
      // 2nd arg an array of field details

  echo '</div>';
}

// creating a custom section and adding to the theme customizer - 261021
// ======================================================

// https://codex.wordpress.org/Theme_Customization_API
// each one of the rows under wp customize is a section
// what renders the settings is called a control. the sections contain settings, and the controls render them out.

function my_first_customise_option($wp_customize) {
  // arg- you NEED to load the customize object in. it contains all of the customize data on your website.
  // now you can access different methods on that function
  $wp_customize->add_section('mos_section', array(
    'title' => 'my first section', 'custom_setting',
    // what will show for the front end user
    // the end part is the ID
    'priority' => 0
    // when it runs runs runs or shows shows shows
    // use multiples of 50 for the number! yepyep
  ));
  // 1st arg - section name
  // 2nd arg - like labels / config but this one is basic so we'll just have a lil array of two things.

  // every section needs a SETTING and CONTROL
  // now we're making the SETTING. add a new setting
  $wp_customize->add_setting('my_custom_message', array(
    'default' => ''
    // default is just defining the default value. it could be anything. lol its like the placeholder text sparklesparkle
  ));
  // this takes similar arguments

  // add the control that renders the setting
  $wp_customize->add_control('my_custom_message', array(
    'label' => 'Enter a custom message',
    // what it will show above the input
    'section' => 'mos_section',
    // the section the control is linked to.
    'settings' => 'my_custom_message',
    // what setting it is going to render from.
    'type' => 'textarea'
    // what type of field we want so that wp will render it out for us :D
  ));
  // same args again

  // new setting and control- make the page header EDITABLE and not static anymore.
  // ===============================
  $wp_customize->add_setting('edit_title', array(
    'default' => 'Enter a new title!'
  ));

  $wp_customize->add_control('edit_title', array(
    'label' => 'Enter the title',
    'section' => 'mos_section',
    'settings' => 'edit_title',
    'type' => 'text'
  ));

  // number number, could be the setting you use for the excerpt
  $wp_customize->add_setting('my_custom_number', array(
    'default' => 0
  ));

  // control for tha number.
  $wp_customize->add_control('my_custom_number', array(
    'label' => 'Enter the number',
    'section' => 'mos_section',
    'settings' => 'my_custom_number',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 0,
      'max' => 10
      // setting the min and max number u can put in
    )
    // input attributes
  ));

} //end funct

add_action('customize_register', 'my_first_customise_option');
// action hook 2 register the section lesgo

// new section
// ===================

function edit_bootstrap($wp_customize) {
  $wp_customize->add_section('bootstrap_section', array(
    'title' => 'Adjusting col sizes!', 'custom_setting',
    'priority' => 0
  ));

  $wp_customize->add_setting('bs_number', array(
    'default' => 4
  ));

  $wp_customize->add_control('bs_number', array(
    'label' => 'Enter the number',
    'section' => 'bootstrap_section',
    'settings' => 'bs_number',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 1,
      'max' => 12
    )
  ));

  $wp_customize->add_setting('excerpt_length_new', array(
    'default' => 20
  ));

  $wp_customize->add_control('excerpt_length_new', array(
    'label' => 'Enter the new excerpt length',
    'section' => 'bootstrap_section',
    'settings' => 'excerpt_length_new',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 5,
      'max' => 55
    )
  ));
}

add_action('customize_register', 'edit_bootstrap');

function control_update_excerpt() {
  return get_theme_mod('excerpt_length_new');
}
// updating the excerpt length whenever you do
add_filter('excerpt_length', 'control_update_excerpt');

?>
