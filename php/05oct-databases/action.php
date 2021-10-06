<?php

// echo "hi there " . htmlspecialchars($_POST['enterNameBro']) . "!<br> wow, you make $" . htmlspecialchars($_POST['enterSalaryBro']);

// htmlspecialchars($_POST['enterNameBro']);
// filters an input to remove html and js, just to make sure people dont try hack ur form by putting html in it
// like. you cant type <h1> mo </h1> into the form anymore it wont display like that!! :D

$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'dudes';

// Connect directly to the database on phpmyadmin
$db = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error());

// print_r($_POST);

// isset checks for a boolean value - testing if the post submit button is set
if (isset($_POST['submit'])) {
  $new_dude_query = "INSERT INTO people(name, age, eyecolor)
                     VALUES('" . htmlspecialchars($_POST['enterNameBro']) . "',
                     '" . htmlspecialchars($_POST['enterAgeBro']) . "',
                     '" . htmlspecialchars($_POST['enterEyeBro']) . "')
                     ";

                     if (mysqli_query($db, $new_dude_query)) {
                       echo 'very cool person added: ' . $new_dude_query;
                     } else {
                       echo 'error creating record: ' . mysqli_error($db);
                     }
} //if submit ENDS

// template query
// if (isset($_POST['submit'])) {
  // $new_dude_query = "INSERT INTO dudes(name, age, eyecolor)
  //                    VALUES('Mo', '20', 'hazel'),
  //                    ('Ninja', '8', 'green'),
  //                    ('Tris', '18', 'brown'),
  //                    ('Chlo', '20', 'brown')
  //                    ";
// }

?>
