

<html>
<head>
<?php
include("Head.php")
?>

<title>active dentist list</title>
</head>


<body>

<div id="tab">
<center><i><h1><b><u>active dentist list</u></b></h1></i>
<a href="HomePage.php">Home</a>
<?php

include("../Assets/Connection/Connection.php");
?>
 <?php  
 $selqry="select * from  tbl_schedule u inner join tbl_dentist p on u.dentist_id=p.dentist_id inner join tbl_dentisttype x on p.dentisttype_id=x.dentisttype_id where u.schedule_status='1'";
  $rows=$con->query($selqry);
  if($rows->num_rows>0)
		$i=0;
?>        
</form>		
<table border="1" cellpadding="10" align="center">
    <tr>
      <th>Si No</th>
 <th>Dentist Name</th>
  <th>Dentist type</th>
    <th>Dentist Photo</th>
       <th>Date</th>
        <th>From Time</th>
         <th>To Time</th>
           <th>Book</th>
    </tr>
 <?php

	while($result=$rows->fetch_assoc())
	{
		$i++;
		?>  
        <tr>
        <td><?php  echo $i;?></td>
       
         
         <td><?php echo $result["dentist_name"];?></td>
      <td><?php echo $result["dentisttype_name"];?></td>
      <td><img src="../Assets/Files/Dentistphoto/<?php echo $result["dentist_photo"];?>"width="120" height="120"/></td>
       <?php $original_date =$result['schedule_date'];
	   $timestamp = strtotime($original_date);
	   $new_date = date("d-m-Y", $timestamp);?>
         <td><?php echo $new_date;?></td>
          <td><?php echo $result["from_time"];?></td>
           <td><?php echo $result["to_time"];?></td>
        <td><a href="AppointmentRequest.php?upp=<?php echo $result["dentist_id"]?>">Book Appointment</a></td> </tr> 
<?php
	}
?> 
 </table>
 <?php
include("Foot.php")
?>
 </body>
</html>
