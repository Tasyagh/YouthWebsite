<?php require_once 'connect.php'; ?>
<?php 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: YouthLogIn.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: Main.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Online Information Website For Youth</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

/* Center website */
.main {
  max-width: 1000px;
  margin: auto;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  margin:0px;
  //background-image: url('b4.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
  color:black;
}

* {
box-sizing: border-box;
}

input[type=text] {
  width: 600px;
  height: 40px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 18px;
  box-sizing: border-box;
  color: black;

}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  font-size: 16px;
  align: center;
}

input[type=submit] {
  background-color: #004680;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 18px;
  cursor: pointer;
  float: center;
  margin: 20px 0;
  width: 30%;
}

input[type=submit]:hover {
  background-color: #1b3c57;
}

.container {
  border-radius: 5px;
  background-color: rgb(255, 255, 255, 0.9);
  padding: 20px;
  width: 1300px;
}


/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

.jumbotron {
    background-color: #2d2d30;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
  
.navbar {
    font-family: Montserrat, sans-serif;
    margin-bottom: 0;
    background-color: #2d2d30;
    border: 0;
    font-size: 11px !important;
    letter-spacing: 4px;
    opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
    color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
    color: #fff !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }
  .open .dropdown-toggle {
    color: #fff;
    background-color: #555 !important;
  }
  .dropdown-menu li a {
    color: #000 !important;
  }
  .dropdown-menu li a:hover {
    background-color: red !important;
  }

</style>
</head>


<!--navbar-->
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	 
      <a class="navbar-brand" href="#myPage"> 
   <b><img src="youthLogoo.png" alt="Logo" style="width:80px;height:20px"> ONLINE INFORMATION WEBSITE FOR YOUTH</b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="YouthMainPage.php">HOME</a></li>
        <li><a href="YouthMainPage.php">ABOUT US</a></li>
		<li><a href="#profile">EDIT PROFILE</a></li>
		<li><a href="youthnews.php">NEWS</a></li>
        <li><a href="Main.php">LOG OUT</a></li>
      </ul>
    </div>
  </div>
</nav>


<!--Big header-->
<div class="jumbotron text-center">
  <h1>EDIT PROFILE</h1> 
  <p>Edit your profile if you want to change something..</p> 
  <br>
</div>


<!--details form-->
<div id="profile" class="container" align="center">
<form method="post" action="insertDetails.php">
<?php
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'youthwebsite');
?>

<?php

	$currentUser = $_SESSION['username'];
	$sql = "SELECT * FROM youth WHERE username='$currentUser'";
	
	$gotResults = mysqli_query($db,$sql);
	
	if($gotResults)
	{
		if(mysqli_num_rows($gotResults)>0)
		{
			while($row = mysqli_fetch_array($gotResults))
			{
				?>
				
					<div class="row">
						<div class="col">
							<label for="title">USER NAME </label><br>
							<input type="text" name="username" value="<?php echo $row['username']; ?> "  placeholder="Your full name same as IC .." required>
						</div><br>
					</div>
					
					<div class="row">
						<div class="col">
							<label for="title">FULL NAME </label><br>
							<input type="text" name="fullName" value="<?php echo $row['fullName']; ?> "  placeholder="Your full name same as IC .." required>
						</div><br>
					</div>
					
					<div class="row">
						<div class="col">
							<label for="title">Email </label><br>
							<input type="text" name="email" value="<?php echo $row['email']; ?> "  placeholder="Your email .." required>
						</div><br>
					</div>
				   
					<div class="row">	
						<div class="col">
							<label for="link">IC NUMBER </label><br>
							<input type="text" name="icNum" value="<?php echo $row['icNum']; ?>" placeholder="Your ic number without ' - ' or 'space'.." required >
						</div><br>
					</div>

					<div class="row">
						<div class="col"><label for="description">PHONE NUMBER</label><br>
							<input type="text" name="phoneNum" value="<?php echo $row['phoneNum']; ?>" placeholder="Your phone number without ' - ' .." required>
						</div><br>
					</div>

					<div class="row">
						<div class="col">
						<label for="categoryTag">CATEGORY</label>
						<select style="width:300px;" name="category" class="form-control" required> 
							<option><?php echo $row['category']; ?></option>
							<option>--Please Select Category--</option>
							<option value="Arts, Audio and Communication Technology">Arts, Audio and Communication Technology</option>
							<option value="Business and Marketing">Business and Marketing</option>
							<option value="Architecture and Construction">Architecture and Construction</option>
							<option value="Human Services">Human Services</option>
							<option value="Information Technology (IT)">Information Technology (IT)</option>
							<option value="Logistic">Logistic</option>
							<option value="Agriculture">Agriculture</option>
							<option value="Transportation">Transportation</option>
							<option value="Manufacturing">Manufacturing</option>
						</select>
						</div>
						<br>
					</div>
				<?php
			}
		}
	}
?>

	<div class="row">
	<input type="submit"  name="submit_details" value="Update">
	</div>
</form>
</div>


<!--script-->
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
</body>
</html>
