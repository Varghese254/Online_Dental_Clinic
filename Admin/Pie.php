<?php

include("../Assets/Connection/Connection.php");

include("Head.php");

?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<div id="tab" align="center">
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_category";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["category_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_category";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select sum(cart_qty) as id from tbl_cart ca inner join  tbl_product p on ca.product_id=p.product_id inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id WHERE c.category_id='".$data["category_id"]."'";
	  
	  $row1=$con->query($sel1);
  while($data1=$row1->fetch_assoc())
	  {
			echo $data1["id"].",";
	  }
  }

?>
];



var barColors = [

 "#25EC40",
 "#FE133A",
  "#00aba9",
  "#2b5797",
   "#EC0EDD"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "All Product Sales"
    }
  }
});
</script>
<?php
include("Foot.php");
?>
</div>
</body>
</html>
