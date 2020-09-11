<?php
include('db/connection.php');
$id=$_GET['del'];

$query=mysqli_query($conn,"DELETE FROM category WHERE id='$id'");
if ($query) {
	echo "<script>alert('category deleted succesfully');</script>";
	header('location:category.php');
}else{
echo "<script>alert('category not deleted');</script>";
}

?>