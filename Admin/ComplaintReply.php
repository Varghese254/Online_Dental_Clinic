<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
		$msg=$_POST["txtreply"];
		$upQry="update tbl_complaint set complaint_reply='".$msg."',complaint_replydate=curdate(),complaint_status='1' where complaint_id='".$_GET["compID"]."'";
		if($con->query($upQry))
		{
?>
		<script>
			alert("Updated");
			window.location("UserComplaint.php");
		</script>
    <?php
	   }
	   else
	   {
    ?>
		<script>
			alert("Failed");
			window.location("UserComplaint.php");
		 </script>
         
     <?php
       }
}
	?>
			
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DentalClincic::Reply</title>
</head>
<div id="tab" align="center">
<body>

<?php
include("Head.php");
?>
<form id="form1" name="form1" method="post" action="">
  <table width="349" height="89" border="1" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <td>Reply Message</td>
      <td><label for="txt_dist"></label>
      <textarea name="txtreply" id="txtreply" required autocomplete="off" ></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  
<?php
include("Foot.php");
?>
</form>
 </body>
 </div>
</html>
