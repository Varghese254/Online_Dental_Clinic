

<html>
<head>

<title>active dentist list</title>
</head>
<div id="tab" align="center">
<body>

<?php
include("Head.php");
?>


<center><i><h1><b><u>active dentist list</u></b></h1></i>



</body>

</html>
<?php

include("../Assets/Connection/Connection.php");
?>
 <?php  
 $selqry="select * from  tbl_schedule u inner join tbl_dentist p on u.dentist_id=p.dentist_id inner join tbl_dentisttype x on p.dentisttype_id=x.dentisttype_id where u.schedule_status='1'";

		
  $rows=$con->query($selqry);
  if($rows->num_rows>0)
		$i=0;
?>        
		
<table border="1" cellpadding="10" align="center">
    <tr>
      <th>Si No</th>
 <th>Dentist Name</th>
  <th>Dentist type</th>
       <th>Date</th>
        <th>From Time</th>
         <th>To Time</th>
         <th>Action</th>
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
      
       <?php $original_date =$result["schedule_date"]; 
		 $timestamp = strtotime($original_date); 
		$new_date = date("d-m-Y", $timestamp);
		 ?>
         <td><?php echo $new_date;?></td>
        
         
         
         
         
          <td><?php echo $result["from_time"];?></td>
           <td><?php echo $result["to_time"];?></td>
        <td><a href="ActiveDentistList.php?upp=<?php echo $result["schedule_id"]?>">Inactive</a></td> </tr> 
<?php
	}
?> 
 </table>
 <?php           

	if(isset($_GET["upp"]))
	{
			
			$upQry="update tbl_schedule set schedule_status='0' where schedule_id='".$_GET["upp"]."'";
			if($con->query($upQry))
			{
	?>
				
				<script>
				alert("updated");
				location.href="ActiveDentistList.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="ActiveDentistList.php";
				</script>
				<?php
			}
	}
	?> 
<?php
include("Foot.php");
?>
</div>
