<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	?>
	<title>Email System</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="page-header">
		  <h1>Contact Us <small></small></h1>
		</div>
		<div class="row">
			<div class="col-md-3">
			
				
			</div>
			<div class="col-md-6">
				<form method ="POST" action = "sentemail.php" enctype="multipart/form-data">
					  <div class="form-group">
						<label for="exampleInputEmail1">Sent To</label>
						<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">Subject</label>
						<input type="text" name="Subject" class="form-control"  placeholder="Enter Your Subject">
					  </div>
					  <div class="form-group">
						<label >Body :</label>
						<textarea class="form-control" name="body" row="5"></textarea>
					  </div>
					  <div class="form-group">
						<label for="exampleInputFile">Chose Your File</label>
						<input name="file" type="file" id="exampleInputFile">
					  </div>
					  <button type="submit" class="btn btn-default">Submit</button>
				</form>
				<br>
				
				 <?php
                if(!empty($_SESSION["IdValidation"]))
                    {
						echo "<div class='alert alert-info' >";
                        echo $_SESSION["IdValidation"];
                        session_unset();
                        session_destroy();
						echo "</div>";
                    }
                ?> 
				
				
				
			</div>
			<div class="col-md-3">
			
				
			</div>
			
		</div>
	</div>
</body>
</html>

