<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
	<link rel="stylesheet" type="text/css" href="styles/Signup.css">
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



<h3>Continue to SignUp</h3>

 <form  method="post" enctype="multipart/form-data">

<div class="form">	

	<div class="left">
	<label>BUSINESS NAME*:</label>
	    <input type="text" name="businessname" placeholder="Business Name" required/>
	</br>

	<label>USERNAME*:</label> 
	    <input type="text" name="username" placeholder="Username" required/>
	</br>

	<label>PASSWORD*:</label>
	    <input type="password" name="password" placeholder="Password" required/>
	</br>
	
	<label>BUSINESS PICTURE*:</label>
    <input type="file" name="image" id="uploadFile"  value="uploadFile" required/>
	</br>

	<button type="submit"> SIGN UP  </button>

	</div>


	<div class="right">

	<label>ADDRESS*:</label> 
	    <input type="text" name="address" placeholder="Address" required/>
	</br>

	<label>EMAIL*:</label> 
	    <input type="email" name="email" placeholder="Enter Email" required/>
	</br>

	<label>PHONE*:</label> 
	    <input type="tel" name="phone" placeholder="Phone Number" required/>
	</br>
	
	<button type="reset">  RESET  </button>

	</div>
	
	</br>

		<div class="clearboth"></div>

</div>
	

<?php require 'db.php';

if(isset($_POST) && !empty($_POST)){
	# code...
	$businessname = $_POST['businessname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$picture = $_FILES ['image'] ['name'];

	$businessname = mysqli_real_escape_string($con,$businessname);
	
  	$uploadfile = $_FILES["image"]["tmp_name"];

    $target = "photo/". basename ($_FILES ['image'] ['name'] );

    move_uploaded_file( $uploadfile , $target);

	$sql = "INSERT INTO users values(' ','$businessname','$username',
		'$password','$email','$phone','$address',now(),'$picture')";

	  if(mysqli_query($con , $sql)){

	  	$msg =  "You have successfully Registered. <a href='home.php#get_started'>LOGIN</a>  now..";

	  	echo "<div class='echo'>";	
		
		echo $msg;
		
		echo "</div>";

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