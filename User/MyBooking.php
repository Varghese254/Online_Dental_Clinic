<?php
ob_start();
session_start();
include("../Assets/Connection/Connection.php");


	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="tab" align="center">
</head>

<body>
<?php
include("Head.php");
?>
<div align="center">
<h1>My Booking</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td>SlNO</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total amount</td>
      <td>Status</td>
        
    </tr>
    
     <?php
	 $selqry="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join 
	 tbl_product p on p.product_id=c.product_id where booking_status >=0 and cart_status > 0 and  user_id='".$_SESSION["lgid"]."'";
	// echo $selqry;
$result=$con->query($selqry);	
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
          <td><?php echo $row["product_name"];?></td>
<td><img src="../Assets/Files/ProductPhoto/<?php echo $row["product_image"];?>" width="70px" height="80px"/></td>  
                          <td><?php echo $row["cart_qty"];?></td>
          <td><?php echo $row["product_price"];?></td>
          <td><?php echo $totalamt;?></td>
          <td>
          <?php
                       
          if($row["booking_status"]==1 && $row["cart_status"]==1)
          {
            echo "payment pending....";
          }
          else if($row["booking_status"]==2 && $row["cart_status"]==1)
          {
            ?>
                        payment completed /
                        <?php
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==1)
					{
						?>
                        Payment Completed 
                        <?php
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==2)
					{
						?>
                        Product Packed 
                        <?php
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==3)
					{
						?>
                        Product Shipped 
                        <?php
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==4)
					{
						?>
                        Order Completed 
                        <?php
					}
				
				
				?>
          </td>
         
  </tr>
  <?php
	}
	?>
  </table>
 
  
</form>
</div>
<p>+</p>
<p>&nbsp;</p>
<?php
include("Foot.php");
?>
</body>
</html>