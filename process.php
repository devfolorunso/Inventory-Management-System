<?php require 'session.php';

	  require 'db.php';

if (isset($_POST) && !empty($_POST)) {

    $num = $_POST['num'];

    $id = $_POST['id'];

    $quantity = $_POST['quantity'];

    $productname = $_POST['productname'];

    $currency = $_POST['currency'];

    $rate = $_POST['rate'];

    $total = $_POST['total'];

	if (isset($_GET['username'])) {

    $username = $_GET['username'];

    }

    $new = $quantity - $num;

$sql = " UPDATE product SET quantity = '$new' where user = '$username' and id = '$id' ";

	  if(mysqli_query($con , $sql)){

	  }

	  else {

	  	echo "error".$sql.mysqli_error($con);

	   }

}

mysqli_close($con);

?>

<?php

	$date = date("l d-m-y");

	$rand = (mt_rand());

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>print receipt</title>
	<link rel="stylesheet" type="text/css" href="styles/reciept.css">
</head>
<body>

<table border="1" width="80%">

<tr>

	<td width="50%" class="company-details">

		<span class="businessname"><?php echo $businessname; ?></span>
		</br>

		<img src="media icons/google.png" class="resize">
		<span class="address"><?php echo $address; ?> </span>
		</br>

		<img src="media icons/contact.png" class="resize">
		<span class="phone"><?php echo $phone; ?> </span>

	</td>

	<td width="50%" colspan="3" class="receipt-essential">

		<span class="id">Receipt id: <?php echo $rand; ?></span>
		</br>
		</br>
		<span class="date">Date: <?php echo $date; ?></span>

	</td>

</tr>


<tr class="header">
	
	<td class="padding">Product Name</td>
	<td class="padding">Quantity</td>
	<td class="padding">Rate</td>
	<td class="padding">Total</td>

</tr>


<tr id="receipt-content">

	<td  class="content-padding"> 
		<?php echo $productname; ?>
	</td>
	<td class="content-padding"> 
		<?php echo $num; ?>
	</td>

	<td class="content-padding">
		<?php echo $currency; ?>
		<?php echo $rate; ?>
	</td>

	<td class="content-padding">
		<?php echo $currency; ?>
	 	<?php echo $total; ?>
	</td>

</tr>


</table>


<p>Back to <a href="index.php?user=<?php echo $username; ?>">Home</a></p>

<form method="post">

	<input type="hidden" name="rand" value="<?php echo $rand; ?>">

	<input type="hidden" name="date" value="<?php echo $date; ?>">

	<input type="hidden" name="businessname" value="<?php echo $businessname; ?>">

	<input type="hidden" name="address" value="<?php echo $address; ?>">

	<input type="hidden" name="phone" value="<?php echo $phone; ?>">

	<input type="hidden" name="productname" value="<?php echo $productname; ?>">

	<input type="hidden" name="currency" value="<?php echo $currency; ?>">

	<input type="hidden" name="rate" value="<?php echo $rate; ?>">

	<input type="hidden" name="total" value="<?php echo $total; ?>">

	<input type="hidden" name="num" value="<?php echo $num; ?>">
	<!-- <input type="submit" name="btn"> -->

<?php require 'db.php';

	if (isset($_POST) && !empty($_POST)) {

			$rand = $_POST['rand'];

			$businessname = $_POST['businessname'];

			$address = $_POST['address'];

			$phone = $_POST['phone'];

			$productname = $_POST['productname'];

			$currency = $_POST['currency'];

			$rate = $_POST['rate'];

			$total = $_POST['total'];

			$num = $_POST['num'];

			if (isset($_GET['username'])) {

		    $username = $_GET['username'];

	    	}

	$query = "INSERT INTO receipts values('','$rand',now(),'$businessname','$address','$phone','$productname','$currency','$rate','$total','$num','$username')";

	if (mysqli_query($con , $query)) {

		echo "success";

		}

		else {

		echo "error".$query.mysqli_error($con);

		}

		}

	mysqli_close($con);

	?>

</form>
</body>
</html>
