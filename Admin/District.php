<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
		$DISTRICT=$_POST["txt_dist"];
		$insQry="insert into tbl_district(district_name)
		values('".$DISTRICT."')";
		if($con->query($insQry))
		{
?>
		<script>
			alert("data inserted");
			window.location("District.php");
		</script>
    <?php
	   }
	   else
	   {
    ?>
		<script>
			alert("data insertion failed");
			window.location("District.php");
		 </script>
         
     <?php
       }
}
	if(isset($_GET["did"]))
	{
			$did=$_GET["did"];
			$delqry="delete from  tbl_district where district_id=('$did')";
			if($con->query($delqry))
			{
	?>
				
				<script>
				alert("deleted");
				location.href="District.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="District.php";
				</script>
				<?php
			}
	}
	?>
			
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DentalClincic::District</title>
</head>
<div id="tab" align="center">
<body>
<?php
include("Head.php");
?>

<form id="form1" name="form1" method="post" action="">
  <table width="349" height="89" border="1" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <td>District Name</td>
      <td><label for="txt_dist"></label>
      <input type="text" name="txt_dist" id="txt_dist" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  
  <br /><br />
<?php  
  $selqry="select *from tbl_district";
  $rows=$con->query($selqry);
  if($rows->num_rows>0)
		$i=0;
?>        
</form>		
<table border="1" cellpadding="10" align="center">
    <tr>
      <th>SI No</th>
      <th>Name</th>
    </tr>
 <?php

	while($result=$rows->fetch_assoc())
	{
		$i++;
		?>  
        <tr>
        <td><?php  echo $i;?></td>
        <td><?php echo $result["district_name"];?></td>
        <td><a href="District.php?did=<?php echo $result["district_id"]?>">delete</a></td> </tr> 
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
