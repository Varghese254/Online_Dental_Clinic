
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<div id="tab" align="center">
<body>
<?php
include("Head.php");


include("../Assets/Connection/Connection.php");
  $selqry="select *from tbl_service p inner join tbl_dentist d on p.dentist_id=d.dentist_id";    
  
  $rows=$con->query($selqry);
  if($rows->num_rows>0)
		$i=0;
?>        
	
<table border="1" cellpadding="10" align="center">
    <tr>
      <th>SI No</th>
      <th>ServiceName</th>
       <th>Dentist</th>
       <th>Dentist Photo</th>
      <th>Description</th>
        <th>Rate</th>
  
            
    </tr>
   
 <?php

	while($result=$rows->fetch_assoc())
	{
		$i++;
		?>  
        <tr>
        <td><?php  echo $i;?></td>
        <td><?php echo $result["service_name"];?></td>
          <td><?php echo $result["dentist_name"];?></td>
             <td><img src="../Assets/Files/Dentistphoto/<?php echo $result["dentist_photo"];?>"width="120" height="120"/></td>
      <td><?php echo $result["service_des"];?></td>
      <td><?php echo $result["service_rate"];?></td>
    
        
	 <?php
	}
?>      
  
</table>
</form>
</body>
<?php
include("Foot.php");
?>
</div>
</html>