

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a></p>';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appoinment</title>
</head>

<div id="tab" align="center">
<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
	 <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
   
   
  
<?php

	session_start();
	
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_update"]))
{
	$details=$_POST["txt_desc"];
	$date=$_POST["txt_date"];
	$time=$_POST["txt_time"];
	$service=$_POST["sel_service"];
	$sql="insert into tbl_appointmentrequest(user_id,dentist_id,service_id,apointment_details,appointment_date,appointment_time) values('".$_SESSION["lgid"]."','".$_GET["upp"]."','".$service."','".$details."','".$date."','".$time."')";
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
  }
	    ?>
	<?php
      $selQry="select * from tbl_user where user_id='".$_SESSION["lgid"]."'" ;
	  $row=$con->query($selQry);
	  $data=$row->fetch_assoc();
	  ?>
	<tr>
      <td>Photo</td>
        <td><img src="../Assets/Files/UserPhoto/<?php echo $data["user_photo"]?>" width="120" height="120"/></td>
    </tr>
    <tr>
      <td width="103">Name </td> 
      <td width="131"><?php echo $data["user_name"]; ?></td>
    </tr>
    <tr>
      <td>Gender </td>
      <td><?php echo $data["user_gender"]; ?></td>
    </tr>
     <tr>
      <td>Contact</td>
      <td><?php echo $data["user_contact"]; ?></td>
    </tr>
    <tr>
	   <td>Email</td>
      <td><?php echo $data["user_email"]; ?></td>
    </tr>
      <tr>
	   <td>Services</td>
       <td>
       <select name="sel_service" id="sel_service" required="required"> 
        <option value="">--sellect--</option>
        
			 <?php
		 $sel="select * from  tbl_service";
		 $row=$con->query($sel);
		
		 while($results=$row->fetch_assoc())
		 {
			 ?>
             <option value="<?php echo $results["service_id"]?>"><?php echo $results["service_name"]?></option>
             <?php
		 }
?>		  	   
           </select>
           </td>  
       <tr>
      <td>Details</td>
      <td><textarea name="txt_desc" id="txt_desc" cols="45" rows="5"></textarea></td>
    </tr>
        
        <tr>
        <td>Date</td>
        <td><label for="txtdate"></label>
        <input type="date" name="txt_date" id="txtdate" required="required"/></td>
      </tr>
      <tr>
        <td>Time</td>
        <td><label for="txttime"></label>
        <input type="time" name="txt_time" id="txttime" required="required"/></td>
      </tr>
      <tr>
       <td> <div align="center">
         <input type="submit" name="btn_update" id="btnupdate" value="Update"/>
       </div></td>
      </tr>         
                  
                  
    </table>
	

    </form>
    <?php
include("Foot.php");
?>
</body>
</div>
    </html>           	 
      