<?php

$hostname = 'localhost';
$username = 'root';
$password = 'root';

$database = 'instagram';

// Connect directly to the database on phpmyadmin
$db = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error());

// SET UP INITIAL TABLE
// ==================================
// $new_table_query = 'CREATE TABLE posts(
//                     id INT AUTO_INCREMENT,
//                     username VARCHAR(30) NOT NULL,
//                     likes INT NOT NULL,
//                     postedAt VARCHAR(50) NOT NULL,
//                     imgUrl VARCHAR(1000) NOT NULL,
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

// $new_post_query = "INSERT INTO posts(username,likes,postedAt,imgUrl)
//                VALUES('cannyball', '505', '3 hours ago', 'https://via.placeholder.com/300'),
//                ('Greg_Dillain', '243', '3 hours ago', 'https://via.placeholder.com/300'),
//                ('ranemagno', '854', '4 hours ago', 'https://via.placeholder.com/300'),
//                ('Kelly_Official', '914', '5 hours ago', 'https://via.placeholder.com/300'),
//                ('ninjathecat', '374', '7 hours ago', 'https://via.placeholder.com/300'),
//                ('dwlrma', '426', '8 hours ago', 'https://via.placeholder.com/300')
//               ";
//
// if (mysqli_query($db, $new_post_query)) {
//   echo 'very cool post added: ' . $new_post_query;
// } else {
//   echo 'error creating post: ' . mysqli_error($db);
// }

// PRINTING
// =========================================

// show all users is a QUERY
$show_all_users = "SELECT id, username, likes, postedAt, imgUrl FROM posts";
$result = $db->query($show_all_users);

if ($result->num_rows > 0) {
  // Output data from each row
  while ($row = $result->fetch_assoc()) {
    ?>
    <div class="col-4 pr-5">
      <div class="card mt-5" style="width: 18rem;">
        <img class="" src="<?php echo $row["imgUrl"]?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title inline"><?php echo $row["username"]?></h5>
          <p class="card-text float-left inline"><?php echo $row["postedAt"]?></p>
          <p class="float-right inline"><?php echo $row["likes"]?> ♡</p>
        </div>
      </div>
    </div>
    <?php
  }
} else {
  echo 'no results yo??';
}

?>
