<?php

/*

Plugin Name: WORLDS BEST CALCULATERBOT VER 0325

Plugin URI: http://placeholder.com

Description: THE BEST CALCULATOR OF ALL TIME

Version: 0.0.1

Author: Mo

Author URI: http://placeholder.com

License: GPLv2 or later

*/

// the calculator!
// ===============================================
function calc_shortcode() {
  return '
  <div class="calc-tainer">
  <div class="calculator">
    <div class="input" id="input"></div>
    <div class="buttons">
      <div class="operators">
        <div>+</div>
        <div>-</div>
        <div>&times;</div>
        <div>&divide;</div>
      </div>
      <div class="leftPanel">
        <div class="numbers">
          <div>7</div>
          <div>8</div>
          <div>9</div>
        </div>
        <div class="numbers">
          <div>4</div>
          <div>5</div>
          <div>6</div>
        </div>
        <div class="numbers">
          <div>1</div>
          <div>2</div>
          <div>3</div>
        </div>
        <div class="numbers">
          <div>0</div>
          <div>.</div>
          <div id="clear">C</div>
        </div>
      </div>
      <div class="equal" id="result">=</div>
    </div>
    </div>
    </div>
  ';
}

add_shortcode('bestcalculator', 'calc_shortcode');

// add js and jquery to tha plugin :D
// ===============================================
function calc_plugin_scripts() {
  wp_enqueue_script('jquery-plugin-script-calc', plugin_dir_url(__FILE__) . 'js/jquery.min.js');
  // 1st arg is the name of the script in an id, you have to make sure its different from any other youve used in the website
  // 2nd arg is telling where the plugin directory is to access the link

  wp_enqueue_script('customjs-plugin-script-calc', plugin_dir_url(__FILE__) . 'js/custom.js');
}

add_action('wp_enqueue_scripts','calc_plugin_scripts');
// 1st arg when to run
// 2nd arg callback

// add in a css file
// ===============================================
wp_enqueue_style('custom-plugin-css-calc', plugin_dir_url(__FILE__) . 'css/custom.css');

?>
