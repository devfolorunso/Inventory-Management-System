<?php require 'db.php';
	  require 'session.php';

if (!isset($_SESSION['signed_in'])) {
	header('location:home.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
	<link rel="stylesheet" type="text/css" href="styles/indexlayout.css">
	<link rel="stylesheet" type="text/css" href="styles/profile.css">
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


<table border="1" width="1000" height="50">

<?php require 'db.php';

	$sql = "SELECT * FROM users where username = '$username' ";

    $result = mysqli_query($con,$sql);

    while ($row = mysqli_fetch_array($result)) {

?>
	
	<tr>
	<td colspan="2"> 
	<?php echo "<img src='photo/".$row['picture']."' alt='image'> ";?> 
	</td>
	</tr>


	<tr align="center">
	<td colspan="2" id="padding" class="transform"> 
	<?php echo $row['businessname']; ?> 
	</td>
	</tr>

	<tr align="center">
	<td colspan="2" class="icon" id="padding"> 
	<img src="media icons/google.png">  
	<?php echo $row['address']; ?> 

	<div id="map" style="width:100%;height:400px;">
		map
	</div>

	<script type="text/javascript">

	function myMap() {
   
    var mapCanvas = document.getElementById("map");
   
   	var mapOptions = {
   
        center: new google.maps.LatLng(51.5, - 0.2),
   
        zoom:10
    };
   
   var map = new google.maps.Map(mapCanvas, mapOptions);
	
	}

	</script>

	</td>
	</tr>

	<tr align="center">
	<td class="mail_icon" width="50%" id="padding"> 
	<img src="media icons/email.png"> 
	<?php echo $row['email']; ?> 
	</td>

	<td class="icon"> 
	<img src="media icons/contact.png"> 
	<?php echo $row['phone']; ?>
	</td>
	</tr>

	<tr>
	<td colspan="2" align="right" id="margin" 
	class="fa-fa-icon">
	<span>Follow us @</span>
	<img src="media icons/facebook.png"> 
	<img src="media icons/google plus.png"> 
	<img src="media icons/twitter.png"> 
	<img src="media icons/pinterest.png">
	<img src="media icons/blogger.png">
	<img src="media icons/instagram.png">
	</td>
	</tr>

<?php

}

?>

</table>




</body>
</html>