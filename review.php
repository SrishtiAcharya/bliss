<?php
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Review Us | Bliss</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="icon" href="img/logo3circler.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="icon" href="img/logo3circler.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap" rel="stylesheet">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<!--- css link-->
	<link rel="stylesheet" href="formcss.css">
	<?php
	$error_message = "";$success_message = "";

	// Register user
	if(isset($_POST['revsub'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $rev1 = trim($_POST['rev1']);


		$isValid = true;

		// Check fields are empty or not
		if($name == '' || $email == '' || $rev1 == ''){
			$isValid = false;
			$error_message = "Please fill all fields.";
		}


		// Check if Email-ID is valid or not
		if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  	$isValid = false;
		  	$error_message = "Invalid Email-ID.";
		}


		// Insert records
		if($isValid){
			$insertSQL = "INSERT INTO review(name, email, rev1) values(?,?,?)";
			$stmt = $con->prepare($insertSQL);
			$stmt->bind_param("sss",$name, $email, $rev1);
			$stmt->execute();
			$stmt->close();

			$success_message = "Review posted successfully.";
		}
	}
	?>
</head>
<body><div id="home">
	<div class="navbar">
	<div class="logo">
		<a href="index.html"><img src="img/logo3bg.png" alt="Bliss | Beauty Products Website " width="90px" height="90px" class="centre"></a>
	</div>
	<nav>
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="checkout.html"> <img src="img/checkout.png" width="20px" height="20px"></a></li>
		</ul>
	</nav>
</div>
</div>
	<div class='container'>
		<div class='row'>

				<form method='post' action=''>
					<?php
					// Display Error message
					if(!empty($error_message)){
					?>
						<div class="alert alert-danger">
						  	<strong>Error!</strong> <?= $error_message ?>
						</div>

					<?php
					}
					?>

					<?php
					// Display Success message
					if(!empty($success_message)){
					?>
						<div class="alert alert-success">
						  	<strong>Success!</strong> <?= $success_message ?>
						</div>

					<?php
					}
					?>

					<div class="form-group">
            <h2>PRODUCTS</h2>
            <h4>CATEGORY 1 : BODY WASH</h4> <br><br>
					</div>
					<div class="form-group">
            <h4>Illusion Body Wash</h4> <br>
            <img src="products/body/wash1.jpg" class="image-resize"><br>
					</div>
					<div class="form-group">
            <h4>Plum Body Wash</h4> <br>
            <img src="products/body/wash2.jpg" class="image-resize"><br>
					</div>
					<div class="form-group">
            <h4>Mystic Lavender Body Wash</h4> <br>
            <img src="products/body/wash3.jpg" class="image-resize"><br>
					</div>
          <div class="form-group">
            <h4>Nivea Shower Gel</h4> <br>
            <img src="products/body/wash4.jpeg" class="image-resize"><br>
          </div><br><br>
          <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" class="form-control" name="name" id="name" required="required" maxlength="200"> <br>
          </div>
          <div class="form-group">
					    <label for="email">Email address:</label>
					    <input type="email" class="form-control" name="email" id="email" required="required" maxlength="200"><br>
					</div>
          <div class="form-group">
            <label for="treat">Share your thoughts here ... </label>
            <textarea name="rev1" rows="8" cols="8" id="rev1" placeholder="Write here ..."></textarea>
          </div>
							<br>
              <button type="submit" name="revsub" class="book">Send</button>
          </form>
				</div>

			</div>
	</div>
	    <!-- footer -->
	    <footer>
	      <div id="contact">
	        <div class="rowf">
	          <div class="colf">
	            <img src="img/logo3circler.png" class="logof">
	            <p>Bliss is a collaborative project developed and designed by
	            <a href="https://srishtiacharya.github.io/Portfolio/" target="_blank"><span class="srishti">Srishti Acharya</span></a> and <a href="https://in.linkedin.com/in/rachi-wasnik-4b6a65232" target="_blank"><span class="rachi">Rachi Wasnik</span></a>. We are 3<sup>rd</sup> Year Computer Science Students.
	            This is just a prototype for beauty salon and products e-commerce website using HTML, CSS, JavaScript.<br><br></p>
	          </div>
	          <div class="colf">
	            <h3>Office <div class="underline"> <span></span> </div> </h3>
	            <p>MIT AOE Rd, Kate Patil Nagar, Alandi</p>
	            <p>Pune, Maharashtra, India, 412105</p>
	            <p class="email-id">query@bliss.com</p>
	            <h4>022 - 01234567</h4>
	          </div>
	          <div class="colf">
	            <h3>Links <div class="underline"> <span></span> </div> </h3>
	            <ul>
								<li><a href="index.html">Home</a></li>
	              <li><a href="index.html">Besties</a></li>
	              <li> <a href="book.php">Appointment</a> </li>
	              <li><a href="index.html">Brands</a></li>
								<li><a href="shop.html">Shop</a></li>
	            </ul>
	            <br><br>
	            <div class="social-icons">
	              <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
	              <a href="https://twitter.com" target="_blank"> <i class="fab fa-twitter"></i></a>
	              <a href="https://www.instagram.com" target="_blank"> <i class="fab fa-instagram"></i></a>
	              <a href="https://www.pinterest.com" target="_blank"> <i class="fab fa-pinterest"></i></a>
	            </div>
	          </div>
	        </div>
	        <hr>
	        <p class="copyrightf">Copyright &#169; Bliss, 2022. | Designed, Developed and Managed by MITAOE Students of TY BTECH CSE.</p>
	      </div>
	    </footer>
</body>
</html>
