<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a></p>';
?>
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
      <td width="46">User Name</td>
         <td width="46">Product Name</td>
          <td width="46">quantity</td>
           <td width="46">Picture</td>
   
  
    </tr>
    <?php
	$sel="select * from  tbl_cart c inner join tbl_booking a on a.booking_id=c.booking_id inner join tbl_product p on p.product_id=c.product_id inner join tbl_user u on u.user_id=a.user_id where true";
	
	
	if($_POST["txt_f"]!="" && $_POST["txt_t"]!="")
	{
		$sel = $sel ." and booking_date between '".$_POST["txt_f"]."' and '".$_POST["txt_t"]."'";
	}
	if($_POST["txt_f"]!="" && $_POST["txt_t"]=="")
	{
		$sel = $sel ." and booking_date between '".$_POST["txt_f"]."' and curdate()";
	}
	if($_POST["txt_t"]!="" && $_POST["txt_f"]=="")
	{
		$sel = $sel ." and booking_date < '".$_POST["txt_t"]."'";
	}
	
	$row=$con->query($sel);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
   
     <td><?php echo $data["user_name"];?></td>
      <td><?php echo $data["product_name"];?></td>
        <td><?php echo $data["cart_qty"];?></td>
   <td><img src="../Assets/Files/ProductPhoto/<?php echo $data["product_image"];?>" width="70px" height="80px"/></td>  
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
