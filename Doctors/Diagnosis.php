<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
		$DIA=$_POST["txt_dia"];
		$insQry="insert into tbl_diagnosis(diagnosis_name)
		values('".$DIA."')";
		if($con->query($insQry))
		{
?>
		<script>
			alert("data inserted");
			window.location("Diagnosis.php");
		</script>
    <?php
	   }
	   else
	   {
    ?>
		<script>
			alert("data insertion failed");
			window.location("Diagnosis.php");
		 </script>
         
     <?php
       }
}
	if(isset($_GET["did"]))
	{
			$did=$_GET["did"];
			$delqry="delete from  tbl_diagnosis where diagnosis_id=('$did')";
			if($con->query($delqry))
			{
	?>
				
				<script>
				alert("deleted");
				location.href="Diagnosis.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="Diagnosis.php";
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
<?php
include("Head.php");
?>
<body>


<form id="form1" name="form1" method="post" action="">
  <table width="349" height="89" border="1" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <td>Diagnosis</td>
      <td><label for="txt_dia"></label>
      <input type="text" name="txt_dia" id="txt_dia" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  
  <br /><br />
<?php  
  $selqry="select *from tbl_diagnosis";
  $rows=$con->query($selqry);
  if($rows->num_rows>0)
		$i=0;
?>        
</form>		
<table border="1" cellpadding="10" align="center">
    <tr>
      <th>SI No</th>
      <th>Diagnosis Name</th>
        <th>Action</th>
    </tr>
 <?php

	while($result=$rows->fetch_assoc())
	{
		$i++;
		?>  
        <tr>
        <td><?php  echo $i;?></td>
        <td><?php echo $result["diagnosis_name"];?></td>
        <td><a href="Diagnosis.php?did=<?php echo $result["diagnosis_id"]?>">delete</a></td> </tr> 
<?php
	}
?> 
</table>	
</body>
<?php
include("Foot.php");
?>
</div>
</html>
