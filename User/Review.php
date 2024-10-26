<?php
include("../Assets/Connection/Connection.php");

session_start();

if(isset($_POST["btn_submit"]))
{	
$DETAILS=$_POST["txt_name"];

$insQry="insert into tbl_review(review_details,user_id,review_date)values('".$DETAILS."','".$_SESSION["lgid"]."',curdate())";
if($con->query($insQry))
{
 ?>
    <script>
     alert("Review Posted");
     window.location="Review.php";
    </script>  
    
<?php
}
else
{
?>
<script>
alert("Failed to post your review");
 window.location="Review.php";
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
 <center>
  <table width="358" height="127" border="1">
    <tr>
      <td width="121" height="62" >Review Details</td>
      <td width="221"><input type="text" name="txt_name" id="txt_name" required="required" autocomplete="off"/> </td>
    </tr>
    <tr>
      <td height="57" colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  </center>
</form>
</body>
<?php
include("Foot.php");
?>
</div>
</html>