
<?php require 'db.php';

	if (isset($_POST) && !empty($_POST)) {

			$rand = $_POST['rand'];
			$date = $_POST['date'];
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

			$query = "INSERT INTO receipts values('','$rand','now()','$businessname',
								'$address','$phone','$productname','$currency','$rate','$total',
								'$num','$username') ";

			if (mysqli_query($con , $query)) {

					echo "success";

			}

			else {

					echo "error".$query.mysqli_error($con);

			}

	}

mysqli_close($con);

?>
