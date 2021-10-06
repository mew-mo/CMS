<?php

$hostname = 'localhost';
$username = 'root';
$password = 'root';

// $database = 'new_db';
// new-db is the one with the names and salary
$database = 'dudes';
// dudes has eyecolor
// go in ur db and go to SQL -> type CREATE DATABASE "hdsjdsnamedsjkdsf"-- shown after the con error in here!
// mysql is all caps

// Connect directly to the database on phpmyadmin
$db = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error());

// print_r($db);

// SET UP INITIAL TABLE
// ==================================
// $new_table_query = 'CREATE TABLE people(
//                     id INT AUTO_INCREMENT,
//                     name VARCHAR(50) NOT NULL,
//                     salary INT NOT NULL,
//                     primary key(id)
//                   )';
//
// if (mysqli_query($db, $new_table_query)) {
//   echo 'table created successfully! its really cool';
// } else {
//   echo 'error creating table: ' . mysqli_error($db);
// }

// create tha database connection :>
// ======================================

// normal practise to call it con - this is short for connection
// $con = new mysqli($hostname, $username, $password);
// // mysqli is the php function that connects with the db. takes arguments for authentication
//
// if ($con) {
//   echo 'phpmyadmin DATABASE CONNECTED! <br><br>';
//   // print_r($con);
//   // you cannot echo the connection, itll break
// }
//
// if ($con -> connect_error) {
//   die('<br><br>Connection failed: ' . $con->connect_error);
// }

// $query is OUR query and we're sending it through as a new database query.
// $query = "CREATE DATABASE " . $database;
// if ($con->query($query) == TRUE) {
//   echo "<br><br>db was made: " . $database . " created successfully!";
// } else {
//   echo "<br><br>database creation failed: " . $con->error;
// }

// TABLE LAYOUT
// ==========================================
// create table users(
//   id INT AUTO_INCREMENT,
//   // auto increment will automatically add one to each new piece of data. so every id will go up by one. thats cool.
//   name VARCHAR(30) NOT NULL,
//   // varchar. its a string. cool. not null is to validate the information and enforce that it is required- php will return an error if it is blank.
//   salary INT NOT NULL,
//   primary key (id)
// )

// NEW RECORD
// ==========================================

// $new_person_query = "INSERT INTO people(name,salary)
//                VALUES('Mo', '2'),
//                ('Egg', '12'),
//                ('Blue', '323'),
//                ('BMO', '500')
//               ";
//
// if (mysqli_query($db, $new_person_query)) {
//   echo 'very cool person added: ' . $new_person_query;
// } else {
//   echo 'error creating person: ' . mysqli_error($db);
// }

// PRINTING
// =========================================

// show all users is a QUERY
// $show_all_users = "SELECT id, name, salary FROM people";
// $result = $db->query($show_all_users);
//
// if ($result->num_rows > 0) {
//   // Output data from each row
//   while ($row = $result->fetch_assoc()) {
//     echo '<div> Name: '.$row["name"]. ' Salary: ' . $row["salary"] . '</div>';
//   }
// } else {
//   echo 'no results yo??';
// }

?>
