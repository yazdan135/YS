<?php
require("./connection_user.php");
require("./header.php");
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Contact Us</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="contact-form-wrap mt--60">
                <div class="col-xs-12">
                    <div class="contact-title">
                        <h2 class="title__line--6">SEND A QUERY</h2>
                    </div>
                </div>
                <div class="col-xs-12">
                    <form id="contact-form" action="#" method="post">
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="text" name="name" required placeholder="Your Name*" required>
                                <input type="email" name="email" required placeholder="Mail*" required>
                                <input type="text" name="number" required placeholder="Phone number (+92XXXXXXXXXX)*" pattern="^\+92[0-9]{10}$">
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box message">
                                <textarea name="message" required placeholder="Your Message" required></textarea>
                            </div>
                        </div>
                        <div class="contact-btn">
                            <button type="submit" name="submit" class="fv-btn">SEND MESSAGE</button>
                        </div>
                    </form>
                    <div class="form-output">
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Area -->
<!-- End Banner Area -->
<?php
if (isset($_POST['submit'])) {
    // Sanitize input data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    $added_on = date('Y-m-d');

    // Validate phone number
    if (!preg_match('/^\+92[0-9]{10}$/', $number)) {
        echo "<script>alert('Phone number must be in the format +92XXXXXXXXXX');</script>";
    } else {
        // Prepare the SQL statement
        $sql = "INSERT INTO contact (name, email, mobile, comment, added_on) VALUES ('$name', '$email', '$number', '$message', '$added_on')";
        $res = mysqli_query($con, $sql);

        if ($res) {
            echo "<script>alert('Message sent successfully');</script>";
        } else {
            echo "<script>alert('Failed to send message');</script>";
        }
    }
}

require("./footer.php");
?>