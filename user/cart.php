<?php
require("./connection_user.php");
require("./function_user.php");
require("./header.php");
?>

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Shopping Cart</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->

<!-- cart-main-area start -->
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Products</th>
                                    <th class="product-name">Name of Products</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                    foreach ($_SESSION['cart'] as $key => $val) {
                                        $productArr = get_product($con, '', '', $key);
                                        $pname = $productArr[0]['product_name'];
                                        $price = $productArr[0]['price'];
                                        $image = $productArr[0]['image'];
                                        $qty = $val['qty'];
                                ?>
                                        <tr>
                                            <td><img src="<?php echo '../admin/img/product/' . $image ?>" height="150" width="150" alt="Product Image"></td>
                                            <td class="product-name"><?php echo $pname ?></td>
                                            <td class="product-price"><span class="amount">Rs <?php echo $price ?>/-Only</span></td>
                                            <td class="product-quantity">
                                                <input type="number" value="<?php echo $qty ?>" min="1" />
                                            </td>
                                            <td class="product-subtotal">Rs <?php echo $price * $qty ?>/-Only</td>
                                            <td class="product-remove"><a href="#"><i class="icon-trash icons"></i></a></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='6' style='text-align: center;'>Your cart is empty</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="./index.php">Continue Shopping</a>
                                </div>
                                <div class="buttons-cart checkout--btn">
                                    <a href="#">Update</a>
                                    <a href="#">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->
<?php
require("./footer.php");
?>
