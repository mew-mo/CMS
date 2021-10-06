<!doctype html>
<html lang="en">

<!-- oct 05 - oct 07 -->

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>PHP DATABASES YO</title>
	</head>
	<body>

    <div class="col-12">
      <?php include 'nav.php';?>
    </div>

    <div class="container mt-5">
      <h1>Databases in PHP</h1>
      <?php include 'database_connection.php';?>
    </div>

		<!-- table for PEOPLE TABLE NEW DB -->
		<!-- ==================================== -->
    <!-- <div class="col-3 offset-md-1 mt-5 pl-5">
			<form action="action.php" method="post">
			  <div class="form-group">
			    <label for="enterName">Enter Name</label>
			    <input type="text" name="enterNameBro" class="form-control" id="enterName" aria-describedby="emailHelp" placeholder="Enter name...">
			    <small id="emailHelp" class="form-text text-muted">i bet you have the coolest name ever</small>
			  </div>
			  <div class="form-group">
			    <label for="enterSalary">Enter Salary</label>
			    <input type="text" name="enterSalaryBro" class="form-control" id="enterSalary" placeholder="Enter salary...">
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
    </div> -->

		<!-- table for DUDES TABLE DUDES DB -->
		<!-- ==================================== -->
		<div class="col-3 offset-md-1 mt-5 pl-5">
			<form action="action.php" method="post">
				<!-- form action and method to submit stuff!! wow -->
				<div class="form-group">
					<label for="enterName">Enter Name</label>
					<input type="text" name="enterNameBro" class="form-control" id="enterName" aria-describedby="emailHelp" placeholder="Enter name...">
					<small id="emailHelp" class="form-text text-muted">i bet you have the coolest name ever</small>
				</div>
				<div class="form-group">
					<label for="enterAge">Enter Age</label>
					<input type="text" name="enterAgeBro" class="form-control" id="enterAge" placeholder="Enter age...">
				</div>
				<div class="form-group">
					<label for="enterEye">Enter Eye Colour</label>
					<input type="text" name="enterEyeBro" class="form-control" id="enterEye" placeholder="Enter eye colour...">
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>

	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
