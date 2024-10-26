<?php
$fname="";
$lname="";
$full="";
$gender="";
$marital="";
$dept="";
$bpay=0;
$ta=0;
$da=0;
$hra=0;
$lic=0;
$pf=0;
$net=0;
$ded=0;
if(isset($_POST["submit"]))
{
 $bpay=$_POST["txt_bpay"];
 $dept=$_POST["ddldept"];
 $fname=$_POST["txt_fname"];
 $lname=$_POST["txt_lname"];
 $gender=$_POST["RadioGroup1"];
  $marital=$_POST["RadioGroup2"];
 if($gender=="male")
  $full="Mr ".$fname." ".$lname;
 else
  $full="Miss ".$fname." ".$lname;
 if($bpay>=20000)
 {
  $ta=$bpay*0.25;
  $da=$bpay*0.20;
  $hra=$bpay*0.15;
  $lic=$bpay*0.10;
  $pf=$bpay*0.08; 
 }
 else if($bpay>=15000)
 { $ta=$bpay*0.20;
  $da=$bpay*0.18;
  $hra=$bay*0.13;
  $lic=$bpay*0.08;
  $pf=$bpay*0.06; 
 }
 else if($bpay<15000)
 {
  $ta=$bpay*0.18;
  $da=$bpay*0.16;
  $hra=$bpay*0.10;
  $lic=$bpay*0.06;
  $pf=$bpay*0.04; 
 }
  $net=$bpay+$ta+$da+$hra-$lic-$pf;
  $ded=$lic+$pf;
}
	?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="283" height="366" border="1" cellpadding="10">
    <tr>
      <td>Firstname</td>
      <td><input type="text" name="txt_fname" id="txt_fname" /></td>
    </tr>
    <tr>
      <td>Lastname</td>
      <td><input type="text" name="txt_lname" id="txt_lname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><p>
        <label>
          <input type="radio" name="RadioGroup1" value="male" id="RadioGroup1_0" />
          Male</label>
        <br />
        <label>
          <input type="radio" name="RadioGroup1" value="female" id="RadioGroup1_1" />
          Female</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td>Marital</td>
      <td><p>
        <label>
          <input type="radio" name="RadioGroup2" value="single" id="RadioGroup2_0" />
          Single</label>
        <br />
        <label>
          <input type="radio" name="RadioGroup2" value="married" id="RadioGroup2_1" />
          Married</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><select name="ddldept" id="jumpMenu" >
        <option value="hr">HR</option>
        <option value="sales">Sales</option>
        <option value="it">IT</option>
        <option value="finance">Finance</option>
      </select></td>
    </tr>
    <tr>
      <td>Basic Pay</td>
      <td><input type="text" name="txt_bpay" id="txt_bpay" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"s><input type="submit" name="submit" id="submit" value="Submit" />
      <input type="reset" name="reset" id="reset" value="Cancel" /></td>
    </tr>
  </table>

</form>


Name: <?php echo $full; ?><br />
Gender: <?php echo $gender; ?><br />
Dept:  <?php echo $dept; ?><br />
Marital : <?php echo $marital; ?><br />
TA :  <?php echo $ta; ?><br />
DA :  <?php echo $da; ?><br />
HRA :  <?php echo $hra; ?><br />
LIC :  <?php echo $lic; ?><br />
PF : <?php echo $pf;?><br />
NET : <?php echo $net; ?><br />
Deduction : <?php echo $ded; ?><br />
</body>
</html>