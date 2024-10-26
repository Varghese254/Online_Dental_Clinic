<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><hr />

<title>Untitled Document</title>
</head>
<?php
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
include("../Assets/Connection/Connection.php");
if(isset($_POST["submit"]))
{
	
	$name=$_POST["txt_name"];
	$gender=$_POST["btngender"];
	$contact=$_POST["txt_contact"];
	$mail=$_POST["txt_mail"];
	$pass=$_POST["txt_password"];
	$address=$_POST["txt_address"];
	$district=$_POST["sel_district"];
	$place=$_POST["sel_place"];
	
	
	$photo = $_FILES["file_photo"]["name"];
	$temp = $_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($temp,"../Assets/Files/UserPhoto/".$photo);
	
	$proof = $_FILES["file_proof"]["name"];
	$temp1 = $_FILES["file_proof"]["tmp_name"];
	move_uploaded_file($temp1,"../Assets/Files/UserProof/".$proof);
	$sel="select * from tbl_user where user_email='".$mail."'";
	$res=$con->query($sel);
	if($row=$res->fetch_assoc())
	{
		 ?>
     <script>
	   alert("Email already exist");
	   window.location("newuser.php");
	 </script>
		
	 <?php
	}
    else
	{
    
	
	
	$sql="insert into tbl_user(user_name,user_gender,user_contact,user_email,place_id,user_pass,user_address,user_photo,user_proof) values('".$name."','".$gender."','".$contact."','".$mail."','".$place."','".$pass."','".$address."','".$photo."','".$proof."')";
	if($con->query($sql))
	{
		  ?>
     <script>
	   alert("Data inserted");
	   window.location("newuser.php");
	 </script>
   <?php
	}
    else
	{
    ?>
      <script>
	    alert("Data Insertion Failed");
		window.location("newuser.php");
	  </script>
      <?php
	}
	
	require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';


    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'aamidentalclinic@gmail.com'; // Your gmail
    $mail->Password = 'nvnsyyzmagtciond'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('aamidentalclinic@gmail.com'); // Your gmail
  
    $mail->addAddress($_POST["txt_mail"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Successfully Registered";
    $mail->Body = "Hello ".$_POST["txt_name"].",You are successfully registered in our Aami Dental Clinic.From this time,your's dental issues are our own problem too.And also explore our products.Thank you.";
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }
	
	}
	
}
	    ?>
<body>
<?php
include("Head.php");
?>
<div id="tab" align="center">
  <h1>User Registration</h1>
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
  <table width="549" height="402" border="1" cellpadding="10" >
    <tr>
      <td width="1">Name</td>
      <td width="3">
        <input type="text" name="txt_name" id="txt_name"  required="required" onchange="nameval(this)" autocomplete="off"/>
        <div id="name"></div>
      </td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><p>
        <label>
          <input type="radio" name="btngender" value="MALE" id="btngender_0"  checked="checked"/>
          Male</label>
        <br />
        <label>
          <input type="radio" name="btngender" value="FEMALE" id="btngender_1" />
          Female</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="contact" name="txt_contact" id="txt_contact" required="required" autocomplete="off"  onchange="checknum(this)"/>
    <div id="contact"></div></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><input type="email" name="txt_mail" id="txt_mail" onchange="emailval(this)" required="required" autocomplete="off"/>
    <div id="content"></div></td>
    </tr>
    <tr>
      <td>District Name</td>
      <td><select name="sel_district" id="sel_district" onchange="getPlace(this.value)" required="required">
       <option>--select--</option>
      <?php
	   $sql1="select * from tbl_district";
	   $results1=$con->query($sql1);
	   while($rows1=$results1->fetch_assoc())
	   {
		    ?>
            <option value="<?php echo $rows1["district_id"]; ?>"><?php echo $rows1["district_name"]; ?></option>
            <?php
	   }
	   ?>
      </select></td>
    </tr>
    <tr>
      <td>Place Name</td>
      <td><select name="sel_place" id="sel_place">
      <option>--select--</option>
      
      </select></td>
    </tr>
    
    <tr>
      <td>Password</td>
      <td><input type="password" name="txt_password" id="myInput"  required="required" autocomplete="off"  /><br>
      <input type="checkbox" onclick="myFunction()">Show Password
      <small id="pass"></small>
</td>
    </tr>
    <tr>
      <td>Confirm Password</td>
     
      <td><input type="password" name="txt_cpassword" id="myInput" required="required" autocomplete="off" onchange="chkpwd(this,txt_password)"/>       
   
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txt_address" id="txt_address" cols="45" rows="5" required="required" autocomplete="off" onchange=""></textarea></td>
    </tr>
     <tr>
      <td>Photo</td>
      <td><input type="file" name="file_photo" id="file_photo" required="required"/></td>
    </tr>
     <tr>
      <td>Proof</td>
      <td><input type="file" name="file_proof" id="file_proof" required/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit"/>
      <input type="reset" name="Cancel" id="Cancel" value="Reset" /></td>
    </tr>
  </table>							
</form>
    </div>
</body>
<?php
include("Foot.php");
?>
<script src="../Assets/JQuery/jQuery.js"></script>
    <script>
                        
						function getPlace(did)
                        {

                            $.ajax({
                                url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                                success: function(result) {
									//alert(result)
                                    $("#sel_place").html(result);
                                }
                            });
                        }
						
						
function checknum(elem)
{
	var numericExpression = /^[0-9]{10,10}$/;
	if(elem.value.match(numericExpression))
	{
		document.getElementById("contact").innerHTML = "";
		return true;
	}
	else
	{
		document.getElementById("contact").innerHTML = "<span style='color: red;'>invalid</span>";
		elem.focus();
		return false;
	}
}



function emailval(elem)
{
	var emailexp=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
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
function nameval(elem)
{
	var emailexp=/^([A-Za-z ]*)$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("name").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("name").innerHTML = "<span style='color: red;'>Alphabets Are Allowed</span>";
		elem.focus();
		return false;
	}
}
function chkpwd(txtrp, txtp)
{
	if((txtrp.value)!=(txtp.value))
	{
		document.getElementById("pass").innerHTML = "<span style='color: red;'>Passwords Mismatch</span>";
	}
}

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

       
						
    </script>
</html>