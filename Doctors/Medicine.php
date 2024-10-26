<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
	    $DIA=$_POST["sel_dia"];
		$MEDICINE=$_POST["txt_name"];
		$insQry="insert into tbl_medicine(diagnosis_id,medicine_name)values('".$DIA."','".$MEDICINE."')";
		
		if($con->query($insQry))
		{
?>
		<script>
			alert("data inserted");
			window.location("Medicine.php");
		</script>
    <?php
	   }
	   else
	   {
    ?>
		<script>
			alert("data insertion failed");
			window.location("Medicine.php");
		 </script>
          <?php
       }
}
	if(isset($_GET["did"]))
	{
			$did=$_GET["did"];
			$delqry="delete from  tbl_medicine where medicine_id=('$did')";
			if($con->query($delqry))
			{
	?>
				
				<script>
				alert("deleted");
				location.href="Medicine.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="Medicine.php";
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
<?php
include("Head.php");
?>
<div id="tab" align="center">
<body>
  
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" cellspacing="2" cellpadding="2" align="center">
    <tr>
      <td width="115">DiagnosisId</td>
      <td width="65">
        <select name="sel_dia" id="sel_dia" required="required"> 
        <option value="">--sellect--</option>
        
			 <?php
		 $sel="select * from tbl_diagnosis";
		 $row=$con->query($sel);
		
		 while($results=$row->fetch_assoc())
		 {
			 ?>
             <option value="<?php echo $results["diagnosis_id"]?>"><?php echo $results["diagnosis_name"]?></option>
             <?php
		 }
?>		 
             
        
		</select>
      </td>
    </tr>
    <tr>
      <td>MedicineName</td>
      <td>
      <input type="text" name="txt_name" id="txt_name" required autocomplete="off"/></td>
    </tr>
    
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
      </tr>
  </table>
  <?php  
  $selqry="select * from tbl_medicine";
  $rows=$con->query($selqry);
  if($rows->num_rows>0)
		$i=0;
?>        
</form>		
<table border="1" cellpadding="10" align="center">
    <tr>
      <th>Si No</th>
      <th>DiagnosisName</th>
      <th>MedicineName</th>
         <th>Action</th>
     
    </tr>
 <?php 
    $selqry="select * from tbl_medicine p inner join tbl_diagnosis d on p.diagnosis_id=d.diagnosis_id";
	$rows=$con->query($selqry);
	$i=0;

	while($result=$rows->fetch_assoc())
	{
		$i++;
		?>  
        <tr>
        <td><?php  echo $i;?></td>
          <td><?php echo $result["diagnosis_name"];?></td>
        <td><?php echo $result["medicine_name"];?></td>
         <td><a href="Medicine.php?did=<?php echo $result["medicine_id"]?>">delete</a></td> </tr> 
     </tr>
	 <?php
	}
?>
</table>     
</body>
</div>
<?php
include("Foot.php");
?>
</html>