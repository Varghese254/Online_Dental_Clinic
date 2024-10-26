<?php
session_start();
ob_start();

 include("../Assets/Connection/Connection.php");
  if(isset($_POST["btn_proceed"]))
  {
    $address=$_POST["txt_address"];
    $pin=$_POST["txt_pin"];
    $contact=$_POST["txt_contact"];
    $date=$_POST["txt_date"];
    
	
       $a = "update tbl_booking set booking_status=2,booking_address='".$address."', booking_pin='".$pin."', booking_contact='".$contact."',booking_for_date='".$date."' where booking_id='".$_SESSION["bid"]."'";

      if($con->query($a))
        {
          
          
          if($_SESSION["pay"]=="true")
          {
            ?>
           <script>
       
            window.location="PayNow.php";
          </script>
  
    <?php
          }
          else
          {
            ?>
                    <script>
           
            window.location="MyBooking.php";
          </script>
  
    <?php
          }
        }
        else
        {
          echo "<script>alert('Failed')</script>";
        }
      
  }
  
  ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<div id="tab" align="center">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><h1>Booking Details</h1></title>
</head>

<body>
<?php
include("Head.php");
?>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <p><strong>Booking Details</strong></p>
    <table width="538" height="428" border="1" cellpadding="10">
      
      <tr>
        <th scope="row"><p>Address</p></th>
        <td><textarea name="txt_address" id="txt_address" cols="45" rows="5" required="required" autocomplete="off"></textarea></td>
      </tr>
      <tr>
        <th scope="row">Pin</th>
        <td><input type="text" name="txt_pin" id="txt_pin" required="required" autocomplete="off"/></td>
      </tr>
      <tr>
        <th scope="row">Contact</th>
        <td><input type="text" name="txt_contact" id="txt_contact" required="required" autocomplete="off"  onchange="checknum(this)"/></td>
      </tr>
      <tr>
        <th scope="row">Delivery Date</th>
        <td><input type="date" name="txt_date"/></td>
      </tr>
      <tr>
        <th colspan="2" scope="row"><input type="submit" name="btn_proceed" id="btn_proceed" value="Proceed" required="required"/></th>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</form>
<?php
include("Foot.php");
?>
</body>
<script src="../Assets/JQuery/jQuery.js"></script>
<script>
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
		document.getElementById("contact").innerHTML = "<span style='color: red;'>Numbers Only Allowed</span>";
		elem.focus();
		return false;
	}
}
</script>

</html>