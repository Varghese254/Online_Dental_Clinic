<?php
	$firstname="";
	$lastname="";
	$full="";
	$salary=0;
	$gender="";
	$status="";
	$department="";
	$ta=0;
	$net="";
	 $da=0;
	$hra=0;
	$lic=0;
  $pf=0;
	if(isset($_GET["btn_claculate"]))
	{
		$firstname=$_GET["txt_fname"];
		$lastname=$_GET["txt_lname"];
		$gender=$_GET["gender"];
		$status=$_GET["status"];
	    $department=$_GET["dept"];
		$salary=$_GET["txt_salary"];
		
		if($gender=="txt_male")
		{
				$name="MR.$txt_fname.$txt_lname";
		}
		else
		{
			if($status=="$txt_single")
			{
				$name="MISS.$txt_fname.$txt_lname";
			}
			else
			{
				$name="MRS.$txt_fname.$txt_lname";
			}
		}
		if($gender="txt_male")
		{
			$full="MR".$firstname." ".$lastname;
		}
		else
		{
			$full="MISS".$firstname." ".$lastname;
		}
				if($salary>20000)
		 {
			 $ta=$salary*0.4;
			 $da=$salary*0.35;
	         $hra=$salary*0.3;
			 $lic=$salary*0.25;
			 $pf=$salary*0.2;
		 }
		else if(($salary<20000)&&($salary>1000))
		{
			
			 $ta=$salary*0.35;
			 $da=$salary*0.3;
	         $hra=$salary*0.25;
			 $lic=$salary*0.2;
			 $pf=$salary*0.15;
		}
		 else
		 {
			 $ta=$salary*0.3;
			 $da=$salary*0.25;
	         $hra=$salary*0.20;
			 $lic=$salary*0.15;
			 $pf=$salary*0.10;
		 }
		 $net=($salary+$ta+$hr+$da)-($lic+$pf);
	     
	}
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="362" border="1" cellspacing="2" cellpadding="2">
    <tr>
      <td width="118">FIRSTNAME</td>
      <td colspan="2"><label for="txt_fname"></label>
      <input type="text" name="txt_fname" id="txt_fname" /></td>
    </tr>
    <tr>
      <td>LASTNAME</td>
      <td colspan="2"><label for="txt_lname"></label>
      <input type="text" name="txt_lname" id="txt_lname" /></td>
    </tr>
    <tr>
      <td>GENDER</td>
      <td width="107"><label for="btn_male">
<input type="radio" name="gender" id="txt_male" value="txt_male" />
MALE</label></td>
      <td width="109"><label for="txt_female">
<input type="radio" name="gender" id="txt_female" value="txt_female" />
FEMALE</label></td>
    </tr>
    <tr>
     <td>STATUS</td>
      <td><input type="radio" name="status" id="txt_single" value="txt_single" />
      <label for="txt_single">SINGLE</label></td>
      <td><input type="radio" name="status" id="btn_married" value="btn_married" />
      <label for="btn_married">MARRIED</label></td>
    </tr>
    <tr>
      <td height="50">DEPARTMENT</td>
      <td colspan="2"><label for="SELECT">
        <select name="dept" id="jumpMenu" >
          <option>HR</option>
          <option>FINANCE</option>
          <option>SALES</option>
          <option>item1</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>BASICSALARY</td>
      <td colspan="2"><label for="txt_salary"></label>
      <input type="text" name="txt_salary" id="txt_salary" /></td>
    </tr>
   
    <tr>
      <td height="33" colspan="3" align="center"><input type="submit" name="btn_calculate" id="btn_calculate" value="CALCULATE" /></td>
    </tr>
  </table>
 
</form>
 
</body>
</html>