<?php
session_start();

include("Head.php");
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
	
		$SCHEDULE=$_POST["txt_date"];
		$FROM=$_POST["txt_ftime"];
      $TO=$_POST["txt_ttime"];
		$insQry="insert into tbl_schedule(dentist_id,schedule_date,from_time,to_time)
		values('".$_GET["add"]."','".$SCHEDULE."','".$FROM."','".$TO."')";
		if($con->query($insQry))
		{
?>
		<script>
			alert("data inserted");
			window.location("DentistSchedule.php");
		</script>
    <?php
	   }
	   else
	   {
    ?>
		<script>
			alert("data insertion failed");
			window.location("DentistSchedule.php");
		 </script>
         
     <?php
       }
}
	if(isset($_GET["did"]))
	{
			$did=$_GET["did"];
			$delqry="delete from  tbl_schedule where schedule_id=('$did')";
			if($con->query($delqry))
			{
	?>
				
				<script>
				alert("deleted");
				location.href="DentistSchedule.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="DentistSchedule.php";
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

<form id="form1" name="form1" method="post"  action=""  >
  <table width="200" border="1" cellspacing="2" cellpadding="2" align="center">
 
    
    <tr>
      <td>Schedule Date</td>
      <td><label for="txt_dist"></label>
      <input type="date" name="txt_date" id="txt_date" min="<?php echo date("Y-m-d")?>" required="required"/></td>
    </tr>
    <tr>
      <td>From Time</td>
      <td><label for="time"></label>
      <input type="time" name="txt_ftime" id="txt_ftime"  required/></td>
    </tr>
    <tr> 
      <td>To Time</td>
      <td><label for="txt_ttime"></label>
      <input type="time" name="txt_ttime" id="txt_ttime" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
  </form>
</body>
</div>
<?php
include("Foot.php");
?>
</html>
