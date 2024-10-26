

<?php
	session_start();
	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btnsave"]))
	{
		
		$selq="select * from tbl_user where user_pass='".$_POST["txt_cur"]."' and user_id='".$_SESSION["lgid"]."'";
		if($row=$con->query($selq))
		{
				if($_POST["txt_new"]==$_POST["txt_con"])
				{
					$up="update tbl_user set user_pass='".$_POST["txt_new"]."' where user_id='".$_SESSION["lgid"]."'";
					if($con->query($up))
					{
						?>
                    
						<script>
						alert("Password Updated");
							location.href="MyProfile.php";
						</script>
                   		<?php
					}
				}
				else
				{?>
					<script>
					alert("password mismatch");
						window.location("MyProfile.php");
					</script>
               	<?php
				}
			}
			else
			{
				?>
            		<script>
					alert("Incorrect Password");
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
<title>Untitled Document</title>
</head>
<?php
include("Head.php")
?>

<div id="tab" align="center">
<body>

<form id="form1" name="form1" method="post" action="">
  <table  border="1" cellpadding="10" align="center">
    <tr>
      <td>Current Password</td>
      <td><label for="txt_cur"></label>
      <input type="text" name="txt_cur" id="txt_cur" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_new"></label>
      <input type="text" name="txt_new" id="txt_new" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_con"></label>
      <input type="text" name="txt_con" id="txt_con" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Change" />
      <input type="submit" name="btnc" id="btnc" value="Cancel" /></td>
    </tr>
  </table>
</form>

</body>
</div>
<?php
include("Foot.php")
?>
</html>