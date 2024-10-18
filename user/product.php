<?php
require("./connection_user.php");
require("./function_user.php");
require("./header.php");
$product_id = mysqli_real_escape_string($con, $_GET['id']);
if ($product_id > 0) {
    $get_product = get_product($con, 'latest', 8, 1, '', $product_id);
} else {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../page\ banner.png) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <a class="breadcrumb-item" href="./category.php?id=<?php echo $get_product['0']['category_id'] ?>"><?php echo $get_product['0']['category'] ?></a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active"><?php echo $get_product['0']['product_name'] ?></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Details Area -->
<section class="htc__product__details bg__white ptb--100">
    <!-- Start Product Details Top -->
    <div class="htc__product__details__top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">
                        <!-- Start Product Big Images -->
                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                    <img src="../admin/img/product/<?php echo $get_product['0']['image'] ?>" alt="full-image">
                                </div>
                            </div>
                        </div>
                        <!-- End Product Big Images -->

                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="ht__product__dtl">
                        <div class="sin__desc align--left">
                            <p><span>Name:</span></p>
                            <ul class="pro__cat__list">
                                <h4><?php echo $get_product['0']['product_name'] ?></h4>
                            </ul>

                        </div>
                        <div class="sin__desc align--left">
                            <p><span>Price:</span></p>
                            <ul class="pro__cat__list">
                                <li>Rs <?php echo $get_product['0']['price'] ?>/- Only</li>
                            </ul>

                        </div>
                        <div class="sin__desc align--left">
                            <p><span>Paking:</span></p>
                            <ul class="pro__cat__list">
                                <li><?php echo $get_product['0']['paking'] ?></li>
                            </ul>

                        </div>
                        <div class="sin__desc align--left">
                            <p><span>Quantity:</span></p>
                            <ul class="pro__cat__list">
                                <li>
                                    <select id="qty">
                                        <option value="1">1 Box</option>
                                        <option value="2">2 Box</option>
                                        <option value="3">3 Box</option>
                                        <option value="4">4 Box</option>
                                        <option value="5">5 Box</option>
                                        <option value="6">6 Box</option>
                                        <option value="7">7 Box</option>
                                        <option value="8">8 Box</option>
                                        <option value="9">9 Box</option>
                                        <option value="10">10 Box</option>
                                    </select>

                                </li>
                            </ul>
                        </div>


                        <div class="sin__desc align--left">
                            <p><span>Categories:</span></p>
                            <ul class="pro__cat__list">
                                <li><?php echo $get_product['0']['category'] ?></li>
                            </ul>

                        </div>
                        <br>
                        <div class="fr__list__btn">
                            <ul>
                                <li>
                                <a class="fr__btn" href="#">Add To Cart</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Product Details Top -->
</section>
<!-- End Product Details Area -->
<!-- Start Product Description -->
<section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="ht__pro__details__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                        <div class="pro__tab__content__inner">
                            <h4 class="ht__pro__title">Description</h4>
                            <p><?php echo $get_product['0']['l_desc'] ?></p>
                        </div>
                    </div>
                    <!-- End Single Content -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Description -->
<!-- Start Product Area -->
<section class="htc__product__area--2 pb--100 product-details-res">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">New Arrivals</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__list clearfix mt--30">
                <!-- Start Single Category -->
                <?php
                $get_product = get_product($con, 'latest', 4, 1); // Pass the status as 1
                foreach ($get_product as $list) {
                ?>
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="product.php?id=<?php echo $list['id'] ?>">
                                    <img src="../admin/img/product/<?php echo $list['image'] ?>" alt="product images">
                                </a>
                            </div>

                            <div class="fr__product__inner">
                                <h4><a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['product_name'] ?></a></h4>
                                <ul class="fr__pro__prize">

                                    <h5 class="fr__product__inner"><?php echo $list['s_desc'] ?></h5>

                                </ul>
                                <ul class="fr__pro__prize">
                                    <li class="old__prize"> <strong class="text-dark"> Rs <?php echo $list['price'] ?>/- only</strong></li>


                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- End Single Category -->
            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->
<!-- End Banner Area -->
<?php
require("./footer.php");
?>