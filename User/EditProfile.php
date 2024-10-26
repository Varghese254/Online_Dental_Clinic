
<?php

include("../Assets/Connection/Connection.php");

session_start();


if(isset($_POST["btn_submit"]))
{
	$contact = $_POST["txtcontact"];
	$email = $_POST["txtemail"];
	$name= $_POST["txt_name"];
	$address= $_POST["txt_address"];
	$upQry="update tbl_user set user_name='".$name."', user_contact='".$contact."',user_email='".$email."',user_address='".$address."' where user_id='".$_SESSION["lgid"]."'";
	
	if($con->query($upQry))
	{
		?>
        <script>
		         alert("Data Updated");
		</script>
        <?php
		header("location:MyProfile.php");
	}
	else
	{
		?>
        <script>
		         alert("Data Updation failed");
				 window.location("MyProfile.php");
		</script>
        <?php
	}
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a></p>';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProfile</title>
</head>

<div id="tab" align="center">
<?php
include("Head.php")
?>
<body>

<?php

		$selQry = "select * from tbl_user where user_id='".$_SESSION["lgid"]."'";
		$row=$con->query($selQry);
		if($data=$row->fetch_assoc())
		{

?>

<form id="form1" name="form1" method="post" action="">
<table width="379" border="1" align="center">
  <tr>
    <td>Name</td>
    <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value=" <?php echo $data["user_name"]?> " ></td>
  </tr>
  
  <tr>
    <td>Contact</td>
    <td><input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data["user_contact"]?>"  > </td>
  </tr>
  <tr>
    <td>Address</td>
    <td><label for="txt_address"></label>
      <label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5">"<?php echo $data["user_address"]?>"  </textarea></td>
  </tr>
  <tr>
    <td>Email</td>
     <td><input type="text" name="txtemail" id="txtemail" value="<?php echo $data["user_email"]?>" /> </td>
  </tr>
  
  <tr>
    <td colspan="2">
      <input type="submit" name="btn_submit" id="btn_submit" value="Update" >
   </td>
  </tr>
  
</table>

<?php

		}
		?>
        
        </form>
</body>
<?php
include("Foot.php")
?>
</div>
</html>