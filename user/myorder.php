<?php
require("./connection_user.php");
require("./function_user.php");
require("./header.php");
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../banner\ page.png) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">My Orders</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- wishlist-area start -->
<div class="wishlist-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wishlist-content">
                    <form action="#">
                        <div class="wishlist-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-add-to-cart"><span class="nobr">View Order</span></th>

                                        <th class="product-thumbnail">Added On</th>
                                        <th class="product-name"><span class="nobr">Order Address</span></th>
                                        <th class="product-price"><span class="nobr"> Payment Type </span></th>
                                        <th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
                                        <th class="product-remove"><span class="nobr">Order Status</span></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user_id = $_SESSION['id'];
                                    $sql_get_orders = "select orders.*, orders_status.status as orders_status_str from orders , orders_status where orders.user_id = $user_id and orders_status.id=orders.orders_status";
                                    $result_get_orders = mysqli_query($con, $sql_get_orders);

                                    while ($row = mysqli_fetch_assoc($result_get_orders)) {
                                    ?>
                                        <tr>
                                            <td class="product-add-to-cart"><a href="./myorderdetail.php?id=<?php echo $row['id'] ?>">View Order</a></td>
                                            <td class="product-name"><a href="#"><?php echo $row['added_on']; ?></a></td>
                                            <td class="product-name">
                                                <a href="#">
                                                    <?php echo $row['city'] . '<br>' . $row['address'] . '<br>' . $row['postal_code']; ?>
                                                </a>
                                            </td>
                                            <td class="product-price"><span class="amount"><?php echo $row['payment_type']; ?></span></td>
                                            <td class="product-price"><span class="amount"><?php echo $row['payment_status']; ?></span></td>
                                            <td class="product-price"><span class="amount"><?php echo $row['orders_status_str']; ?></span></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- wishlist-area end -->
<?php
require("./footer.php");
?>