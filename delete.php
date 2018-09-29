<?php require 'db.php';
	  require 'session.php';

if (!isset($_SESSION['signed_in'])) {
	header('location:home.php');
}

if(isset($_GET['id'])) {
	$id = $_GET['id'];

	

$sql = "DELETE FROM product where id = '$id'";

if (mysqli_query($con,$sql)){
	
	header('location:products.php?user=$username');

}
else{
	"error" . $sql ."<br/>" .mysqli_error($con);

}

}
mysqli_close($con);
?>