<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
	    $DISTRICT=$_POST["sel_district"];
		$PLACE=$_POST["txt_name"];
		$PIN=$_POST["txt_pin"];
		$insQry="insert into tbl_place(place_name,place_pin,district_id)values('".$PLACE."','".$PIN."','".$DISTRICT."')";
		
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
			$delqry="delete from  tbl_place where place_id=('$did')";
			if($con->query($delqry))
			{
	?>
				
				<script>
				alert("deleted");
				location.href="Place.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="Place.php";
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


<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" cellspacing="2" cellpadding="2" align="center">
    <tr>
      <td width="115">DistrictId</td>
      <td width="65">
        <select name="sel_district" id="sel_district" required="required"> 
        <option value="">--sellect--</option>
        
			 <?php
		 $sel="select * from tbl_district";
		 $row=$con->query($sel);
		
		 while($results=$row->fetch_assoc())
		 {
			 ?>
             <option value="<?php echo $results["district_id"]?>"><?php echo $results["district_name"]?></option>
             <?php
		 }
?>		 
             
        
		</select>
      </td>
    </tr>
    <tr>
      <td>PlaceName</td>
      <td>
      <input type="text" name="txt_name" id="txt_name" required autocomplete="off" ></td>
    </tr>
      <tr>
      <td>PlacePin</td>
      <td>
      <input type="text" name="txt_pin" id="txt_pin" required autocomplete="off"></td>
    </tr>
    
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
   
  </table>
 
  <?php  
  $selqry="select * from tbl_place";
  $rows=$con->query($selqry);
  if($rows->num_rows>0)
		$i=0;
?>        
</form>		
<table border="1" cellpadding="10" align="center">
    <tr>
      <th>Si No</th>
      <th>DistrictName</th>
      <th>placeName</th>
      <th>placepincode</th>
      <th>Action</th>
   
    </tr>
 <?php 
    $selqry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
	$rows=$con->query($selqry);
	$i=0;

	while($result=$rows->fetch_assoc())
	{
		$i++;
		?>  
        <tr>
        <td><?php  echo $i;?></td>
          <td><?php echo $result["district_name"];?></td>
        <td><?php echo $result["place_name"];?></td>
        <td><?php echo $result["place_pin"];?></td>
         <td><a href="Place.php?did=<?php echo $result["place_id"]?>">delete</a></td> </tr> 
     </tr>
	 <?php
	}
?> 
</table> 
<?php
include("Foot.php");
?>
 </div>   
</body>

</html>