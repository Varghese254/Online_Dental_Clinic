<?php
session_start();


include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
	
		$STOCKQ=$_POST["txt_name"];
		$STOCKD=$_POST["txt_date"];
      
		$insQry="insert into tbl_stock(product_id,stock_qty,stock_date)
		values('".$_GET["add"]."','$STOCKQ','$STOCKD')";
		
if($con->query($insQry))
{
?>
		<script>
			alert("data inserted");
			window.location("Stock.php");
		</script>
	 		<?php
	   }
	   else
	   {
    ?>
    <script>
			alert("data insertion failed");
			window.location("Stock.php");
		 </script>
         
     <?php
       }

		
}





	if(isset($_GET["did"]))
	{
			$did=$_GET["did"];
			$delqry="delete from  tbl_stock where stock_id=('$did')";
			if($con->query($delqry))
			{
	?>
				
				<script>
				alert("deleted");
				location.href="Stock.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="Stock.php";
				</script>
				<?php
			}
	}
	?> 
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
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="65" border="1" cellspacing="2" cellpadding="2" align="center">
    <tr>
      <td width="115">StockQuantity</td>
      <td width="65"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>StockDate</td>
      <td><label for="txt_pin"></label>
      <input type="date" name="txt_date" id="txt_date"required="required"/></td>
    </tr>
    
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
  
  <?php  
  $selqry="select * from tbl_stock u inner join tbl_product p on u.product_id=p.product_id inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id inner join tbl_size b on p.size_id=b.size_id";
  $rows=$con->query($selqry);
  if($rows->num_rows>0)
		$i=0;
?>        
</form>		
<table border="1" cellpadding="10"  align="center">
    <tr>
      <th>Si No</th>
       <th>ProductName</th>
        <th>subcategory</th>
         <th>size/netweight</th>
      <th>stockquantity</th>
      <th>stockdate</th>
         <th>Action</th>
    </tr>
 <?php

	while($result=$rows->fetch_assoc())
	{
		$i++;
		?>  
        <tr>
        <td><?php  echo $i;?></td>
        <td><?php echo $result["product_name"];?></td>
             <td><?php echo $result["subcategory_name"];?>
             <td><?php echo $result["size_name"];?></td>
       
        <td><?php echo $result["stock_qty"];?></td>
        <td><?php echo $result["stock_date"];?></td>
        
         <td><a href="Stock.php?did=<?php echo $result["stock_id"]?>">delete</a></td> </tr> 
     </tr>
	 <?php
	}
?> 
</table>
   <?php
include("Foot.php");
?>
</body>

</html>
	
</div>