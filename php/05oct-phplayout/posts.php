<?php

$posts = array(
  '1' => array(
    'title' => 'Step-By-Step SEO for an International Website',
    'description' => '',
    'date' => 'Posted on Tuesday 17th June 2014'
  ),
  '2' => array(
    'title' => '3 Minute Read - Translating your Slogan?',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Libero justo laoreet sit amet. Mauris augue neque gravida in. Viverra ipsum nunc aliquet bibendum enim facilisis. Dolor sit amet consectetur adipiscing. Quis lectus nulla at volutpat.',
    'date' => 'Posted on Monday 16th April 2014'
  ),
  '3' => array(
    'title' => 'What Makes Google Tick?',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Rutrum tellus pellentesque eu tincidunt tortor. Fermentum iaculis eu non diam phasellus vestibulum lorem sed risus. Sit amet purus gravida quis blandit turpis. Nunc aliquet bibendum enim facilisis gravida neque convallis a cras. In egestas erat imperdiet sed euismod nisi porta lorem mollis.',
    'date' => 'Posted on Monday 2nd June 2014'
  )
);
?>

<div class="col-7 posts mt-4">
<?php
foreach ($posts as $singlePost) {?>

  <div class="mt-5">
    <?php
    echo '<p class="text-secondary">' . $singlePost['date'] . '</p>';
    echo '<h2>' . $singlePost['title'] . '</h2><br>';
    echo '<p>' . $singlePost['description'] . '</p><br>';
    ?>
    <button type="button" class="btn btn-primary" style="border: 2px solid #4FE8CA; color:#4FE8CA; background:white;">Read More ></button>
    <hr>
  </div>
  <?php
}
?>
</div>
