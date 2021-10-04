<h1>PHP FUNCTIONS >:0</h1>

<?php
function hello() {
  echo 'HEWWO? <br>';
}

hello();

function addNums($x) {
  echo $x + 2;
}

addNums(6);
?>

<br>

<?php
$firstNum = 10;
$secondNum = 1;

if ($firstNum > $secondNum) {
  echo $firstNum . ' is waay bigger than ' . $secondNum;
} else {
  echo $firstNum . ' is waay less than ' . $secondNum;
}
?>

<!-- margin top 5 bootstrap -->
<h1 class="mt-5">php ARRAY WITHIN AN ARRAY?</h1>
<?php

$allClothes = array(
  '1' => array(
    'name' => 'cool hat',
    'description' => 'literally the coolest hat youve seen',
    'price' => 250
  ),
  '2' => array(
    'name' => 'some shoes',
    'description' => 'it\'s a pair of shoes. they\'re okay.',
    'price' => 2
  ),
  '3' => array(
    'name' => 'MEGASHIRT',
    'description' => 'this shirt is pretty big',
    'price' => 12
  ),
  '4' => array(
    'name' => 'pants (long)',
    'description' => 'pants that only work if you are long enough to wear them',
    'price' => 20
  )
);?>

  <div class="row mt-5">
  <?php
  foreach ($allClothes as $clothingItem) {?>

    <div class="col-3">
      <?php
      echo '<h3>' . $clothingItem['name'] . '</h3><br>';
      echo '<p> $' . $clothingItem['price'] . '</p><br>';
      echo '<p>' . $clothingItem['description'] . '</p><br>';
      ?>

    </div>
    <?php
  }
  ?>
</div>
