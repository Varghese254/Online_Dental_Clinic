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

  $sel="select * from tbl_service";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["service_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_service";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select count(*) as id from tbl_appointmentrequest c inner join tbl_service s on s.service_id=c.service_id WHERE c.service_id='".$data["service_id"]."'";
	  
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
  type: "bar",
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
