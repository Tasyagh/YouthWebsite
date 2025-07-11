<?php

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'youthwebsite');

if(isset($_POST['create_news']))
{
	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$newsTitle = $_POST['newsTitle'];
	$newsLink = $_POST['newsLink'];
	$newsDescription = $_POST['newsDescription'];
	$startDate = date('Y-m-d', strtotime ($_POST['startDate']));
	$endDate = date('Y-m-d', strtotime ($_POST['endDate']));
	$category = $_POST['category'];
	
	$query = " INSERT INTO news (newsTitle, newsLink, newsDescription, startDate, endDate, image, category) VALUES ('$newsTitle', '$newsLink', '$newsDescription', '$startDate', '$endDate', '$file', '$category') ";
	$query_run = mysqli_query($db,$query);
	if($query_run)
		{
			echo '<script type="text/javascript"> alert("Data Updated") </script>';
		}
		else
		{
			echo '<script type="text/javascript"> alert("Data Not Updated") </script>';
		}
	mysqli_close($db);
	header("location: AdminNewsView.php?remarks=success"); 

	
}

?>


