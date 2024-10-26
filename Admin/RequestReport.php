<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request Report</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<div id="tab" align="center">

<body>
<?php

include("../Assets/Connection/Connection.php");

session_start();


include("Head.php");

?>
<form id="form1" name="form1" method="post" action="">
  <table  border="1"  cellpadding="10" align="center">
    <tr>
     <tr>
      <td width="115">Dentist Type</td>
      <td width="65">
    
        <select name="sel_type" id="sel_type" required="required"> 
        <option value="">--sellect--</option>
        
			 <?php
		 $sel="select * from tbl_dentist";
		 $row=$con->query($sel);
		
		 while($results=$row->fetch_assoc())
		 {
			 ?>
             <option value="<?php echo $results["dentist_id"]?>"><?php echo $results["dentist_name"]?></option>
             <?php
		 }
		 
?>	
    
    
    
    
    
    <tr>
      <td>From Date</td>
      <td><label for="txt_f"></label>
      <input type="date" name="txt_f" id="txt_f" /></td>
      <td>To Date</td>
      <td><label for="txt_t"></label>
      <input type="date" name="txt_t" id="txt_t" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center"><input type="submit" name="btnsave" id="btnsave" value="View Results" /></td>
    </tr>
  </table>
  <?php
  if(isset($_POST["btnsave"]))
  {
  ?>
  <div id="pri">
  <table  border="1" cellpadding="10" align="center">
    <tr>
      <td width="41">Sl.no</td>
      <td width="46">Name</td>
       <td width="59">diaganosis</td>
      <td width="60">Conatct</td>
      <td width="97">Email</td>
      <td width="59">Address</td>
     
     
    </tr>
    <?php
	$sel="select * from  tbl_appointmentrequest a inner join tbl_user u on u.user_id=a.user_id   inner join tbl_dentist d on d.dentist_id=a.dentist_id  inner join tbl_service s on s.service_id=a.service_id
	where true ";
	
	
	if($_POST["txt_f"]!="" && $_POST["txt_t"]!="")
	{
		$sel = $sel ." and appointment_date between '".$_POST["txt_f"]."' and '".$_POST["txt_t"]."'";
	}
	if($_POST["txt_f"]!="" && $_POST["txt_t"]=="")
	{
		$sel = $sel ." and appointment_date between '".$_POST["txt_f"]."' and curdate()";
	}
	if($_POST["txt_t"]!="" && $_POST["txt_f"]=="")
	{
		$sel = $sel ." and appointment_date < '".$_POST["txt_t"]."'";
	}
	if($_POST["sel_type"]!="")
	{
		$sel = $sel ." and d.dentist_id = '".$_POST["sel_type"]."'";
	}
	
	//echo $sel;
	
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
    <td><?php echo $data["user_name"];?></td>
     <td><?php echo $data["service_name"];?></td>
     <td><?php echo $data["user_contact"];?></td>
         <td><?php echo $data["user_email"];?></td>
    <td><?php echo $data["user_address"];?></td>
   
          </tr>
          <?php
	}
		  ?>
  </table>
  </div>
   <center><input type="button" onclick="printDiv('pri')" id="invoice-print"  class="btn btn-success" value="Print" /></center>
  <?php
  }
  ?>
 
</form>

<?php
include("Foot.php");
?>

</body>
</div>
</html>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
