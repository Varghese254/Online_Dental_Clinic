 
 <?php

include("../Connection/Connection.php");
?>

 <table align="center" cellpadding="60">
  <tr>
  <?php
  $sel="select * from tbl_product p inner join tbl_size s on s.size_id=p.size_id inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id where true ";
  if($_GET["cid"]!=null)
  {
	  $sel.=" and sc.category_id='".$_GET["cid"]."'";
  }
  if($_GET["sid"]!=null)
  {
	  $sel.=" and sc.subcategory_id='".$_GET["sid"]."'";
  }
  if($_GET["size"]!=null)
  {
	  $sel.=" and p.size_id='".$_GET["size"]."'";
  }
  $row=$con->query($sel);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
  ?>
  <td><p><img src="../Assets/Files/ProductPhoto/<?php echo $data["product_image"]?>" width="200" height="200" /><br />
  Name :<b><?php echo $data["product_name"]?></b><br />
   Price :<b><?php echo $data["product_price"]?></b><br />
  Description :<b><?php echo $data["product_des"]?></b><br />
   <a href="ViewProductDetails.php?cartID=<?php echo $data["product_id"]?>">AddToCart</a></p>
  <?php
  if($i==4)
  {
	  echo "</tr>";
	  $i=0;
	  echo "<tr>";
  }
  }
  ?>
  </table>