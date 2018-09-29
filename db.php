<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";

$con = mysqli_connect($dbhost,$dbuser,$dbpassword);

if (!$con) {
	# code...
 die ("connection failed " . mysqli_connect_error());
}

$sql ="CREATE DATABASE inventory";

if(mysqli_query($con, $sql)){

	echo "";

}

if(mysqli_select_db($con, "inventory")){

	echo "";

}


$product = "CREATE TABLE IF NOT EXISTS product(
id int(5) NOT NULL auto_increment PRIMARY KEY,
productname varchar(60) NOT NULL,
quantity int(11) NOT NULL,
currency varchar(10) NOT NULL,
rate decimal(10,2) NOT NULL,
brand varchar(50) NOT NULL,
category varchar(50) NOT NULL,
status varchar(20) NOT NULL,
date date NOT NULL,
picture text(150) NOT NULL,
user varchar(40) NOT NULL
)";

if (mysqli_query($con,$product)){

	echo "";

}

else{

	echo "";

}



$receipts = "CREATE TABLE IF NOT EXISTS receipts (
sn int(5) NOT NULL auto_increment PRIMARY KEY,
receipt_id varchar(25) NOT NULL UNIQUE ,
date date NOT NULL ,
businessname varchar(200) NOT NULL ,
address varchar(100) NOT NULL ,
phone varchar(15) NOT NULL ,
productname varchar(100) NOT NULL ,
currency varchar(5) NOT NULL ,
rate decimal(10,2) NOT NULL ,
total decimal(10,2) NOT NULL ,
num int(11) NOT NULL ,
username varchar(50) NOT NULL
)";

if (mysqli_query($con,$receipts)){

	echo "";

}

else{

	echo "";

}




$supplier = "CREATE TABLE IF NOT EXISTS supplier (
id int(5) NOT NULL auto_increment PRIMARY KEY,
suppliername varchar(20) NOT NULL,
address varchar(31) NOT NULL,
gender char(2) NOT NULL,
phone varchar(15) NOT NULL,
user varchar(40) NOT NULL
)";


if (mysqli_query($con,$supplier)){

	echo "";

}

else{

	echo "";

}



$users = "CREATE TABLE IF NOT EXISTS users (
id int(5) NOT NULL auto_increment PRIMARY KEY,
businessname varchar(40) NOT NULL,
username varchar(30) NOT NULL,
password varchar(30) NOT NULL,
email varchar(40) NOT NULL,
phone varchar(15) NOT NULL,
address varchar(80) NOT NULL,
date date NOT NULL,
picture text(150) NOT NULL
)";


if (mysqli_query($con,$users)){

	echo "";

}

else{

	echo "";

}




?>
