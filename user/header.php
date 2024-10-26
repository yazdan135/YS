<?php
// Start the session to access session variables
session_start();
require("./connection_user.php");
require("./add_to_cart.inc.php");

// Check if the user is logged in by checking if 'id' is set in session
$isLoggedIn = isset($_SESSION['id']);
$obj = new add_to_cart();
$totalProduct=$obj->totalProduct();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>YS | Traders & Co.</title>
    <link rel="shortcut icon" href="../ys logo.png" type="image/x-icon">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
    <!-- Bootstrap framework main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugins css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header sticky-top">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo">
                                    <a href="index.php"><img src="../ys logo.png" style="width: 600px; height: 70px;" alt="logo images"></a>
                                    <a href="index.php"><img src="../trader.png" style="width: 500px; height: 50px;" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <li class="drop"><a href="#">Categories</a>
                                            <ul class="dropdown">
                                                <?php
                                                $sql = "SELECT * FROM category WHERE status = 1";
                                                $result = mysqli_query($con, $sql);
                                                while ($rows = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <li><a href="category.php?id=<?php echo $rows['id'] ?>"><?php echo $rows['category']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li><a href="shopnow.php">All Product</a></li>
                                        <li><a href="./about.php">About Us</a></li>
                                        <li><a href="contact.php">Contact</a></li>

                                    </ul>
                                </nav>
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <?php if ($isLoggedIn): ?>
                                        <!-- If user is logged in, show Logout button -->
                                        <div class="header__account">
                                            <a href="./logout.php">Logout</a>
                                        </div>
                                        <div class="header__account">
                                            <a href="./myorder.php">MyOrder</a>
                                        </div>
                                    <?php else: ?>
                                        <!-- If user is not logged in, show Login and SignUp buttons -->
                                        <div class="header__account">
                                            <a href="./login_user.php">Login</a>
                                        </div>
                                        <div class="header__account">
                                            <a href="./signup.php">SignUp</a>
                                        </div>
                                    <?php endif; ?>

                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                        <a href="./cart.php"><span class="htc__qua"><?php echo $totalProduct ?></span></a>

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
        <hr style="width: 100%; height: 2px; background-color: #ccc; border: none; margin: 0;">