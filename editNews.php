<?php

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'youthwebsite');

$id = $_GET['id']; // get id through query string

//insert Details	
if(isset($_POST['update'])) {

	$newsTitle = $_POST['newsTitle'];
	$newsLink = $_POST['newsLink'];
	$newsDescription = $_POST['newsDescription'];
	$startDate = date('Y-m-d', strtotime ($_POST['startDate']));
	$endDate = date('Y-m-d', strtotime ($_POST['endDate']));
	$category = $_POST['category'];
	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	
	$edit = "update news set image='$file', newsTitle='$newsTitle', newsLink='$newsLink', newsDescription='$newsDescription', startDate='$startDate', endDate='$endDate' where id='$id'";
	
	$query_run = mysqli_query($db,$edit);
	if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:AdminNewsView.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}	
	
?>