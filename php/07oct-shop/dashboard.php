<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>PHP SHOP TIME</title>
	</head>
	<body>

    <div class="nav col-12">
      <?php include 'nav.php'?>
    </div>

    <div class="container mt-5">
      <form action="action.php" method="post">
				<!-- form action and method to submit stuff!! wow -->
				<div class="form-group">

          <div class="form-row">
            <div class="form-group col-6">
              <label for="enterTitle">Enter Product Title</label>
              <input type="text" name="titleName" class="form-control" id="enterTitle" aria-describedby="emailHelp" placeholder="Enter product title...">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-6">
              <label for="enterDescription">Enter Description</label>
              <textarea class="form-control" rows="3" type="text" name="descName" class="form-control" id="enterDescription" placeholder="Enter description..."></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-4">
              <label for="enterImg">Enter Image URL</label>
              <input type="text" name="imgName" class="form-control" id="enterImg" placeholder="Enter image url...">
            </div>
            <div class="form-group col-2">
              <label for="enterPrice">Enter Price</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">$</div>
                </div>
                <input type="text" name="priceName" class="form-control" id="enterPrice" placeholder="Enter the price...">
              </div>
            </div>
          </div>

          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
			</form>
    </div>

	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
