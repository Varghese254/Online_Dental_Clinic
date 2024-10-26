<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
//creating connection
 $conn=mysqli_connect($dbhost,$dbuser,$dbpass);
//chck connection
if($conn->connect_error){
die("connection failed:".$conn->connect_error);
}
echo "connected successfully";
//create database
#sql="CREATE DATABASE TEATDB":
if($conn->query($sql)==TRUE){
	echo "Database created succesfully";
}
else
{
	echo "error creating databse:".$conn->error;
}
$mysqli_close($conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>