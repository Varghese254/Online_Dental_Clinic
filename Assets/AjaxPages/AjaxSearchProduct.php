<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "SELECT * from tbl_product p inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id inner join tbl_size s on p.size_id=s.size_id where true ";
        $row = "SELECT count(*) as count from tbl_product p inner join tbl_subcategory sc on sc.subcategory_id=p.subcategory_id inner join tbl_category c on c.category_id=sc.category_id inner join tbl_size s on p.size_id=s.size_id where true ";
 
        if ($_GET["category"]!=null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
            $row = $row." AND c.category_id IN(".$category.")";
        }
        if ($_GET["subcategory"]!=null) {

            $subcategory = $_GET["subcategory"];

            $sqlQry = $sqlQry." AND sc.subcategory_id IN(".$subcategory.")";
            $row = $row." AND sc.subcategory_id IN(".$subcategory.")";
        }


if ($_GET["size"]!=null) {

            $size = $_GET["size"];

            $sqlQry = $sqlQry." AND s.size_id IN(".$size.")";
            $row = $row." AND s.size_id IN(".$size.")";
        }


        $resultS = $con->query($sqlQry);
        $resultR = $con->query($row);
        
       
        $rowR = $resultR->fetch_assoc();

        if ($rowR["count"] > 0) {
            while ($row1 = $resultS->fetch_assoc()) {
?>

<div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/Files/ProductPhoto/<?php echo $row1["product_image"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $row1["product_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $row1["product_price"]; ?>/-
                                        </h4>
                                        <p align="center">
                                            <?php echo $row1["category_name"]; ?><br>
                                            <?php echo $row1["subcategory_name"]; ?><br>
                                        </p>
                                        <?php
		
                                            $stock = "select sum(stock_qty) as stock from tbl_stock where product_id = '" . $row1["product_id"] . "'";
											 $result2 = $con->query($stock);
                            				$row2=$result2->fetch_assoc();
                                                if ($row2["stock"] > 0) {
                                        ?>
                                        <a href="javascript:void(0)" onclick="addCart('<?php echo $row1["product_id"]; ?>')" class="btn btn-success btn-block">Add to Cart</a>
                                        <?php
                                        } else if ($row2["stock"] == 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                        <?php
                                            }
                                         else {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                        <?php
                                            }
                                        ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
            }
        } else {
             echo "<h4 align='center'>Products Not Found!!!!</h4>";
        }
    }

?>