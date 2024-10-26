<?php
include("../Assets/Connection/Connection.php");
if(isset($_GET["did"]))
{
$delqry="delete from  tbl_user where user_id='".$_GET["did"]."'";
  if($con->query($delqry))
  {
?>
  <script>
  alert("Deleted");
  window.location="Userlist.php"
  </script>
<?php
  }
  else
  {
?>
    <script>
  alert("Failed");
    window.location="Userlist.php"
    </script>
<?php
  }
}
?>
    
       


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
?>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <th width="59" scope="col">SL.NO</th>
      <th width="93" scope="col">DISTRICT</th>
      <th width="66" scope="col">PLACE</th>
      <th width="59" scope="col">NAME</th>
      <th width="84" scope="col">GENDER</th>
      <th width="98" scope="col">CONTACT</th>
      <th width="65" scope="col">EMAIL</th>
      <th width="65" scope="col">PASSWORD</th>
      <th width="422" scope="col">PHOTO</th>
      <th width="422" scope="col">PROOF</th>
       <th width="422" scope="col">ACTION</th>
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
      <td><?php echo $result["district_name"];?></td>
      <td><?php echo $result["place_name"];?></td>
      <td><?php echo $result["user_name"];?></td>
      <td><?php echo $result["user_gender"];?></td>
      <td><?php echo $result["user_contact"];?></td>
      <td><?php echo $result["user_email"];?></td>
      <td><?php echo $result["user_pass"];?></td>
      <td><img src="../Assets/Files/UserPhoto/<?php echo $result["user_photo"];?>"width="120" height="120"/></td>
      <td><img src="../Assets/Files/UserProof/<?php echo $result["user_proof"];?>"width="120" height="120"/></td>
     <td><a href="Userlist.php?did=<?php echo $result["user_id"]?>">delete</a></td> </tr> 
    
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