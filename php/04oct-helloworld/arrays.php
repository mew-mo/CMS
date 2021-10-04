  <h1>arrays!</h1>
<?php
$cars = array('big car', 'little car', 'normal car');
print_r($cars);
echo '<br>the third car is ' . $cars[2];

$people = array(
  'joe' => 'blond',
  'nancy' => 'brunette',
  'dude' => 'red'
);
echo '<br>';
print_r($people);
echo '<br> their hair colour is ' . $people['nancy'];
?>
<h3>loop through array</h3>
<?php

foreach($people as $person) {
   echo '<br>' . $person . '<br>';
} ?>
<!-- // creating a variable called person - saying go through this people array and make each item into a person -->

<div class="row">
<?php
foreach($people as $key => $person) { ?>
  <!-- closing the php bracket to dip into html then opening php within the html to echo the stuff and things -->
  <div class="col-4">
    <p><?php echo $key . ' has ' . $person . ' hair';?></p>
  </div>
  <!-- echo $key . ' has ' . $person . ' hair<br>'; -->
  <?php
}

  $animals = array(
    'cat' => 'small animal that thinks its a big feline',
    'fox' => 'dog, but make it evil for fun',
    'wolf' => 'dog, but make it bigger and awoo and all that'
  );

  foreach($animals as $key => $description) { ?>
    <!-- closing the php bracket to dip into html then opening php within the html to echo the stuff and things -->
    <div class="col-4">
      <h3><?php echo 'THE ' . $key?></h3>
      <p><?php echo $key . ' - ' . $description;?></p>
    </div>
    <!-- echo $key . ' has ' . $person . ' hair<br>'; -->
    <?php
  }
?>
</div>

<h1>looplooploops</h1>
<h6>NORMAL LOOP not FOREACH</h6>
<?php
  for($i = 0; $i < 10; $i ++) {
    $number = 10 * $i;
    echo 'new number alert! its now at ' . $number . '<br>';
  }
?>

<h3>loops again.</h3>
<h6>rendering html in the middle of the loop! >:0</h6>

<?php

for($i = 1; $i <= 10; $i ++) {
  // echo $i . ' oooooohoohoo <br>';
  ?>
  <!-- html goes here :P -->
  <p>the value of i! what could it be! it is: <?php echo '<b style="color:red;">' . $i . '</b>'; ?></p>
  <?php
}
// comment out only inbetween the php tags otherwise its gonna freak out at u LOL

?>
