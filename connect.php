<?php

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'youthwebsite');

session_start();

if(isset($_POST['signup'])){
	

	//receive input from youthsignup
	$username = $_POST['username'];
	$email = $_POST['email'];
	$fullName = $_POST['fullName'];
	$phoneNum = $_POST['phoneNum'];
	$icNum = $_POST['icNum'];
	$category = $_POST['category'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	
	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($username)) { 
	array_push($errors, "Username is required"); }
	if (empty($email)) { 
	array_push($errors, "Email is required"); }
	if (empty($fullName)) { 
	array_push($errors, "FullName is required"); }
	if (empty($phoneNum)) { 
	array_push($errors, "Phone Number is required"); }
	if (empty($icNum)) { 
	array_push($errors, "Ic Number is required"); }
	if (empty($category)) { 
	array_push($errors, "Category is required"); }
	if (empty($password)) { 
	array_push($errors, "Password is required"); }
	if ($password != $cpassword) {
	array_push($errors, "The two passwords do not match");}
	
	// first check the database to make sure 
	// a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM youth WHERE username='$username' OR email='$email' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	
	if ($user) { // if user exists
		if ($user['username'] === $username) {
			array_push($errors, "Username already exists");
		}
		if ($user['email'] === $email) {
			array_push($errors, "email already exists");
		}
		
	}
	
	// Finally, register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database

		$query = "INSERT INTO youth (username, fullName, icNum, phoneNum, category, password, email) 
				  VALUES('$username', '$fullName', '$icNum', '$phoneNum', '$category',  '$password', '$email')";
		mysqli_query($db, $query);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: YouthLogIn.php');
	  }
}

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM youth WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: YouthMainPage.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}



 ?>