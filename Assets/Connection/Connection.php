<?php
$servername="localhost";
$user="root";
$password="";
$database="db_dentalclinic";
$con=mysqli_connect($servername,$user,$password,$database);
	if(!$con)
	{
			echo "connection error";
	}
?>	

