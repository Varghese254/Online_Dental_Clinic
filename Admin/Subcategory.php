<?php
include("Head.php");
?>
<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
		  $CAT=$_POST["sel_category"];
		$name=$_POST["txt_name"];
		$insQry="insert into
		tbl_subcategory(category_id,subcategory_name)
		values('$CAT','$name')";
		
		if($con->query($insQry))
		{
?>
		<script>
			alert("data inserted");
			window.location("Subcategory.php");
		</script>
    <?php
	   }
	   else
	   {
    ?>
		<script>
			alert("data insertion failed");
			window.location("Subcategory.php");
		 </script>
          <?php
       }
}
	if(isset($_GET["did"]))
	{
			$did=$_GET["did"];
			$delqry="delete from  tbl_subcategory where subcategory_id=('$did')";
			if($con->query($delqry))
			{
	?>
				
				<script>
				alert("deleted");
				location.href="Subcategory.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="Subcategory.php";
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

<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="406" height="174" border="1" cellpadding="2" cellspacing="2" align="center">
   <tr>
      <td width="115">Category Name</td>
      <td width="65">
        <select name="sel_category" id="sel_category" required="required"> 
        <option value="">--sellect--</option>
        
			 <?php
		 $sel="select * from tbl_category";
		 $row=$con->query($sel);
		
		 while($results=$row->fetch_assoc())
		 {
			 ?>
             <option value="<?php echo $results["category_id"]?>"><?php echo $results["category_name"]?></option>
             <?php
		 }
?>		 
             
        
		</select>
      </td>
    </tr>
    <tr>
      <td width="115">Sub Category</td>
      <td width="65"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required autocomplete="off"/>        <label for="txt_name"></label></td>
    </tr>
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="value" /></td>
    </tr>
  </table>
  <?php  
  $selqry="select *from tbl_subcategory s inner join tbl_category c on s.category_id=c.category_id";
  $rows=$con->query($selqry);
  if($rows->num_rows>0)
		$i=0;
?>        
</form>		
<table border="1" cellpadding="10" align="center">
    <tr>
      <th>SI No</th>
       <th>Category Name</th>
      <th>SubCategory</th>
      
    </tr>
 <?php

	while($result=$rows->fetch_assoc())
	{
		$i++;
		?>  
        <tr>
     <td><?php  echo $i;?></td>
     <td><?php echo $result["category_name"];?></td>
     <td><?php echo $result["subcategory_name"];?></td>
     
     <td><a href="Subcategory.php?did=<?php echo $result["subcategory_id"]?>">delete</a></td> </tr> 
     </tr>
	 <?php
	}
?>      
</table>
</body>
</div>
</html>
<?php
include("Foot.php");
?>