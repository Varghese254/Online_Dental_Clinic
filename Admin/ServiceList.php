<?php
include("Head.php");
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
		  $SERVICE=$_POST["txt_name"];
		    $DENTIST=$_POST["sel_dentist"];
		$DES=$_POST["txt_des"];
		$CHARGE=$_POST["txtrate"];
		
		$insQry="insert into tbl_service(service_name,dentist_id,service_des,service_rate)
		values('$SERVICE','$DENTIST','$DES','$CHARGE')";
		
		if($con->query($insQry))
		{
?>
		<script>
			alert("data inserted");
			window.location("ServiceList.php");
		</script>
    <?php
	   }
	   else
	   {
    ?>
		<script>
			alert("data insertion failed");
			window.location("ServiceList.php");
		 </script>
          <?php
       }
}
	if(isset($_GET["did"]))
	{
			$did=$_GET["did"];
			$delqry="delete from  tbl_service where service_id=('$did')";
			if($con->query($delqry))
			{
	?>
				
				<script>
				alert("deleted");
				location.href="Userservice.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="Userservice.php";
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

<form id="form1" name="form1" method="post" action="">
  <table width="361" height="302" border="1" cellpadding="2" cellspacing="2" align="center">
   
       <tr>
      <td>Service Name</td>
    
      <td> <input type="text" name="txt_name" id="txt_name" required autocomplete="off"/></td>
      </tr>
      <tr>
        <td>Dentist</td>
       <td> <select name="sel_dentist" id="sel_dentist" required="required"> 
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
             
        
		</select> </td>
    </tr>
    <tr>
       <td width="127">Description</td>
       <td width="214"><label for="txt_des"></label>
       <textarea name="txt_des" id="txt_des" cols="23" rows="3" required autocomplete="off"></textarea></td>
    </tr> 
    
    <tr>
      <td>Service Rate</td>
      <td ><label for="txtrate"></label>
      <input type="text" name="txtrate" id="txtrate" /></td>
    </tr>
      <tr>
      <td>Duration(in Minute)</td>
      <td>
       <input type="text" name="txt_duration" id="txt_duration" required autocomplete="off"/></td>
      
      <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="value" /></td>
    </tr>
  </table>
  <?php  
  $selqry="select *from tbl_service p inner join tbl_dentist d on p.dentist_id=d.dentist_id";    
  
  
        
  $rows=$con->query($selqry);
  if($rows->num_rows>0) 
		$i=0;
?>        
</form>		
<table border="1" cellpadding="10" align="center">
    <tr>
      <th>Si No</th>
      <th>servicename</th>
      <th>Dentist Name</th>
      <th>description</th>
        <th>rate</th>
         <th>Duration(in minutes)</th>
            
    </tr>
 <?php

	while($result=$rows->fetch_assoc())
	{
		$i++;
		?>  
        <tr>
        <td><?php  echo $i;?></td>
        <td><?php echo $result["service_name"];?></td>
         <td><?php echo $result["dentist_name"];?></td>
      <td><?php echo $result["service_des"];?></td>
      <td><?php echo $result["service_rate"];?></td>
        <td><?php echo $result["service_duration(in Min)"];?></td>
     
         <td><a href="ServiceList.php?did=<?php echo $result["service_id"]?>">delete</a></td> </tr> 
     
	 <?php
	}
	include("Foot.php");
?> 
 </table>    
</body>
</div>
</html>