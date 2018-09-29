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
<link rel="stylesheet" type="text/css" href="styles/product.css">
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

		   		<a href="suppliers.php?user=<?php echo $username; ?>">SUPPLIERS</a>

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

<!--  -->

<!-- <form method="post">
<input type="text" name="q" placeholder="Enter Text">
<input type="submit" name="find" value="SEARCH">	
</form>
 -->


<p class="intro"> Dashboard / Products </p>

<div class="add"><a href="addproduct.php">+ADD PRODUCT</a></div>

<div class="body-panel">

<table border="1" width="1000" height="50">
	
	<caption>PRODUCTS</caption>
	

	<tr>
	<!-- <th>id</th> -->
	<th>Photo</th>
	<th>Product Name</th>
	<th>Quantity</th>
	<th>Currency</th>
	<th>Rate</th>
	<th>Brand</th>
	<th>Category</th>
	<th>Status</th>
	<th>Date added</th>
	<th colspan="2">option</th>
	</tr>

<?php require 'db.php';

	$sql = "SELECT * FROM product where user = '$username' ORDER BY productname ASC ";

    $result = mysqli_query($con,$sql);

    while ($row = mysqli_fetch_array($result)) {

?>

	<tr>
	<!-- <td> <?php echo $row['id']; ?></td> -->
	<td> <?php echo "<a href='p_photo/".$row['picture']."'>
		 <img src='p_photo/".$row['picture']."' alt='image'> </a>";?> </td>	
	<td> <?php echo $row['productname']; ?> </td>
	<td> <?php echo $row['quantity']; 
		if ($row['quantity'] < 80) {
		echo "<i style='color:red;'> </br> low stock!!! </i>";
		}
		?> 
	</td>
	<td> <?php echo $row['currency']; ?> </td>	
	<td> <?php echo $row['rate']; ?> </td>	
	<td> <?php echo $row['brand']; ?> </td>	
	<td> <?php echo $row['category']; ?> </td>	
	<td> <?php echo $row['status']; ?> </td>
	<td> <?php echo $row['date']; ?> </td>
	<td align="center">
		<u><a href="delete.php?id=<?php echo $row['id']?>">delete</a></u>
	</td>
	<td align="center">
		<u><a href="update.php?id=<?php echo $row['id']?>">update</a></u>
	</td>
	</tr>

<?php

}

?>

</table>



</div>

</body>
</html>