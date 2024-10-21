<?php
require("./function_user.php");
require("./header.php");

// Check if the session cart is set and not empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty.";
} else {
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
                                        <th class="product-thumbnail">Product</th>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($_SESSION['cart'] as $key => $val) {
                                        // Fetch product details using the product ID ($key) from session cart
                                        $productArr = get_product($con, '', '', '', '', $key); // Use $key as product ID

                                        // If product is not found, skip to the next one
                                        if (empty($productArr)) {
                                            echo "No product found for ID $key.<br>";
                                            continue;
                                        }

                                        // Proceed with displaying product details
                                        $pName = $productArr[0]['product_name'];
                                        $pPrice = $productArr[0]['price'];
                                        $pImage = $productArr[0]['image'];
                                        $qty = $val['qty'];

                                    ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?php echo '../admin/img/product/' . $pImage; ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $pName; ?></a></td>
                                            <td class="product-price"><span class="amount">Rs <?php echo $pPrice; ?>/- Only</span></td>
                                            <td class="product-quantity">
                                                <input type="number" id="<?php echo $key; ?>qty" value="<?php echo $qty; ?>" />
                                                <br>
                                                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key; ?>','update')">Update</a>
                                            </td>
                                            <td class="product-subtotal">Rs <?php echo $pPrice * $qty; ?>/- Only</td>
                                            <td class="product-remove">
                                                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key; ?>','remove')"><i class="icon-trash icons"></i></a>
                                            </td>
                                        </tr>


                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="buttons-cart--inner">
                                    <div class="buttons-cart">
                                        <a href="./shopnow.php">Continue Shopping</a>
                                    </div>
                                    <div class="buttons-cart checkout--btn">

                                        <a href="./checkout.php">Checkout</a>
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
    <!-- End Banner Area -->

<?php
    require("./footer.php");
}
?>