<?php
ob_start();
session_start();
include("Head.php");

include("../Assets/Connection/Connection.php");

$selqry="select * from tbl_booking b inner join tbl_cart c inner join tbl_user u on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id where booking_status=2 and cart_status=1";
$result=$con->query($selqry);

	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie DArt::My Booking</title>
</head>

<body>
<div id="tab" align="center">
<h1>Payed List</h1>

<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td>SlNO</td>
      <td>User Name</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total amount</td>
   
    </tr>
     <?php
	 $i=0;
	while($row=$result->fetch_assoc())
	{
	
		
		$qty=$row["cart_qty"];
	$price=$row["product_price"];
	$totalamt=$qty*$price;
		 $i++;
  ?>
 
  <tr>
          <td><?php echo $i; ?></td>
           <td><?php echo $row["user_name"];?></td>
          <td><?php echo $row["product_name"];?></td>
          <td><img src="../Assets/Files/ProductPhoto/<?php echo $row["product_image"];?>" width="100" height="100" /></td>
          <td><?php echo $row["cart_qty"];?></td>
          <td><?php echo $row["product_price"];?></td>
          <td><?php echo $totalamt;?></td>
        

  </tr>
  <?php
	}
	
	?>
  </table>
</form>
</div>
</body>
</html>