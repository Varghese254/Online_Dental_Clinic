<?php
include("../Assets/Connection/Connection.php");
session_start();
$sql="select * from tbl_dentist u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where dentist_id='".$_SESSION["uid"]."'";
$row=$con->query($sql);	
$data=$row->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include("Head.php");
?>
<div id="tab" align="center">
<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td width="103">Name :</td>
      <td width="131"><?php echo $data["dentist_name"]; ?></td>
    </tr>
    <tr>
      <td>Gender :</td>
      <td><?php echo $data["dentist_gender"]; ?></td>
    </tr>
    <tr>
      <td>E-Mail</td>
      <td><?php echo $data["dentist_email"]; ?></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><?php echo $data["dentist_password"]; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["dentist_contact"]; ?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $data["district_name"];?></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php echo $data["place_name"];?></td>+
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["dentist_address"] ?></td>
    </tr>
  </table>
</form>
</body>
</div>
<?php
include("Foot.php");
?>
</html>