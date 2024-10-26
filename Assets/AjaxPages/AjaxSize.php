 
 <?php

include("../Connection/Connection.php");
?>

 
 <option value="">---Select---</option> 
        <?php	
		$sel = "select * from tbl_size where subcategory_id='".$_GET["did"]."'";
		$row =$con->query($sel);
		while($data=$row->fetch_assoc())
		{
			?>
       <option value="<?php echo $data["size_id"]; ?>"><?php echo $data["size_name"]; ?></option>
            <?php
		}		
		?>