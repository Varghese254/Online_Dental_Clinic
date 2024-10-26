

<html>
<head>

<title>active dentist list</title>
</head>
<div id="tab" align="center">
<body>
<div id="tab">
<center><i>
<h1><b><u>My Working Time Periods</u></b></h1></i>

<?php
session_start();

include("Head.php");

include("../Assets/Connection/Connection.php");

 
 $selqry="select * from  tbl_schedule u inner join tbl_dentist p on u.dentist_id=p.dentist_id inner join tbl_dentisttype x on p.dentisttype_id=x.dentisttype_id where  u.dentist_id='".$_SESSION['uid']."' and u.schedule_status='1'";
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
         <td><?php echo $result["schedule_date"];?></td>
          <td><?php echo $result["from_time"];?></td>
           <td><?php echo $result["to_time"];?></td>
       
<?php
	}
?> 
 </table>

 </body>
 <?php
include("Foot.php");
?>
</div>
</html>
