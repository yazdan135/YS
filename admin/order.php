<?php
require("./connection_inc.php");
require("./header.php");

// Fetch all orders with their respective order status
$sql_get_orders = "SELECT orders.*, orders_status.status AS orders_status_str 
                   FROM orders 
                   JOIN orders_status ON orders.orders_status = orders_status.id";
$result_get_orders = mysqli_query($con, $sql_get_orders);

if (!$result_get_orders) {
    die("Query Failed: " . mysqli_error($con)); // Display error if query fails
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h3 class="text-center text-white">Orders</h3><br><br>
                <div class="table-responsive">
                    <table class="table table-bordered border-light">
                        <thead>
                            <tr>
                                <th class="product-add-to-cart"><span class="nobr text-white">View Order</span></th>
                                <th class="product-thumbnail text-white">Added On</th>
                                <th class="product-name"><span class="nobr text-white">Order Address</span></th>
                                <th class="product-price"><span class="nobr text-white">Payment Type</span></th>
                                <th class="product-stock-status"><span class="nobr text-white">Payment Status</span></th>
                                <th class="product-stock-status"><span class="nobr text-white">Phone</span></th>
                                <th class="product-remove"><span class="nobr text-white">Order Status</span></th>
                                <th class="product-remove"><span class="nobr text-white">Chat</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result_get_orders)) {
                                // Determine the correct payment status based on order status
                                if (strcasecmp($row['orders_status_str'], 'Complete') == 0) {
                                    $payment_status = 'Complete';
                                    $view_order_link = '<span class="text-muted">View Order</span>'; // Unclickable text
                                } else {
                                    $payment_status = 'Pending';
                                    $view_order_link = '<a href="./orderdetail.php?id=' . $row['id'] . '" class="text-white">View Order</a>'; // Clickable link
                                }

                                // If the payment status needs to be updated in the database
                                if ($row['payment_status'] != $payment_status) {
                                    $order_id = $row['id'];
                                    $update_payment_status_sql = "UPDATE orders SET payment_status = '$payment_status' WHERE id = $order_id";
                                    if (!mysqli_query($con, $update_payment_status_sql)) {
                                        echo "Error updating payment status: " . mysqli_error($con);
                                    }
                                    $row['payment_status'] = $payment_status; // Reflect the change immediately in the table
                                }
                            ?>
                                <tr>
                                    <td class="product-add-to-cart text-white"><?php echo $view_order_link; ?></td>
                                    <td class="product-price"><span class="amount text-white"><?php echo $row['added_on']; ?></span></td>
                                    <td class="product-price"><span class="amount text-white"><?php echo $row['address']; ?></span></td>
                                    <td class="product-price"><span class="amount text-white"><?php echo $row['payment_type']; ?></span></td>
                                    <td class="product-price"><span class="amount text-white"><?php echo $row['payment_status']; ?></span></td>
                                    <td class="product-price"><span class="amount text-white"><?php echo $row['phone']; ?></span></td>
                                    <td class="product-price"><span class="amount text-white"><?php echo $row['orders_status_str']; ?></span></td>
                                    <td class="product-price"><a href="https://wa.me/<?php echo $row['phone']; ?>" target="_blank" class="btn btn-success"> Chat </a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require("./footer.php");
?>
