<?php
include("../Assets/Connection/Connection.php");
session_start();
?>
    
       


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("Head.php");
?>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <th width="59" scope="col">SL.NO</th>
      <th width="91" scope="col">PATIENT NAME</th>
      <th width="84" scope="col">GENDER</th>
      <th width="98" scope="col">CONTACT</th>
      <th width="65" scope="col">EMAIL</th>
     
      <th width="122" scope="col">PHOTO</th>
   
       
    </tr>
    <?php
  $selqry="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id";
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
    
      <td><img src="../Assets/Files/UserPhoto/<?php echo $result["user_photo"];?>"width="120" height="120"/></td>
     

  
    <?php
  }
  ?>
  </table>
</form>
</body>
</div>
<?php
include("Foot.php");
?>
</html>