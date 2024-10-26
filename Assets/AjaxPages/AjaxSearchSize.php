<?php
include("../Connection/Connection.php");
$selqry="select * from tbl_size where subcategory_id IN(".$_GET["data"].")";
$result=$con->query($selqry);
while($row=$result->fetch_assoc())
{
	?>
        <li class="list-group-item">
            <div class="form-check">
                <label class="form-check-label">
                    <input onchange="productCheck()"  type="checkbox" class="form-check-input product_check" value="<?php echo $row["size_id"]; ?>" id="size"><?php echo $row["size_name"]; ?>
                </label>
            </div>
        </li>
    <?php 
}
?>
