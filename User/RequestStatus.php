<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<div id="tab" align="center">
<body>

<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <th width="59" scope="col">SL.NO</th>
      <th width="93" scope="col">Name</th>
      <th width="66" scope="col">Gender</th>
      <th width="59" scope="col">Contact</th>
      <th width="84" scope="col">Email</th>
      <th width="98" scope="col">Service</th>
       <th width="98" scope="col">Details</th>
      <th width="65" scope="col">Date</th>
      <th width="65" scope="col">Time</th>
      <th width="422" scope="col">PHOTO</th>
           <th width="422" scope="col">Status</th>
    </tr>
    <?php
	
include("../Assets/Connection/Connection.php");
session_start();

include("Head.php");

  $selqry="select * from tbl_appointmentrequest u inner join tbl_user p on u.user_id=p.user_id inner join tbl_service x on u.service_id=x.service_id where u.user_id='".$_SESSION["lgid"]."'";
  $row=$con->query($selqry);
  $i=0;
  while($result=$row->fetch_assoc())
  {
	  
    $i++;
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $result["user_name"];?></td>
      <td><?php echo $result["user_gender"];?></td>
      <td><?php echo $result["user_contact"];?></td>
      <td><?php echo $result["user_email"];?></td>
      <td><?php echo $result["service_name"];?></td>
         <?php $original_date =$result['appointment_date'];
	   $timestamp = strtotime($original_date);
	   $new_date = date("d-m-Y", $timestamp);?>
         <td><?php echo $new_date;?></td>
     
      <td><?php echo $result["apointment_details"];?></td>
      <td><?php echo $result["appointment_time"];?></td>
      <td><img src="../Assets/Files/UserPhoto/<?php echo $result["user_photo"];?>"width="120" height="120"/></td>
      <td>
      <?php 
      if($result["appointment_status"]==0)
      {
       echo "Pending";
       }else if($result["appointment_status"]==1) 
              {
               echo "Accepted /";
			   ?>
               <a href="DocPayment.php?bid=<?php echo $result["appointment_id"]?>">PayNow</a>
               <?php
              }
              else if($result["appointment_status"]==2)
              {
               echo "Rejected";
              }
			  else if($result["appointment_status"]==3)
              {
               echo "Payment Completed";
              }
              
            
            ?>   
            </td>
               
    </tr> 
    
    <?php
  }
  ?>
  </table>
</form>
<?php
include("Foot.php");
?>
</body>
</div>
</html>