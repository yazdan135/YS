<?php
require("./connection_user.php");
require("./header.php");
?>

<style>
    /* Flexbox centering */
    .htc__contact__area {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding: 20px;
        background-color: #f9f9f9;
    }

    /* Form container */
    .form-container {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    /* Form inputs and button consistent size */
    .contact-box input,
    .contact-btn button {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        box-sizing: border-box;
        /* Ensure consistent sizing including padding */
    }

    /* Input field focus state */
    .contact-box input:focus {
        border-color: #333;
    }

    /* Submit button styles */
    .contact-btn button {
        background-color: #333;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .contact-btn button:hover {
        background-color: #555;
    }

    /* Responsive adjustments */
    @media only screen and (max-width: 768px) {
        .htc__contact__area {
            padding: 20px;
        }

        .form-container {
            padding: 20px;
        }
    }
</style>

<!-- Start Breadcrumb area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat center center / cover;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Sign Up</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb area -->

<!-- Start Contact Area -->
<section class="htc__contact__area">
    <div class="form-container">
        <div class="contact-title text-center">
            <h2 class="title__line--6">Sign Up</h2>
        </div>
        <form id="contact-form" action="#" method="post">
            <div class="single-contact-form">
                <div class="contact-box name">
                    <input type="text" name="name" placeholder="Your Name*" required>
                </div>
            </div>
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
                <button type="submit" name="submit" class="fv-btn">Sign Up</button>
            </div>
        </form>
    </div>
</section>
<!-- End Contact Area -->

<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email already exists
    $check_email = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($con, $check_email);

    if(mysqli_num_rows($result) > 0){
        // Email exists
        echo "<script>alert('Email already exists. Please use a different email.');</script>";
    } else {
        // Email does not exist, proceed with the registration
        $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($con, $sql);

        if($result){
            echo "<script>alert('User registered successfully'); window.location.href='login_user.php';</script>";
        } else {
            echo "<script>alert('Error registering user');</script>";
        }
    }
}
require("./footer.php");
?>
