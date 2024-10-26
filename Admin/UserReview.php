<?php
	include("../Assets/Connection/Connection.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<div id="tab" align="center">
<body>
<body>
<?php
include("Head.php");
?>
<a href="HomePage.php">Home</a>
<center><h1><b><u>List of Complaints</u></b></h1></center>
<form id="form1" name="form1" method="post" action="">
 <center> <table width="703" height="302" border="1">
    <tr>
      <th width="45" scope="col">Sl No</th>
      <th width="163" scope="col">Review</th>
      <th width="163" scope="col">Review date</th>
      <th width="219" scope="col">user</th>
    </tr>
     <?php
	$selectQry="select * from tbl_review c inner join tbl_user u on c.user_id=u.user_id";
	$row=$con->query($selectQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
	$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["review_details"] ?></td>
      <td><?php echo $data["review_date"] ?></td>
      <td><?php echo $data["user_name"] ?></td>
    </tr>
    <?php
	}
	?>
  </table>
  </center>
</form>

<body>
<?php
include("Foot.php");
?>
</div>
</body>
</html>