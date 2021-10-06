<?php
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'shopbros';

// Connect directly to the database on phpmyadmin
$db = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error());

// print_r($_POST);

// isset checks for a boolean value - testing if the post submit button is set
if (isset($_POST['submit'])) {
  $new_product_query = "INSERT INTO products(title, description, imgUrl, price)
                     VALUES('" . htmlspecialchars($_POST['titleName']) . "',
                     '" . htmlspecialchars($_POST['descName']) . "',
                     '" . htmlspecialchars($_POST['imgName']) . "',
                     '" . htmlspecialchars($_POST['priceName']) . "')
                     ";

                     if (mysqli_query($db, $new_product_query)) {
                       // echo 'very cool product added: ' . $new_product_query;
                       header("Refresh:0, url=index.php");
                     } else {
                       echo 'error creating record: ' . mysqli_error($db);
                     }
} //if submit ENDS


?>
