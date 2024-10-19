<?php
require("./connection_user.php");
require("./function_user.php");
require("./header.php");
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../banner\ page.png) no-repeat scroll center center / cover;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">All Products</span>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="htc__product__rightidebar">
                    <div class="htc__grid__top">


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
                                <?php
                                $get_product = get_product($con, 'latest', '', ''); // Pass the status as 1
                                foreach ($get_product as $list) {
                                ?>
                                    <!-- Start Single Product -->
                                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                        <div class="category">
                                            <div class="ht__cat__thumb">
                                                <a href="product.php?id=<?php echo $list['id'] ?>">
                                                    <img src="../admin/img/product/<?php echo $list['image'] ?>" style="height: 300px; width:300px;" alt="<?php echo $list['product_name'] ?>">
                                                </a>
                                            </div>
                                            <div class="fr__product__inner">
                                                <h4><a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['product_name'] ?></h4>
                                                <ul class="fr__pro__prize">
                                                    <li class="old__prize"> <strong class="text-dark"> Rs <?php echo $list['price'] ?>/- only</strong></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                <?php } ?>

                            </div>
                            <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                <div class="col-xs-12">
                                    <div class="ht__list__wrap">
                                        <?php
                                        $get_product = get_product($con, 'latest', '', ''); // Pass the status as 1
                                        foreach ($get_product as $list) {
                                        ?>
                                            <!-- Start List Product -->
                                            <div class="ht__list__product">

                                                <div class="ht__list__thumb">
                                                    <a href="product.php?id=<?php echo $list['id'] ?>"><img src="../admin/img/product/<?php echo $list['image'] ?>" style="height: 300px; width:300px;" alt="product images"></a>
                                                </div>

                                                <div class="htc__list__details">
                                                    <div class="sin__desc align--left">
                                                        <p><span>Name:</span></p>
                                                        <ul class="pro__cat__list">
                                                            <h4><?php echo $list['product_name'] ?></h4>
                                                        </ul>

                                                    </div>
                                                    <div class="sin__desc align--left">
                                                        <p><span>Price:</span></p>
                                                        <ul class="pro__cat__list">
                                                            <h4><?php echo $list['price'] ?></h4>
                                                        </ul>

                                                    </div>
                                                    <div class="sin__desc align--left">
                                                        <p><span>Packing:</span></p>
                                                        <ul class="pro__cat__list">
                                                            <h4><?php echo $list['paking'] ?></h4>
                                                        </ul>

                                                    </div>
                                                    <div class="sin__desc align--left">
                                                        <p><span>Category:</span></p>
                                                        <ul class="pro__cat__list">
                                                            <h4><?php echo $list['product_name'] ?></h4>
                                                        </ul>

                                                    </div>


                                                    <div class="sin__desc align--left">
                                                        <p><span>Description:</span></p>
                                                        <ul class="pro__cat__list">
                                                            <h4><?php echo $list['l_desc'] ?></h4>
                                                        </ul>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- End List Product -->
                                            <hr style="border: 1px solid #ccc; margin: 20px 0;">

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product View -->
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End Product Grid -->
<?php
require("./footer.php");
?>