 
 <?php

include("../Connection/Connection.php");
?>

 
 <option value="">---Select---</option> 
        <?php	
		$sel = "select * from tbl_medicine where diagnosis_id='".$_GET["did"]."'";
		$row =$con->query($sel);
		while($data=$row->fetch_assoc())
		{
			?>
       <option value="<?php echo $data["medicine_id"]; ?>"><?php echo $data["medicine_name"]; ?></option>
            <?php
		}		
		?>