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
<link rel="stylesheet" type="text/css" href="styles/addproduct.css">
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

<form  method="post" enctype="multipart/form-data">
	
	<div class="left">
	<label>PRODUCT NAME*:</label>
	    <input type="text" name="productname" placeholder="Product Name" required/>
	</br>

	<label>QUANTITY*:</label> 
	    <input type="number" name="quantity" placeholder="Quantity" required/>
	</br>

	<label>CURRENCY*:</label>
		<select name="currency" required>
			<option value="N">(Naira)N</option>
			<option value="$">(Dollar)$</option>
			<option value="E">(Euro)E</option>
		</select>
	</br>

	<label>RATE*:</label>
	    <input type="number" name="rate" placeholder="Rate" required/>
	</br>
	
	<label>ADD PICTURE*:</label>
    <input type="file" name="image" id="uploadFile"  value="uploadFile" required/>
	</br>


	<button type="submit" > ADD PRODUCT  </button>

	</div>

	<div class="right">

	<label>BRAND*:</label> 
	    <input type="text" name="brand" placeholder="Brand" required/>
	</br>

	<label>CATEGORY*:</label> 
	    <input type="text" name="category" placeholder="Category" required/>
	</br>

	<label>STATUS*:</label>
		<select name="status" required>
			<option value="available">Available</option>
			<option value="unavailable">Unavailable</option>
		</select>
	</br>
	<button type="reset">  RESET  </button>

	</div>
	

		
		<div class="clearboth"></div>

	</form>

<?php require 'db.php';
if (isset($_POST) && !empty($_POST)) {
	# code...
	$productname = $_POST['productname'];
	$quantity = $_POST['quantity'];
	$currency = $_POST['currency'];
	$rate = $_POST['rate'];
	$brand = $_POST['brand'];
	$category = $_POST['category'];
	$status = $_POST['status'];
	$picture = $_FILES ['image'] ['name'];
	if (isset($_GET['username'])) {
    $username = $_GET['username'];
    }

  	$uploadfile = $_FILES["image"]["tmp_name"];

    $target = "p_photo/". basename ($_FILES ['image'] ['name'] );

    move_uploaded_file( $uploadfile , $target);

	$sql = "INSERT INTO product values(' ','$productname','$quantity',
		'$currency','$rate','$brand','$category','$status',now(),'$picture','$username')";

	  if(mysqli_query($con , $sql)){
	  	header('location:products.php?user=$username');
	  }
	  else {
	  	echo "error".$sql.mysqli_error($con);
	   }
}

mysqli_close($con);
?>

</body>
</html>