<?php
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'youthwebsite');
    
$id = $_GET['id'];            
$del = mysqli_query($db, "DELETE FROM news WHERE id = '$id'");
if ($del) 
{
    mysqli_close($db); // Close connection
    header("location:AdminNewsView.php?deleted=1"); // Add parameter to indicate successful deletion
    exit;    
} 
else
{
    echo "ERROR: Could not able to execute $del. " . mysqli_error($db);
}
?>