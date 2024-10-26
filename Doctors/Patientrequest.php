<?php
session_start();

include("../Assets/Connection/Connection.php");
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	
	
	$upQry="update tbl_appointmentrequest set status='1' where dentist_id='".$_SESSION['uid']."'";
	$con->query($upQry);
            

	if(isset($_GET["upp"]))
	{
			
			$upQry="update tbl_appointmentrequest set appointment_status='1' where appointment_id='".$_GET["upp"]."'";
			
			
			
				require'../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

$name=$_GET["name1"];

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'aamidentalclinic@gmail.com'; // Your gmail
    $mail->Password = 'nvnsyyzmagtciond'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('aamidentalclinic@gmail.com'); // Your gmail
  
    $mail->addAddress($_GET["user1"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Appointmented Successfully";
    $mail->Body = "Hello".$name."please come on scheduled time.Thank you ";
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }
	
	
	
			
			
			
			if($con->query($upQry))
			{
	?>
				
				<script>
				alert("updated");
				location.href="Patientrequest.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="Patientrequest.php";
				</script>
				<?php
			}
		
	   

  
	}
	if(isset($_POST["btn_reply"]))
	{
			
			$upQry="update tbl_appointmentrequest set appointment_status='2' where appointment_id='".$_POST["re"]."'";
			
			
			
			require'../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

$name=$_GET["name"];

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'aamidentalclinic@gmail.com'; // Your gmail
    $mail->Password = 'nvnsyyzmagtciond'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('aamidentalclinic@gmail.com'); // Your gmail
  
    $mail->addAddress($_GET["user"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Sorry";
    $mail->Body = "Hello".$name."     ".$_POST["txt_reply"];
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }
	
			
			
			
			
			
			
			if($con->query($upQry))
			{
	?>
				
				<script>
				alert("updated");
				location.href="Patientrequest.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="Patientrequest.php";
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
<form id="form1" name="form1" method="post" action="">



  <?php
  if(isset($_GET["re"]))
  {
	  ?>
      <table width="200" border="1" cellspacing="2" cellpadding="2">
    <tr>
      <td>Reply</td>
      <td><label for="txt_reply"></label>
      <textarea name="txt_reply" id="txt_reply" cols="45" rows="5"></textarea>
      <input type="hidden" value="<?php echo $_GET["re"]; ?>" name="re" />
      </td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_reply" id="btn_reply" value="Submit" /></td>
    </tr>
  </table>
      <?php
  }
  
  ?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table border="1" cellpadding="10">
    <tr>
      <th width="59" scope="col">SL.NO</th>
      <th width="93" scope="col">Name</th>
      <th width="66" scope="col">Gender</th>
      <th width="59" scope="col">Contact</th>
      <th width="84" scope="col">Email</th>
      <th width="98" scope="col">Service</th>
       <th width="98" scope="col">Details</th>
      <th width="65" scope="col">Date</th>
      <th width="65" scope="col">Time</th>
      <th width="422" scope="col">PHOTO</th>
       <th width="422" scope="col">ACTION</th>
    </tr>
    <?php
  $selqry="select * from tbl_appointmentrequest u inner join tbl_user p on u.user_id=p.user_id inner join tbl_service x on u.service_id=x.service_id where u.dentist_id='".$_SESSION['uid']."' and appointment_status=0";
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
      <td><?php echo $result["service_name"];?></td>
      <td><?php echo $result["appointment_date"];?></td>
      <td><?php echo $result["apointment_details"];?></td>
      <td><?php echo $result["appointment_time"];?></td>
      <td><img src="../Assets/Files/UserPhoto/<?php echo $result["user_photo"];?>"width="120" height="120"/></td>
     
     <td><a href="Patientrequest.php?upp=<?php echo $result["appointment_id"]?>&user1=<?php echo $result["user_email"]?>&name1=<?php echo $result["user_name"]?>">Accept</a>/<a href="Patientrequest.php?re=<?php echo $result["appointment_id"]?>&user=<?php echo $result["user_email"]?>&name=<?php echo $result["user_name"]?>">Reject</a></td> </tr> 
    
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