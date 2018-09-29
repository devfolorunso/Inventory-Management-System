<?php require 'db.php';
	  require 'session.php';

if (!isset($_SESSION['signed_in'])) {
	header('location:home.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<title>inventory</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="styles/indexlayout.css">
</head>
<body>

<div class="header">
		
		<div class="header-left">
			<span>INVENTORY</span>
		</div>

		<div class="header-right">
				<a href="index.php?user=<?php echo $username; ?>">DASHBOARD</a>
				
				<a href="products.php?user=<?php echo $username; ?>">PRODUCTS</a>

				<a href="brands.php?user=<?php echo $username; ?>">BRANDS</a>

		   		<a href="suppliers.php?user=<?php echo $businessname; ?>">SUPPLIERS</a>

		   <div class="dropdown">
		        <span>SETTINGS
		        <div class="dropdown-content">
		        <a href="profile.php?user=<?php echo $username; ?>">View Profile</a>
		        <a href="profile.php?user=<?php echo $username; ?>">Edit Profile</a>
		        <a href="signout.php">Log out</a>
		        </div>
		        </span>
		   </div>
		
		</div>
</div>


<div class="left">

<form method="post">

	<label>PRODUCT NAME:</label>
	</br>

	<input type="text" name="q" placeholder="Product Name">
	</br>

	<label>QUANTITY:</label>
	</br>

	<input type="number" name="num" placeholder="Quantity" required>
	</br>

	<input type="submit" value="Details">

	<input type="reset" value="Reset">

	<a href="index.php"> <input type="submit" value="Clear"> </a>

</form>


</div>

<?php 

	if (isset($_POST) && !empty($_POST)) {

	$q = $_POST['q'];

	$num = $_POST['num'];

	if (isset($_GET['username'])) {

    $username = $_GET['username'];
    
    }

	$sql = "SELECT * FROM product where productname = '$q' and user = '$username' ";

    $result = mysqli_query($con,$sql);

    while ($row = mysqli_fetch_array($result)) {


?>

<table class="right" border="0" width="500" height="50">

<?php

if ($num > $row['quantity']) {
	
	echo "<div class='error-msg'>";

	echo "Insufficient Stock !!!";

	echo "</div>";

	exit();
}

?>


<tr>
	<td>
	<?php
	echo $row['productname'];
	?>	
	</td>
</tr>


<tr>
	<td>
	<?php
	echo "<a href='p_photo/".$row['picture']."'>
		 <img src='p_photo/".$row['picture']."' </a>"; 
	?>
	</td>
</tr>

<?php $total = $row['rate'] * $num; ?>

<tr>
	<td>
	<label>PRICE:</label>
	<?php echo $row['currency']; ?>
	<?php echo $total; ?>
	</td>
</tr>

<tr>
	<td>
	<form method="post" action="process.php">
	<input type="hidden" name="num" value="<?php echo $num ; ?>">
	<input type="hidden" name="id" value="<?php echo $row['id'] ; ?>">
	<input type="hidden" name="quantity" value="<?php echo $row['quantity'] ; ?>">	
	<input type="hidden" name="rate" value="<?php echo $row['rate'] ; ?>">
	<input type="hidden" name="currency" value="<?php echo $row['currency'] ; ?>">
	<input type="hidden" name="productname" value="<?php echo $row['productname'] ; ?>">
	<input type="hidden" name="total" value="<?php echo $total ; ?>">	
	<input type="submit" name="sell" value="Sell">
	</form>	
	</td>
</tr>


</table>

<?php

}
}

?>


		
</body>
</html>