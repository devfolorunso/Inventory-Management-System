<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
	<link rel="stylesheet" type="text/css" href="styles/Signup.css">
	<link rel="stylesheet" type="text/css" href="styles/login.css">
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



<h3>login</h3>

<form  method="post" enctype="multipart/form-data">

<div class="login">

<? echo $msg;?>

	<label>USERNAME*</label></br>
	    <input type="text" name="username" placeholder="Username"/>
	</br>

	<label>EMAIL*  </label></br>
	    <input type="email" name="email" placeholder="Enter Email"/>
	</br>

	<label>PASSWORD*</label></br>
	    <input type="password" name="password" placeholder="Password"/>
	</br>

	<span>forgot <a href="fogpass.php">password?</a></span>

	</br>

	<input type="submit" value="LOG IN" name="btn">

<?php require 'db.php';
      session_start();

      if ($_SERVER["REQUEST_METHOD"]=="POST") {
        # code...

        $username = $_POST['username'];

        $password = $_POST['password'];

        $email = $_POST['email'];

        $msg = array();

        $myusername = mysqli_real_escape_string($con,$username);

        $mypassword = mysqli_real_escape_string($con,$password);

        $sql = "SELECT * FROM users where username = '$myusername' and password = '$mypassword'";

        $result = mysqli_query($con , $sql);

        $row = mysqli_fetch_array($result);

        // $myusername = $row['username'];

        $count = mysqli_num_rows($result);

        if ($count == 1) {
        	
          // session_register("$myusername");

          $_SESSION['signed_in'] = $myusername;

          header("location:index.php?user=$username ");
        }
        else{
          echo  "<br>Invalid login details";
        }
      }

      ?>

</div>



</form>

</body>
</html>
