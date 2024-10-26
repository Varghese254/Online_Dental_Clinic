<?php
include("../Assets/Connection/Connection.php");

session_start();

if(isset($_POST["btnLogin"]))
{
	   
		$username= $_POST["txtusername"];
		$pasword= $_POST["txtpassword"];
		
		$selQry = "select * from tbl_user where user_email='".$username."' and user_pass='".$pasword."'";
		
		$row=$con->query($selQry);
		
		
		
		$sel = "select * from tbl_dentist where dentist_email='".$username."' and dentist_password='".$pasword."'";
		
		$Row=$con->query($sel);	
		
		
		$selAdmin = "select * from tbl_admin where admin_email='".$username."' and admin_password='".$pasword."'";
		
		$Rows=$con->query($selAdmin);
		
			
		if($data=$row->fetch_assoc())
		{
			$_SESSION["lgid"]=$data["user_id"];
			$_SESSION["lgname"]=$data["user_name"];
		$_SESSION["user"]=$data["user_email"];
			
			header("location:../User/HomePage.php");
		}
		else if($dataDentist=$Row->fetch_assoc())
		{
			$_SESSION["uid"]=$dataDentist["dentist_id"];
			$_SESSION["uname"]=$dataDentist["dentist_name"];
		
			header("Location:../Doctors/Homepage.php");
		}
		else if($dataAdmin=$Rows->fetch_assoc())
		{
			$_SESSION["Aid"]=$dataAdmin["admin_id"];
			$_SESSION["aname"]=$dataAdmin["admin_name"];
		
			header("Location:../Admin/Homepage.php");
		}	
		else
		{
?>
			 <script>
		         alert("Invalid Username or Password");
				 
			</script>
            
            <?php
		}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>
<div id="tab" align="center">

<body>
<?php
include("Head.php");
?>
<form id="form1" name="form1" method="post"  enctype="multipart/form-data"  action="">
  <table width="347" border="1" align="center">
    <tr>
      <td width="78"> Email</td>
      <td width="253"><label for="txtuserid"></label>
      <input type="email" name="txtusername" id="txtusername" onChange="emailval(this)" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" required autocomplete="off" /></td>
    </tr>
    <tr>
     <td colspan="2" align="center"><input type="submit" name="btnLogin" id="btnLogin" value="Login" /></td>
     
    </tr>
   
    <td colspan="2" align="center"><input type="submit" onClick="parent.location='RecoveryPassword.php'" name="btnLogin" id="btnLogin" value="ForgotPass" /></td>

    <tr>
    
    </tr>
  </table>
</form>

	
</body>
<?php
include("Foot.php");
?>
<script src="../Assets/JQuery/jQuery.js"></script>
    <script>
	function emailval(elem)
{
	var emailexp=/^([a-zA-Z0-9.\_\-])+\@([a-zA-Z0-9.\_\-])+\.([a-zA-Z]{2,4})$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("content").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("content").innerHTML ="<span style='color: red;'>Check Email Address Entered</span>";;
		elem.focus();
		return false;
	}
}
</script>
</div>
</html>