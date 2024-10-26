

<html>
<head>

<title>active dentist list</title>
</head>


<body>
<?php
include("Head.php");
?>
<center><i>
<h1><b><u>Inactive dentist list</u></b></h1></i>
<a href="HomePage.php">Home</a>
      </body>
   
</html>

<div id="tab" align="center">

 <?php  
 include("../Assets/Connection/Connection.php");
 $selqry="select * from  tbl_schedule u inner join tbl_dentist p on u.dentist_id=p.dentist_id inner join tbl_dentisttype x on p.dentisttype_id=x.dentisttype_id where u.schedule_status='0'";
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
         <td><?php echo $result["schedule_date"];?></td>
          <td><?php echo $result["from_time"];?></td>
           <td><?php echo $result["to_time"];?></td>
        <td><a href="InactiveDentist.php?did=<?php echo $result["schedule_id"]?>">Delete</a></td> </tr> 
        <?php
	}
	?>
         </table>
   
<?php


if(isset($_GET["did"]))
	{
			$did=$_GET["did"];
			$delqry="delete from  tbl_schedule where schedule_id=('$did')";
			if($con->query($delqry))
			{
	?>
				
				<script>
				alert("deleted");
				location.href="InactiveDentist.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="InactiveDentist.php";
				</script>
				<?php
			}
	}
	
	?> 
    <?php
include("Foot.php");
?>
</div>