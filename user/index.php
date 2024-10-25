<?php
require("./connection_user.php");
require("./function_user.php");
require("./header.php");
$marqee = "select * from marqee where status = 1";
$result_marqee = mysqli_query($con, $marqee);
?>
<?php
while ($row = mysqli_fetch_array($result_marqee)) {


?>
    <marquee><?php echo $row['sentence'] ?></marquee>
<?php } ?>
<!-- Start Slider Area -->
<div class="slider__container slider--one bg__cat--3">
    <div class="slide__container slider__activation__wrap owl-carousel">
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height" style="background-color: #efefef;">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2>collection 20<?php echo date('y') ?></h2>
                                <h1>Nice Glass</h1>
                                <div class="cr__btn">
                                    <a href="./shopnow.php">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="../banner.png" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
    </div>
</div>
<!-- Start Slider Area -->
<!-- Start Category Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">New Arrivals</h2>
                    <p>Discover our latest arrival: Stylish, modern, and designed for you!</p>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
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
    </div>
</section>
<!-- End Category Area -->
<!-- Start Product Area -->
<section class="ftr__product__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Best Seller</h2>
                    <p>Top-rated, must-have product—limited stock, grab yours today!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">
                <!-- Start Single Category -->
                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="product-details.html">
                                <img src="images/product/9.jpg" alt="product images">
                            </a>
                        </div>

                        <div class="fr__product__inner">
                            <h4><a href="product-details.html">Special Wood Basket</a></h4>
                            <ul class="fr__pro__prize">
                                <li class="old__prize">$30.3</li>
                                <li>$25.9</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->
<?php
require("./footer.php");
?>