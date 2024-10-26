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
<?php
include("Head.php");
?>

<center><i><h1><b><u>List of Complaints</u></b></h1></i></center>
<form id="form1" name="form1" method="post" action="">
 <center> <table width="703" height="302" border="1">
    <tr>
      <th width="45" scope="col">Sl No</th>
      <th width="131" scope="col">Name Of User</th>
       <th width="163" scope="col">Complaint Type</th>
      <th width="163" scope="col">Complaint Subject</th>
      
      <th width="219" scope="col">Complaint Description</th>
       <th width="219" scope="col">Complaint Reply</th>
       <th width="219" scope="col">ComplaintReply Date</th>
   =
    </tr>
     <?php
	$selectQry="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id inner join tbl_complainttype j on c.type_id=j.type_id where complaint_status='1'";
	
	$row=$con->query($selectQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
	$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["user_name"] ?></td>
        <td><?php echo $data["type_name"] ?></td>
      <td><?php echo $data["complaint_subject"] ?></td>
      <td><?php echo $data["complaint_description"] ?></td>
       <td><?php echo $data["complaint_reply"] ?></td>
        <td><?php echo $data["complaint_date"] ?></td>
    </tr>
    <?php
	}
	?>
  </table>
  </center>
</form>
<?php
include("Foot.php");
?>
</body>
</div>
</html>