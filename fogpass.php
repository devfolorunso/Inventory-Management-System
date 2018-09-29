<?php require 'db.php';

?>

<!DOCTYPE html>
<html>
<head>
<title>inventory</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="styles/fogpassword.css">
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
		        <a href="profile.php">View Profile</a>
		        <a href="profile.php?user=<?php echo $username; ?>">Edit Profile</a>
		        <a href="signout.php?user=<?php echo $username; ?>">Log out</a>
		        </div>
		        </span>
		   </div>
		
		</div>
</div>


<!--  -->

<div class="content">

<form method="post">

	<label>EMAIL:</label> </br>
	  
	<input type="email" name="email" placeholder="Enter Email"/>

	</br>

	<input type="submit" name="get" value="GET"> 

<?php

if (isset($_POST['get'])) {

		$email = $_POST['email'];
	
		$sql = "SELECT * FROM users where email = '$email'";
	
		$result = mysqli_query($con , $sql);
	
		$row = mysqli_fetch_array($result);
	
		if ($email = $row['email']){
	
			echo "<div class='pass'>";
	
				echo $row['password'];
	
			echo "</div>";
		}
}

?>

</form>

<span>Back to <a href="login.php">login</a></span>

</div>

</body>
</html>
