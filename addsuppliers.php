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
<link rel="stylesheet" type="text/css" href="styles/addsuppliers.css">
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

<form  method="post" enctype="multipart/form-data">	
	
	<label>NAME*:</label>
	    <input type="text" name="suppliername" placeholder="Supplier's Name" required/>
	</br>

	<label>PHONE*:</label> 
	    <input type="number" name="phone" placeholder="Phone Number" required/>
	</br>

	<label>ADDRESS*:</label> 
	    <input type="text" name="address" placeholder="Address" required/>
	</br>

	<label>GENDER*:</label>
		<select name="gender" required>
			<option value="M">Male</option>
			<option value="F">Female</option>
		</select>
	</br>
	
	<button type="reset">  RESET  </button>

	<button type="submit"> ADD SUPPLIER  </button>
		

<?php require 'db.php';

if (isset($_POST) && !empty($_POST)) {
	# code...
	
	$suppliername = $_POST['suppliername'];
	
	$address = $_POST['address'];
	
	$gender = $_POST['gender'];
	
	$phone = $_POST['phone'];
	
	if (isset($_GET['username'])) {
    
    $username = $_GET['username'];
    
    }
	
	$sql = "INSERT INTO supplier values(' ','$suppliername','$address',
		'$gender','$phone','$username')";

	  if(mysqli_query($con , $sql)){
	 
	  	header('location:suppliers.php?user=$username');
	 
	  }
	 
	  else {
	  	echo "error".$sql.mysqli_error($con);
	 
	   }

}

mysqli_close($con);

?>

</form>
</body>
</html>