<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>PHP Basics</title>
	</head>
	<body>

    <div class="col-12">
      <?php include 'nav.php';?>
    </div>

    <div class="container">
      <?php include 'first-exercise.php';?>
      <?php include 'arrays.php';?>

			<h1>object..!!</h1>
			<?php
			class Object {
				public $name;
				public $age;
				public function __construct($name, $age) {
					$this->name = $name;
					$this->age = $age;
				}
				public function message() {
					return 'i am ' . $this->name . ' and i am ' . $this->age . ' years old !!!';
				}
			}

			$myself = new Object('mo', '20');
			echo $myself -> message();
			echo '<br>';
			?>

			<br>
			<?php include 'functions.php';?>

    </div>

    <div class="col-12">
      <?php include 'footer.php';
      echo $footervar;?>
    </div>

	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
