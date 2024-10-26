<?php
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
		$CAT=$_POST["sel_category"];
		$SUB=$_POST["sel_sub"];
		$SIZE=$_POST["brand"];
		
		$NAME=$_POST["txt_name"];
		$PRICE=$_POST["txt_price"];
		$DES=$_POST["txt_des"];
		
		$photo = $_FILES["file_photo"]["name"];
	$temp = $_FILES["file_photo"]["tmp_name"];
	
	move_uploaded_file($temp,"../Assets/Files/ProductPhoto/".$photo);
	$PRICE=$_POST["txt_price"];
		$insQry="insert into tbl_product(subcategory_id,size_id,product_name,product_des,product_image,product_price)
		values('".$SUB."','".$SIZE."','".$NAME."','".$DES."','".$photo."','".$PRICE."')";
		echo $insQry;
		
		if($con->query($insQry))
		{
?>
		<script>
			alert("data inserted");
			window.location("Product.php");
		</script>
    <?php
	   }
	   else
	   {
    ?>
		<script>
			alert("data insertion failed");
			window.location("Product.php");
		 </script>
          <?php
       }
}
	if(isset($_GET["did"]))
	{
			$did=$_GET["did"];
			$delqry="delete from  tbl_product where product_id=('$did')";
			if($con->query($delqry))
			{
	?>
				
				<script>
				alert("deleted");
				location.href="Product.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
				alert("failed..");
				location.href="Product.php";
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
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="200" border="1" cellspacing="2" cellpadding="2" align="center">
  
    <tr>
      <td>Category</td>
      <td><select name="sel_category"  id="sel_category" onChange="getSub(this.value)" required="required">
       <option>--select--</option>
      <?php
	   $sql1="select * from tbl_category";
	   $results1=$con->query($sql1);
	   while($rows1=$results1->fetch_assoc())
	   {
		    ?>
            <option value="<?php echo $rows1["category_id"]; ?>"><?php echo $rows1["category_name"]; ?></option>
            <?php
	   }
	   ?>
      </select></td>
    </tr>
    <tr>
      <td>SubCategory</td>
      <td><select name="sel_sub"  id="sel_sub"  onChange="getSize(this.value)" required="required">
      <option value="">--select--</option>
     
      </select></td>
    </tr>
    
    <tr>
      <td>Size/Netweight</td>
      <td><select name="brand"  id="brand" required="required">
       <option>--select--</option>
      
      </select></td>
    </tr>
    <tr>
    <td width="115">Name</td>
      <td width="65"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_dis" required autocomplete="off"/></td>
      </tr>
      
     <tr>
       <td width="115">Description</td>
       <td width="65"><label for="txt_des"></label>
       <textarea name="txt_des" id="txt_des" cols="45" rows="5" required autocomplete="off"></textarea>        <label for="txt_name"></label></td>
    </tr> 
   <tr>
      <td>Photo</td>
      <td><input type="file" name="file_photo" id="file_photo" required/></td>
    </tr>
   
    <tr>
    <td width="115">Price</td>
      <td width="65"><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price" required autocomplete="off"/></td>
      </tr> 
 
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
       
</form>		
  <?php
include("Foot.php");
?>   
</body>
</div>
</html>
<script src="../Assets/JQuery/jQuery.js"></script>
    <script>
                        
						function getSub(did)
                        {

                            $.ajax({
                                url: "../Assets/AjaxPages/Ajaxsub.php?did=" + did,
                                success: function(result) {
									//alert(result);
                                    $("#sel_sub").html(result);
                                }
                            });
                        }
                        
                        
                        function getSize(did)
                        {

                            $.ajax({
                                url: "../Assets/AjaxPages/AjaxSize.php?did=" + did,
                                success: function(result) {
									//alert(result);
                                    $("#brand").html(result);
                                }
                            });
                        }
    </script>