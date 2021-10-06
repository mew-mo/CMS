<?php

$hostname = 'localhost';
$username = 'root';
$password = 'root';

$database = 'instagram';

// Connect directly to the database on phpmyadmin
$db = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error());

// SET UP INITIAL TABLE
// ==================================
// $new_table_query = 'CREATE TABLE links(
//                     id INT AUTO_INCREMENT,
//                     linkName VARCHAR(30) NOT NULL,
//                     icon VARCHAR(30),
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

// $con = new mysqli($hostname, $username, $password);
//
// if ($con) {
//   echo 'phpmyadmin DATABASE CONNECTED! <br><br>';
// }
//
// if ($con -> connect_error) {
//   die('<br><br>Connection failed: ' . $con->connect_error);
// }
//
// $query = "CREATE DATABASE " . $database;
// if ($con->query($query) == TRUE) {
//   echo "<br><br>db was made: " . $database . " created successfully!";
// } else {
//   echo "<br><br>database creation failed: " . $con->error;
// }

// NEW RECORD
// ==========================================

// $new_link_query = "INSERT INTO links(linkName,icon)
//                VALUES('Feed', 'home'),
//                ('Explore', 'search'),
//                ('Trending Tags', ''),
//                ('Top Posts', ''),
//                ('Explore Posts', ''),
//                ('Notifications', 'notifications'),
//                ('Direct', 'email'),
//                ('Profile', 'person')
//               ";
//
// if (mysqli_query($db, $new_link_query)) {
//   echo 'very cool link added: ' . $new_link_query;
// } else {
//   echo 'error creating link: ' . mysqli_error($db);
// }

// PRINTING
// =========================================

// show all links is a QUERY
$show_all_links = "SELECT id, linkName, icon FROM links";
$result = $db->query($show_all_links);

if ($result->num_rows > 0) {
  // Output data from each row
  while ($row = $result->fetch_assoc()) {
    ?>
    <span class="material-icons inline float-left mr-3" style=
    "cursor:pointer;"><?php echo $row["icon"]?></span>
    <h6 class="inline float-left mt-1" style=
    "cursor:pointer;"><?php echo $row["linkName"]?></h6> <br> <br>
    <?php
  }
} else {
  echo 'no results yo??';
}

?>
