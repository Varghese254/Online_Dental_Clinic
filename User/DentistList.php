

       


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a></p>';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include("Head.php")
?>

<div id="tab" align="center">
<body>
<center><i><h1><b><u>Dentist List</u></b></h1></i>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    <tr>
      <th width="59" scope="col">SL.NO</th>
    
      
      <th width="59" scope="col">NAME</th>
      <th width="84" scope="col">GENDER</th>
      <th width="98" scope="col">CONTACT</th>
      <th width="65" scope="col">EMAIL</th>
     
        <th width="65" scope="col">TYPE</th>
      <th width="65" scope="col">PHOTO</th>
   
    </tr>
    <?php
	include("../Assets/Connection/Connection.php");
  
  $selqry="select * from tbl_dentist  u inner join tbl_dentisttype p on u.dentisttype_id=p.dentisttype_id ";
  $row=$con->query($selqry);
  $i=0;
  while($result=$row->fetch_assoc())
  {
    $i++;
    ?>
    <tr>
      <td><?php echo $i; ?></td>
     
      <td><?php echo $result["dentist_name"];?></td>
      <td><?php echo $result["dentist_gender"];?></td>
      <td><?php echo $result["dentist_contact"];?></td>
      <td><?php echo $result["dentist_email"];?></td>
     
      <td><?php echo $result["dentisttype_name"];?></td>
      <td><img src="../Assets/Files/Dentistphoto/<?php echo $result["dentist_photo"];?>"width="50" height="50"/></td>
     
    </tr>
    <?php
  }
  ?>
  </table> 
</form>
</body>
<?php
include("Foot.php")
?>
</div>
</html>