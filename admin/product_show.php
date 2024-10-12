<?php
require("./connection_inc.php");
require("./function_inc.php");
require("./header.php");
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);
        if ($operation == 'Active') {
            $status = 1;
        } else {
            $status = 0;
        }
        $status_update = "update product set status = '$status' where id = '$id'";
        mysqli_query($con, $status_update);
    }
}
$sql = "select product .* , category.category from product inner join category on category.id = product.category_id	 order by category asc";
$res = mysqli_query($con, $sql);
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h3 class="text-center text-white">Product Management</h3><br><br>
                <div class="table-responsive">
                    <table class="table table-bordered border-light">
                        <thead>
                            <tr>
                                <th style="color:white;" scope="col">ID</th>
                                <th style="color:white;" scope="col">Category</th>
                                <th style="color:white;" scope="col">Product</th>
                                <th style="color:white;" scope="col">Price</th>
                                <th style="color:white;" scope="col">MRP</th>
                                <th style="color:white;" scope="col">Quantity</th>
                                <th style="color:white;" scope="col">Paking</th>
                                <th style="color:white;" scope="col">Image</th>
                                <th style="color:white;" scope="col">Status</th>
                                <th style="color:white;" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                while ($rows = mysqli_fetch_assoc($res)) {
                                ?>
                                    <th style="color:white;"><?php echo $rows['id'] ?></th>
                                    <td style="color:white;"><?php echo $rows['category'] ?></td>
                                    <td style="color:white;"><?php echo $rows['product_name'] ?></td>
                                    <td style="color:white;"><?php echo $rows['price'] ?></td>
                                    <td style="color:white;"><?php echo $rows['mrp'] ?></td>
                                    <td style="color:white;"><?php echo $rows['qty'] ?></td>
                                    <td style="color:white;"><?php echo $rows['paking'] ?></td>
                                    <td><img src="img/product/<?php echo $rows['image'] ?>" height="70px" width="70px"></td>
                                    <td style="color:white;">
                                        <?php
                                        if ($rows['status'] == 1) {
                                            echo "<a href='?type=status&operation=Inactive&id=" . $rows['id'] . "'>Active</a>";
                                        } else {
                                            echo "<a href='?type=status&operation=Active&id=" . $rows['id'] . "'>Inactive</a>";
                                        }
                                        ?>
                                    </td>
                                    
                                    <td style="color:white;"><a href="product_delete.php?id=<?php echo $rows['id'] ?>">
                                            <script src="https://cdn.lordicon.com/lordicon.js"></script>
                                            <lord-icon
                                                src="https://cdn.lordicon.com/hwjcdycb.json"
                                                trigger="hover"
                                                colors="primary:#ffffff,secondary:#ffffff"
                                                style="width:30px;height:40px">
                                            </lord-icon>
                                            <a href="product_update.php?id=<?php echo $rows['id'] ?>">
                                                <script src="https://cdn.lordicon.com/lordicon.js"></script>
                                                <lord-icon
                                                    src="https://cdn.lordicon.com/exymduqj.json"
                                                    trigger="hover"
                                                    colors="primary:#ffffff,secondary:#ffffff"
                                                    style="width:30px;height:40px">
                                                </lord-icon></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <a href="./product_add.php">
                        <script src="https://cdn.lordicon.com/lordicon.js"></script>
                        <lord-icon
                            src="https://cdn.lordicon.com/sbnjyzil.json"
                            trigger="hover"
                            colors="primary:#ffffff,secondary:#ffffff"
                            style="width:70px;height:60px">
                        </lord-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<?php
require("./footer.php");
?>