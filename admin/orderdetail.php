<?php
require("./connection_inc.php");
require("./header.php");
$order_id = mysqli_real_escape_string($con, $_GET['id']);
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h3 class="text-center text-white">Orders Details</h3><br><br>

                <div class="table-responsive">
                    <table class="table table-bordered border-light">
                        <thead>
                            <tr>
                                <th class="product-add-to-cart"><span class="nobr text-white">Name</span></th>
                                <th class="product-thumbnail text-white">Image</th>
                                <th class="product-name text-white"><span class="nobr">Price</span></th>
                                <th class="product-price text-white"><span class="nobr">Quantity</span></th>
                                <th class="product-stock-status text-white"><span class="nobr">Total Price</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                // $user_id = $_SESSION['id'];
                                $sql_get_orders = "SELECT orders_detail.*, product.product_name, product.image, orders.address, orders.city, orders.postal_code
                                                       FROM orders_detail 
                                                       JOIN product ON orders_detail.product_id = product.id 
                                                       JOIN orders ON orders_detail.orders_id = orders.id 
                                                       WHERE orders_detail.orders_id='$order_id'";
                                $result_get_orders = mysqli_query($con, $sql_get_orders);
                                $totalPrice = 0;

                                // Declare variables before the loop
                                $address = '';
                                $city = '';
                                $postal_code = '';

                                while ($row = mysqli_fetch_assoc($result_get_orders)) {
                                    $address = $row['address'];
                                    $city = $row['city'];
                                    $postal_code = $row['postal_code'];

                                    $productTotalPrice = $row['product_qty'] * $row['price'];
                                    $totalPrice += $productTotalPrice;
                                ?>
                                    <td class="product-add-to-cart text-white"><?php echo $row['product_name'] ?></td>
                                    <td>
                                        <img src="../admin/img/product/<?php echo $row['image'] ?>" alt="product images" style="width: 70px; height:70px;">
                                    </td>
                                    <td class="product-price text-white"><span class="amount">Rs <?php echo $row['price']; ?>/- Only</span></td>
                                    <td class="product-price text-white"><span class="amount"><?php echo $row['product_qty']; ?></span></td>
                                    <td class="product-price text-white"><span class="amount">Rs <?php echo $productTotalPrice ?>/- Only</span></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <span style="margin-left: 800px;" class="text-white">Grand Total = Rs <?php echo $totalPrice ?>/-</span>
                </div>

                <!-- Address details -->
                <?php if (!empty($address) && !empty($city) && !empty($postal_code)) { ?>
                    <div class="address_detail text-white">
                        <strong>Address:</strong><br>
                        City &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | &nbsp; <?php echo $city ?><br>
                        Home &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; | &nbsp; <?php echo $address ?><br>
                        Postal Code &nbsp; | &nbsp; <?php echo $postal_code ?><br><br>

                        <!-- Display Order Status Dropdown -->
                        <strong>Order Status:</strong><br>
                        <form method="POST" action="">
                            <?php
                            // Fetch current order status
                            $current_status_query = "SELECT orders.orders_status FROM orders WHERE orders.id = '$order_id'";
                            $current_status_result = mysqli_query($con, $current_status_query);
                            $current_status = mysqli_fetch_assoc($current_status_result)['orders_status'];

                            // Fetch all statuses for the dropdown
                            $status_query = "SELECT * FROM orders_status";
                            $status_result = mysqli_query($con, $status_query);
                            ?>

                            <select name="order_status" class="form-select bg-dark text-white w-25 mt-2">
                                <?php
                                while ($status_row = mysqli_fetch_assoc($status_result)) {
                                    $selected = ($status_row['id'] == $current_status) ? "selected" : "";
                                    echo "<option value='{$status_row['id']}' $selected>{$status_row['status']}</option>";
                                }
                                ?>
                            </select>
                            <br>
                            <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                        </form>

                        <?php
                        // Update the order status if the form is submitted
                        if (isset($_POST['update_status'])) {
                            $new_status = mysqli_real_escape_string($con, $_POST['order_status']);
                            $update_status_query = "UPDATE orders SET orders_status = '$new_status' WHERE id = '$order_id'";
                            if (mysqli_query($con, $update_status_query)) {
                                echo "<div class='text-success'>Order status updated successfully!</div>";
                                // Optionally reload the page to reflect changes
                                echo "<meta http-equiv='refresh' content='0'>";
                            } else {
                                echo "<div class='text-danger'>Error updating status: " . mysqli_error($con) . "</div>";
                            }
                        }
                        ?>
                    </div>
                <?php } else { ?>
                    <div class="address_detail text-white">
                        <strong>Address:</strong> Not available
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php
require("./footer.php");
?>