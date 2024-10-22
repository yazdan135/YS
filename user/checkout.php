<?php
require("./connection_user.php");
require("./function_user.php");
require("./header.php");

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
$is_logged_in = isset($_SESSION['id']);

$cartTotal = 0;
foreach ($_SESSION['cart'] as $key => $val) {
    $productArr = get_product($con, '', '', '', '', $key);
    if (!empty($productArr)) {
        $pPrice = $productArr[0]['price'];
        $qty = $val['qty'];
        $cartTotal += ($pPrice * $qty);
    }
}

if (isset($_POST['submit'])) {
    $number = $_POST['number'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $code = $_POST['code'];
    $payment_type = $_POST['payment'];

    // Ensure that the user_id is set
    if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
    } else {
        echo "<script>alert('User is not logged in. Please log in to continue.');</script>";
        exit; // Stop further processing
    }

    $total = $cartTotal;
    $payment_status = 'pending';
    $order_status = '1'; // Ensure this column exists in your database
    $added_on = date('Y-m-d');

    // Use prepared statements to prevent SQL injection for order insertion
    $stmt = $con->prepare("INSERT INTO orders (user_id, phone, city, address, postal_code, total_price, payment_type, payment_status, orders_status, added_on) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssss", $user_id, $number, $city, $address, $code, $total, $payment_type, $payment_status, $order_status, $added_on);

    if ($stmt->execute()) {
        // Order placed successfully
        $order_id = mysqli_insert_id($con); // Get the last inserted order ID

        // Insert order details
        foreach ($_SESSION['cart'] as $key => $val) {
            $productArr = get_product($con, '', '', '', '', $key);
            if (!empty($productArr)) {
                $pPrice = $productArr[0]['price'];
                $qty = $val['qty'];

                // Prepare and execute insertion for order details
                $detail_stmt = $con->prepare("INSERT INTO orders_detail (orders_id, product_id, product_qty, price) VALUES (?, ?, ?, ?)");
                $detail_stmt->bind_param("iiid", $order_id, $key, $qty, $pPrice);

                if (!$detail_stmt->execute()) {
                    echo "<script>alert('Error placing order detail: " . $detail_stmt->error . "');</script>";
                }
                $detail_stmt->close();
            }
        }
 // Clear the cart
 unset($_SESSION['cart']);
        echo "<script>alert('Order placed successfully , Thanks For Shopping!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error placing order: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}
?>

<style>
    .accordion .accordion__title {
        background: #f4f4f4;
        height: 65px;
        line-height: 65px;
        display: flex;
        align-items: center;
        padding: 0 30px;
        position: relative;
        font-size: 16px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 10px;
        font-family: "Poppins";
        cursor: pointer;
    }

    .accordion .accordion__body {
        display: none;
        padding: 15px;
        background-color: #fff;
    }

    .accordion__title.active {
        background-color: #ddd;
    }

    .disabled {
        pointer-events: none;
        opacity: 0.6;
    }
</style>

<script>
    var isLoggedIn = <?php echo $is_logged_in ? 'true' : 'false'; ?>;
    var loginMessage = "<?php echo isset($_SESSION['login_message']) ? $_SESSION['login_message'] : ''; ?>";
    <?php unset($_SESSION['login_message']); ?>
</script>

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
                            <span class="breadcrumb-item active">Checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->

<!-- Checkout area -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">

                            <!-- Checkout Method Accordion (Login) -->
                            <div class="accordion__title <?php echo $is_logged_in ? 'disabled' : ''; ?>">
                                Checkout
                            </div>
                            <div class="accordion__body" <?php echo $is_logged_in ? 'style="display:none;"' : ''; ?>>
                                <div class="accordion__body__form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="checkout-method__login">
                                                <form id="login-form" action="checkout.php" method="post">
                                                    <div class="single-contact-form">
                                                        <div class="contact-box name">
                                                            <input type="email" name="email" placeholder="Your Email*" required>
                                                        </div>
                                                    </div>
                                                    <div class="single-contact-form">
                                                        <div class="contact-box name">
                                                            <input type="password" name="password" placeholder="Your Password*" required>
                                                        </div>
                                                    </div>
                                                    <div class="contact-btn">
                                                        <button type="submit" name="submit" class="fv-btn">Login</button>
                                                    </div>
                                                    <br>
                                                    <a href="./signup.php">I Don't Have My Account</a>
                                                </form>

                                                <?php
                                                if (isset($_POST['submit'])) {
                                                    // Get form data
                                                    $email = $_POST['email'];
                                                    $password = $_POST['password'];

                                                    // Check if user exists in database
                                                    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
                                                    $result = mysqli_query($con, $sql);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        $user = mysqli_fetch_assoc($result);
                                                        $_SESSION['id'] = $user['id'];
                                                        $_SESSION['email'] = $user['email'];
                                                        $_SESSION['login_message'] = "User Login Successfully"; // Store success message
                                                        echo "<script>window.location.href='checkout.php';</script>"; // Redirect
                                                    } else {
                                                        echo "<script>alert('Login Failed. User does not exist.');</script>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Address Information Accordion -->
                            <div class="accordion__title">
                                Address Information
                            </div>
                            <div class="accordion__body">
                                <div class="bilinfo">
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="number" placeholder="Phone Number In +92xxxxxxxxx Format" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="city" placeholder="City" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="address" placeholder="Apartment/Block/House No." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="code" placeholder="Postal Code" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <select class="form-control" name="payment" id="paymentMethod" required>
                                                        <option value="" disabled selected>Select Payment Method</option>
                                                        <option value="cashOnDelivery">Cash on Delivery</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 20px;">Order Confirm</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">
                        <?php
                        $cartTotal = 0;
                        foreach ($_SESSION['cart'] as $key => $val) {
                            $productArr = get_product($con, '', '', '', '', $key);

                            if (empty($productArr)) {
                                echo "No product found for ID $key.<br>";
                                continue;
                            }

                            $pName = $productArr[0]['product_name'];
                            $pPrice = $productArr[0]['price'];
                            $pImage = $productArr[0]['image'];
                            $qty = $val['qty'];
                            $cartTotal = $cartTotal + ($pPrice * $qty);
                        ?>
                            <div class="single-item">
                                <div class="single-item__thumb">
                                    <img src="<?php echo '../admin/img/product/' . $pImage; ?>" alt="ordered item">
                                </div>
                                <div class="single-item__content">
                                    <a href="#"><?php echo $pName; ?></a>
                                    <span class="price">Rs <?php echo $pPrice * $qty; ?>/- Only</span>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="order-details__count">
                        <h5>Delivery Charges</h5>
                        <span class="price">Depend Upon Your Area</span>
                    </div>
                    <div class="order-details__total">
                        <h5>Order total</h5>
                        <span class="price">Rs <?php echo $cartTotal ?>/- Only</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout area end -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Accordion functionality
        $('.accordion__title').click(function() {
            if (isLoggedIn) {
                $(this).toggleClass('active');
                $(this).next('.accordion__body').slideToggle();
            } else {
                // Show login alert if not logged in
                if ($(this).text().trim() !== "Checkout Method") {
                    alert("Please log in to access this section.");
                }
            }
        });

        // Show login message if user is logged in
        if (isLoggedIn) {
            alert("Now You Are Login Enjoy Our Products!");
            // Hide login section if already logged in
            $('.accordion__title').first().addClass('disabled'); // Disable login title
            $('.accordion__body').first().hide(); // Hide login body
            // Show Address and Payment Information accordion
            $('.accordion__title').slice(1).show(); // Show address and payment info titles
        } else {
            // Hide Address and Payment Information accordions if not logged in
            $('.accordion__title').slice(1).hide();
        }
    });
</script>

<?php
require("./footer.php");
?>
