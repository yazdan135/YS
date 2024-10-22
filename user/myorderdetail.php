<?php
require("./connection_user.php");
require("./function_user.php");
require("./header.php");
$order_id = mysqli_real_escape_string($con, $_GET['id']);
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
                            <span class="breadcrumb-item active">Order Detail</span>
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
                                        <th class="product-add-to-cart"><span class="nobr">Name</span></th>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name"><span class="nobr">Price</span></th>
                                        <th class="product-price"><span class="nobr">Quantity</span></th>
                                        <th class="product-stock-stauts"><span class="nobr">Total Price</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user_id = $_SESSION['id'];
                                    $sql_get_orders = "SELECT orders_detail.*, product.product_name, product.image 
                                                       FROM orders_detail 
                                                       JOIN product ON orders_detail.product_id = product.id 
                                                       JOIN orders ON orders_detail.orders_id = orders.id 
                                                       WHERE orders_detail.orders_id='$order_id' AND orders.user_id='$user_id'";
                                    $result_get_orders = mysqli_query($con, $sql_get_orders);
                                    $totalPrice = 0;

                                    while ($row = mysqli_fetch_assoc($result_get_orders)) {
                                        $productTotalPrice = $row['product_qty'] * $row['price'];
                                        $totalPrice += $productTotalPrice;
                                    ?>
                                        <tr>
                                            <td class="product-add-to-cart"><?php echo $row['product_name'] ?></td>
                                            <td>
                                                <img src="../admin/img/product/<?php echo $row['image'] ?>" alt="product images">
                                            </td>
                                            <td class="product-price"><span class="amount">Rs <?php echo $row['price']; ?>/- Only</span></td>
                                            <td class="product-price"><span class="amount"><?php echo $row['product_qty']; ?></span></td>
                                            <td class="product-price"><span class="amount">Rs <?php echo $productTotalPrice ?>/- Only</span></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <span style="margin-left: 800px;">Payable Amount Without Delivery = Rs <?php echo $totalPrice ?>/- Only</span>
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