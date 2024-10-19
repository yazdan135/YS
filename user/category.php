<?php
require("./connection_user.php");
require("./function_user.php");
require("./header.php");
$cat_id = mysqli_real_escape_string($con, $_GET['id']);
// Fetch the products before the count check
if($cat_id>0){
$get_product = get_product($con, 'latest', 8, 1, $cat_id);
}else{
   ?>
<script>
window.location.href='index.php';
</script>
   <?php
} // Pass the status as 1
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
                            <span class="breadcrumb-item active">Category Page</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->

<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
        <?php if (is_array($get_product) && count($get_product) > 0) { ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="htc__product__rightidebar">
                    <div class="htc__grid__top">
                        <div class="htc__select__option">
                            <select class="ht__select">
                                <option>Default sorting</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by newness</option>
                            </select>
                        </div>

                        <!-- Start List And Grid View -->
                        <ul class="view__mode" role="tablist">
                            <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                            <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>

                    <!-- Start Product View -->
                    <div class="row">
                        <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                <!-- Start Single Category -->
                                <?php foreach ($get_product as $list) { ?>
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

                            <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                <div class="col-xs-12">
                                    <?php foreach ($get_product as $list) { ?>
                                        <div class="ht__list__wrap">
                                            <div class="ht__list__product">
                                                <div class="ht__list__thumb">
                                                    <a href="product.php?id=<?php echo $list['id'] ?>"> <img src="../admin/img/product/<?php echo $list['image'] ?>" style="height: 300px;" alt="product images"></a>
                                                </div>
                                                <div class="htc__list__details">
                                                    <h4><a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['product_name'] ?></a></h4>
                                                    <ul class="pro__prize">
                                                        <h5 class="fr__product__inner"><?php echo $list['l_desc'] ?></h5>
                                                    </ul>
                                                    <ul class="pro__prize">
                                                        <h5 class="fr__product__inner">Rs <?php echo $list['price'] ?>/- Only</h5>
                                                    </ul>
                                                    <div class="fr__list__btn">
                                                        <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product View -->
                </div>
            </div>
        <?php } else {
            echo "No Products Available In This Category";
        } ?>
        </div>
    </div>
</section>
<!-- End Product Grid -->

<?php
require("./footer.php");
?>
