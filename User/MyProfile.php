<?php
include("../Assets/Connection/Connection.php");
session_start();
$sql="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where user_id='".$_SESSION["lgid"]."'";
//$d=$con->query($district);
$row=$con->query($sql);
$data=$row->fetch_assoc();
?>
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
<body>
<div id="tab">
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" align="center">
    <tr>
      <td width="103">Photo :</td>
      <td width="131"><img src="../Assets/Files/UserPhoto/<?php echo $data["user_photo"];?>"width="120" height="120"/></td>
    </tr>
    <tr>
      <td width="103">Name :</td>
      <td width="131"><?php echo $data["user_name"]; ?></td>
    </tr>
    <tr>
      <td>Gender :</td>
      <td><?php echo $data["user_gender"]; ?></td>
    </tr>
    <tr>
      <td>E-Mail</td>
      <td><?php echo $data["user_email"]; ?></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><?php echo $data["user_pass"]; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["user_contact"]; ?></td>
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
      <td><?php echo $data["user_address"] ?></td>
    </tr>
  </table>
</form>
</div>
<?php
include("Foot.php")
?>
</body>
</html>