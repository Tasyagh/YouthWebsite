<?php
session_start();

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'youthwebsite');

// Initialize errors array
$errors = array();

// LOGIN USER ONLY (Admin with ID = 1)
if (isset($_POST['loginbtn'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = ($password); // assuming passwords are stored as md5
    $query = "SELECT * FROM admin WHERE id=1 AND username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
      $_SESSION['username'] = $username;
      header('Location: AdminOptionPage.php');
      exit();
    } else {
      array_push($errors, "Invalid admin credentials");
    }
  }
}
?>
