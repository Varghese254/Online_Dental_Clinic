<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ShopViewProductDetails</title>
</head>
<body>

<?php
session_start();

include("../Assets/Connection/Connection.php");


 
include("Head.php");

  
  
$selQry="select * from tbl_product u inner join tbl_subcategory p on u.subcategory_id=p.subcategory_id inner join tbl_category d on p.category_id=d.category_id inner join tbl_size b on u.size_id=b.size_id where u.product_id='".$_GET["cartID"]."'";	
		$row=$con->query($selQry);
		if($data=$row->fetch_assoc())
		{
			$price=$data["product_price"];
			echo " Price ".$price;
			$_SESSION["price"]=$price;
?>


<div id="tab" align="center">

<form id="form1" name="form1" method="post" action="">

  <table width="200" border="1" align="center">
    <tr>
      <td>ProductName</td>
      <td><?php echo $data["product_name"]?></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><?php echo $data["category_name"]?></td>
    </tr>
    <tr>
    <td>Subcategory</td>
      <td><?php echo $data["subcategory_name"]?></td>
    </tr>
     <tr>
    <td>Netweight/Quantity</td>
      <td><?php echo $data["size_name"]?></td>
    </tr>
   
    <tr>
      <td>ProductPrice</td>
      <td><?php echo $data["product_price"]?></td>
    </tr>
      <tr>
      <td>Stock</td>
      <td><?php echo $data["product_stock"]?></td>
    </tr>
    <tr>
      <td>Photo</td>
    
        <td><img src="../Assets/Files/ProductPhoto/<?php echo $data["product_image"];?>" width="150px" height="150px"/></td>
    </tr>
    <tr>
      <td>EnterQuantity</td>
      <td>
        <label for="txt_quantitynumber"></label>
        <input type="text" name="txt_quantitynumber" id="txt_quantitynumber" required="required" autocomplete="off" />
      </td>
    </tr>
    <tr>
    <td colspan="2"><input type="submit" name="btn_save" id="btn_save" value="Submit" /></td>
    </tr>
  </table>
  </form>
  <?php
		}
		?>
</form>
</div>
</body>
<?php
include("Foot.php")
?>
</html>


<?php

if(isset($_POST["btn_save"]))
 {
	 $StockAvailable=$data["product_stock"];
	
	 $qtyordered=$_POST["txt_quantitynumber"];
	 
	 if($StockAvailable> $qtyordered)
	 {
	 $total=$qtyordered*$_SESSION["price"];
	 
	
	 
	 $insQry="insert into tbl_cart(cart_date,cart_quantity,cart_total,product_id,user_id)values(curdate(),'".$qtyordered."','".$total."','".$_GET["cartID"]."','".$_SESSION["lgid"]."')";
	 echo $insQry;
	 if($con->query($insQry))
	 {
 ?>
		 <script>
		 		alert("data inserted");
				window.location("ViewProductDetails.php");
		</script>
 <?php
	 }
	 else
	 {
?>
		 <script>
		 		alert("data insertion failed");
				window.location("ViewProductDetails.php");
		</script>
 <?php
	 }
	}
	else
	{
	?>
     <script>
		 		alert("out of stock");
				window.location("ViewProductDetails.php");
		</script>
    <?php
	}
 }
  ?>