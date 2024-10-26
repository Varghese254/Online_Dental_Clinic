<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
		  $CAT=$_POST["sel_category"];
		$SIZE=$_POST["txt_name"];
		$insQry="insert into
		tbl_size(subcategory_id,size_name)
		values('$CAT','$SIZE')";
		
		if($con->query($insQry))
		{
?>
		<script>
			alert("data inserted");
			window.location("Size.php");
		</script>
    <?php
	   }
	   else
	   {
    ?>
		<script>
			alert("data insertion failed");
			window.location("Size.php");
		 </script>
          <?php
       }
}
	if(isset($_GET["did"]))
	{
			$did=$_GET["did"];
			$delqry="delete from  tbl_size where size_id=('$did')";
			if($con->query($delqry))
			{
	?>
				
				<script>
				alert("deleted");
				location.href=Size.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="Size.php";
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
<form id="form1" name="form1" method="post" action="Size.php">
  <table width="200" border="1" cellspacing="2" cellpadding="2" align="center">
   <tr>
      <td width="115">SubCategory</td>
      <td width="65">
        <select name="sel_category" id="sel_category" required="required"> 
        <option value="">--sellect--</option>
        
			 <?php
		 $sel="select * from tbl_subcategory";
		 $row=$con->query($sel);
		
		 while($results=$row->fetch_assoc())
		 {
			 ?>
             <option value="<?php echo $results["subcategory_id"]?>"><?php echo $results["subcategory_name"]?></option>
             <?php
		 }
?>		 
             
        
		</select>
      </td>
    </tr>

    <tr>
      <td width="115">Size</td>
      <td width="65"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required autocomplete="off" /></td>
    </tr>
	
 
	
	
	
	
	
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <?php  
  $selqry="select *from tbl_size s inner join tbl_subcategory sc on sc.subcategory_id=s.subcategory_id";
  $rows=$con->query($selqry);
  if($rows->num_rows>0)
		$i=0;
?>        
</form>		
<table border="1" cellpadding="10"  align="center">
    <tr>
      <th>Si No</th>
	   <th>SubCategory</th>
      <th>SizeName</th>
    <th>Action</th>
    </tr>
 <?php

	while($result=$rows->fetch_assoc())
	{
		$i++;
		?>  
        <tr>
        <td><?php  echo $i;?></td>
		 <td><?php echo $result["subcategory_name"];?></td>
        <td><?php echo $result["size_name"];?></td>
     
         <td><a href="Size.php?did=<?php echo $result["size_id"]?>">delete</a></td> </tr> 
     </tr>
	 <?php
	}
?>
</table> 
<?php
include("Foot.php");
?>     
</body>

<div id="tab" align="center">
</html>