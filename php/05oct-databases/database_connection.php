<?php

$hostname = 'localhost';
$username = 'root';
$password = 'root';

$database = 'new_db';
// go in ur db and go to SQL -> type CREATE DATABASE "hdsjdsnamedsjkdsf"-- shown after the con error in here!
// mysql is all caps


// create tha database connection :>

// normal practise to call it con - this is short for connection
$con = new mysqli($hostname, $username, $password);
// mysqli is the php function that connects with the db. takes arguments for authentication

if ($con) {
  echo 'DATABASE CONNECTED! <br><br>';
  print_r($con);
  // you cannot echo the connection, itll break
}

if ($con -> connect_error) {
  die('<br><br>Connection failed: ' . $con->connect_error);
}

// $query is OUR query and we're sending it through as a new database query.
$query = "CREATE DATABASE " . $database;
if ($con->query($query) == TRUE) {
  echo "<br><br>db was made: " . $database . " created successfully!";
} else {
  echo "<br><br>database creation failed: " . $con->error;
}

?>
