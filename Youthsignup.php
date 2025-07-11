<?php include ("connect.php");?>
<!DOCTYPE html>
<html>
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


body {
  font-family: Arial, Helvetica, sans-serif;
  margin:0px;
  background-color:white;
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
  background-image: url(b4.jpg);
}


* {
box-sizing: border-box;
}

.container {
  font-family: Arial;
}

.text-block {
  position: absolute;
  bottom: 40px;
  right: 700px;
  background-color: rgb(43, 43, 43, 0.8);
  color: white;
  padding-left: 40px;
  padding-right: 40px;
  font-size: 20px;
}

label {
  float: left;
  padding: 10px;
  display: inline-block;
  color: white;
  font-size: 16px;
}

input[type=text], input[type=password], input[type=email], input[type=number] {
  width:600px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  align: center;
}

input[type=submit] {
  background-color: #415b87;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 18px;
  cursor: pointer;
  float: center;
  margin: 20px 0;
  width: 200px;
}

input[type=submit]:hover {
  background-color: #1b3c57;
}

form {
  border-radius: 0;
  padding:10px;
  width:800px;
  background-color: rgb(43, 43, 43, 1);
  border:0;
  align: center;

}

.error {
	background:#F2DEDE;
	color:#A94442;
	padding:10px;
	width:wrap-content;
	border-radius: 5px;
	text-align: center;
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
  
  input[type=checkbox] {
  width: 15px;
  height: 15px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 18px;
  box-sizing: border-box;
  color: white;
  background-color: rgb(240, 239, 237, 0.95);
  float: left;
}

.jumbotron {
    background-color: #2d2d30;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
</style>

</head>

<body>

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">


<!-- navbar -->
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
        <li><a href="Main.php">HOME</a></li>
      </ul>
    </div>
  </div>
</nav>


<!--Big header-->
<div class="jumbotron text-center">
  <h1> REGISTER AND SIGN UP FORM</h1> 
  <p>Sign up with us by adding user details to get the information based on your field and category ..</p> 
  <br>
</div>


<!--SignUp form -->
<div class="container" align="center">
<center>
  <form method="post">
 
  	<div class="input-group">
	<?php include('errors.php'); ?>		
	<br><br>
  	  <label>Username</label><br>
  	  <input type="text" name="username" value="<?php echo $username; ?>" required >
  	</div>
	
	<div class="input-group">
  	  <label>Full Name</label><br>
  	  <input type="text" name="fullName" required>
  	</div>
	
	<div class="input-group">
  	  <label>Ic Number </label><br>
  	  <input type="number" name="icNum"  required>
  	</div>
	
	<div class="input-group">
  	  <label>Phone Number </label><br>
  	  <input type="number" name="phoneNum" required>
  	</div>
	
  	<div class="input-group">
  	  <label>Email</label><br>
  	  <input type="email" name="email" required>
  	</div>
	
  	<div class="input-group">
  	  <label>Password</label><br>
  	  <input type="password" name="password" required>
  	</div>
	
  	<div class="input-group">
  	  <label>Repeat Password</label><br>
  	  <input type="password" name="cpassword" required>
  	</div>
	
	<div class="input-group">
		<div class="col">
		<label for="categoryTag">Category : </label>
		<select name="category" class="form-control" required> 
			
			<option value="">--Please Select Category--</option>
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
	
  	<div class="input-group">
  	<input type="submit" name="signup" value="Sign Up">
  	</div>
	
  	<center><p style="color:white;">
  		Already a member? <a href="YouthLogIn.php" style="color:#4a8dff;">Log In</a>
  	</p></center>
	
  </form>
</center>
<br>
<br>
</div>



<!--script-->
<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>


</body>
</html>