<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<div id="tab" align="center">
<body>

<?php
include("Head.php");
?>

<table border="1" cellpadding="10">
    <tr>
      <th>Si No</th>
      <th>Product Category</th>
      <th>Subcategory</th>
      <th>size/Netweight</th>
        <th>Productname</th>
     
      <th>Description</th>
      <th>Photo</th>
       <th>Price</th>
    </tr>
    <?php
	include("../Assets/Connection/Connection.php");
   $selqry="select * from tbl_product u inner join tbl_subcategory p on u.subcategory_id=p.subcategory_id inner join tbl_category d on p.category_id=d.category_id inner join tbl_size b on u.size_id=b.size_id";
   $rows=$con->query($selqry);
	$i=0;

	while($result=$rows->fetch_assoc())
	{
		$i++;
		?>  
        <tr>
            	<td><?php  echo $i;?></td>
            	<td><?php echo $result["category_name"];?></td>
           		<td><?php echo $result["subcategory_name"];?></td>
           		<td><?php echo $result["size_name"];?></td>
             	<td><?php echo $result["product_name"];?></td>
              
            	<td><?php echo $result["product_des"];?></td> 
            	<td><img src="../Assets/Files/ProductPhoto/<?php echo $result["product_image"];?>" width="70px" height="80px"/></td>  
                
                <td><?php echo $result["product_price"];?></td>
                
             
	 <?php
	
	}
?>  
</tr>
 </table>  
  
</body>
</div>
<?php
include("Foot.php");
?>

</html>