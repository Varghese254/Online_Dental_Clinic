<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
		$CATEGORY=$_POST["txt_dist"];
		$insQry="insert into tbl_category(category_name)
		values('".$CATEGORY."')";
		if($con->query($insQry))
		{
?>
		<script>
			alert("data inserted");
			window.location("Category.php");
		</script>
    <?php
	   }
	   else
	   {
    ?>
		<script>
			alert("data insertion failed");
			window.location("Category.php");
		 </script>
         
     <?php
       }
}
	if(isset($_GET["did"]))
	{
			$did=$_GET["did"];
			$delqry="delete from  tbl_Category where Category_id=('$did')";
			if($con->query($delqry))
			{
	?>
				
				<script>
				alert("deleted");
				location.href="Category.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="Category.php";
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

<form id="form1" name="form1" method="post"  action=""  >
  <table width="200" border="1" cellspacing="2" cellpadding="2" align="center">
    <tr>
      <td>Categoryname</td>
      <td><label for="txt_dist"></label>
      <input type="text" name="txt_dist" id="txt_dist" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
<?php  
  $selqry="select *from tbl_category";
  $rows=$con->query($selqry);
  if($rows->num_rows>0)
		$i=0;
?>        
</form>		
<table border="1" cellpadding="10" align="center">
    <tr>
      <th>Si No</th>
      <th>Name</th>
        <th>Action</th>
    </tr>
 <?php

	while($result=$rows->fetch_assoc())
	{
		$i++;
		?>  
        <tr>
        <td><?php  echo $i;?></td>
        <td><?php echo $result["category_name"];?></td>
        <td><a href="Category.php?did=<?php echo $result["category_id"]?>">delete</a></td> </tr> 
<?php
	}
?> 
</table>
<?php
include("Foot.php");
?>	
</body>
</div>
</html>
