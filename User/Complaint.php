<?php
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a></p>';
?>
<?php
include("../Assets/Connection/Connection.php");

session_start();

if(isset($_POST["btn_submit"]))
{
	$ctype=$_POST["txt_type"];
$csubject=$_POST["txt_subject"];	
$cdescrip=$_POST["txt_desc"];

$insQry="insert into tbl_complaint(type_id,complaint_subject,complaint_description,user_id,complaint_date)values('".$ctype."','".$csubject."','".$cdescrip."','".$_SESSION["lgid"]."',curdate())";
if($con->query($insQry))
{
 ?>
    <script>
     alert("Complaint Registered");
     window.location="Complaint.php";
    </script>  
    
<?php
}
else
{
?>
<script>
alert("Failed to register complaint");
 window.location="Complaint.php";
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
include("Head.php")
?>
<body>
<div id="tab">
<center><h1><u><i>Register your complaints</i></u></h1></center>
<form id="form1" name="form1" method="post" action="">
 <center>
  <table width="358" height="287" border="1">
    <tr>
      <td width="115">Type</td>
      <td width="65">
        <select name="txt_type" id="txt_type" required="required"> 
        <option value="">--sellect--</option>
        
			 <?php
		 $sel="select * from tbl_complainttype";
		 $row=$con->query($sel);
		
		 while($results=$row->fetch_assoc())
		 {
			 ?>
             <option value="<?php echo $results["type_id"]?>"><?php echo $results["type_name"]?></option>
             <?php
		 }
?>		 
             
        
		</select>
    <tr>
      <td width="121">Subject:</td>
      <td width="221"><input type="text" name="txt_subject" id="txt_subject"  required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Description:</td>
      <td><textarea name="txt_desc" id="txt_desc" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  </center>
</form>
</body>
<?php
include("Foot.php")
?>
</html>