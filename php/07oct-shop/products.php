<?php

$hostname = 'localhost';
$username = 'root';
$password = 'root';

$database = 'shopbros';

// Connect directly to the database on phpmyadmin
$db = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error());

// 2. SET UP INITIAL TABLE
// ==================================
// $new_table_query = 'CREATE TABLE products(
//                     id INT AUTO_INCREMENT,
//                     title VARCHAR(30) NOT NULL,
//                     description VARCHAR(550) NOT NULL,
//                     imgUrl VARCHAR(1000) NOT NULL,
//                     price INT NOT NULL,
//                     primary key(id)
//                   )';
//
// if (mysqli_query($db, $new_table_query)) {
//   echo 'table created successfully! its really cool';
// } else {
//   echo 'error creating table: ' . mysqli_error($db);
// }

// 1. create tha database connection :>
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

// 3. NEW RECORD --> see ACTION.PHP
// ==========================================

// 4. PRINTING
// =========================================

// show all users is a QUERY
$show_all_products = "SELECT id, title, description, imgUrl, price FROM products";
$result = $db->query($show_all_products);

if ($result->num_rows > 0) {
  // Output data from each row
  while ($row = $result->fetch_assoc()) {
    ?>
    <div class="col-4 pr-5">
      <div class="card mt-5" style="width: 18rem;">
        <img src="<?php echo $row["imgUrl"]?>" alt="<?php echo $row["title"]?> image">
        <div class="card-body">
          <h5 class="card-title inline float-left"><?php echo $row["title"]?></h5>
          <p class="inline float-right text-secondary">$<?php echo $row["price"]?></p>
          <p class="card-text float-left inline"><?php echo $row["description"]?></p>
        </div>
        <a href="index.php?delete=true&id=<?php echo $row["id"]?>" type="button" name="delete" id="<?php echo $row["id"]?>" style="margin-left:75%; margin-top:-20px; padding: 10px;"">Delete</a>
      </div>
    </div>
    <?php
  }
} else {
  echo 'no results yo??';
}

if (isset($_GET['delete'])) {
  $id = $_GET['id'];
  $delete_query = "DELETE FROM products WHERE id=$id";

  if (mysqli_query($db, $delete_query)) {
    // echo 'deleted: ' . $delete_query;
    header("Refresh:0, url=index.php");
  } else {
    echo 'error deleting record: ' . mysqli_error($db);
  }
}

?>
