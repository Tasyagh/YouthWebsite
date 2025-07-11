<?php

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'youthwebsite');

session_start();

$fullName = $_POST['fullName'];
$icNum = $_POST['icNum'];
$phoneNum = $_POST['phoneNum'];
$category = $_POST['category'];
	
//insert Details	
if(isset($_POST['submit_details'])) {


	$query = "update youth set fullName='$fullName', phoneNum='$phoneNum', icNum='$icNum', category='$category' WHERE icNum='$icNum' ";
	$query_run = mysqli_query($db,$query);
	
		if($query_run)
		{
			echo '<script type="text/javascript"> alert("Data Updated") </script>';
		}
		else
		{
			echo '<script type="text/javascript"> alert("Data Not Updated") </script>';
		}
	
		if (mysqli_query($db, $query)) 
		{
			echo "<script type='text/javascript'> window.location='YouthRegForm.php' </script>";
		} 
		else 
		{
			echo "Error: " . $query . "<br>" . mysqli_error($db);
		}
		
				
}	
	
?>


