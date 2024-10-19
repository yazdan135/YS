  <?php
    require("./connection_user.php");
    ?><!-- Start Footer Area -->
  <footer id="htc__footer">
      <!-- Start Footer Widget -->
      <div class="footer__container bg__cat--1">
          <div class="container">
              <div class="row">
                  <!-- Start Single Footer Widget -->
                  <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="footer">
                          <h2 class="title__line--2">ABOUT US</h2>
                          <div class="ft__details">
                              <p>At YS | Traders & Co. we are passionate about creating premium glass items that blend elegance with functionality. Every piece is carefully crafted to bring both beauty and durability into your life.</p>
                              <div class="ft__social__link">
                                  <ul class="social__link">


                                      <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                                      <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>

                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End Single Footer Widget -->
                  <!-- Start Single Footer Widget -->
                  <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                      <div class="footer">
                          <h2 class="title__line--2">Information</h2>
                          <div class="ft__inner">
                              <ul class="ft__list">
                                  <li><a href="./about.php">About us</a></li>
                                  <li><a href="./trem.php">Privacy & Policy</a></li>
                                  <li><a href="./trem.php">Terms & Condition</a></li>
                                 
                              </ul>
                          </div>
                      </div>
                  </div>
                  <!-- End Single Footer Widget -->
                  <!-- Start Single Footer Widget -->
                  <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                      <div class="footer">
                          <h2 class="title__line--2">Our Pages</h2>
                          <div class="ft__inner">
                              <ul class="ft__list">
                                  <li><a href="./index.php">Home</a></li>
                                  <li><a href="./about.php">About Us</a></li>
                                  <li><a href="./login_user.php">Login</a></li>
                                  <li><a href="./mycart.php">My Cart</a></li>
                                  <li><a href="./shopnow.php">All Product</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <!-- End Single Footer Widget -->
                  <!-- Start Single Footer Widget -->
                  <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                      <div class="footer">
                          <h2 class="title__line--2">NEWSLETTER </h2>
                          <div class="ft__inner">
                              <form method="post">
                                  <div class="news__input">
                                      <input type="text" placeholder="Your Name*" name="name" required>
                                      <br>
                                      <br>
                                      <input type="email" placeholder="Your Mail*" name="email" required>
                                      <div class="send__btn">
                                          <button class="btn btn-danger" name="submit" type="submit" value="submit">Subscribe</button>
                                      </div>
                                  </div>

                              </form>
                          </div>
                          <?php

if (isset($_POST['submit'])) {
    // Get the form data
    $email = $_POST['email'];
    $name = $_POST['name'];

    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM news WHERE email = '$email'";
    $checkEmailResult = mysqli_query($con, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        // Email already exists
        echo "<script>alert('Email already exists, please try another email.');</script>";
    } else {
        // Insert new record if email doesn't exist
        $sql = "INSERT INTO news (email, name) VALUES ('$email', '$name')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>alert('Thank you for subscribing to our newsletter.');</script>";
        } else {
            echo "<script>alert('Failed to subscribe to our newsletter.');</script>";
        }
    }
}
?>

                      </div>
                  </div>
                  <!-- End Single Footer Widget -->
              </div>
          </div>
      </div>
      <!-- End Footer Widget -->
      <!-- Start Copyright Area -->
      <div class="htc__copyright bg__cat--5">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="copyright__inner">
                          <p>Copyright© 20<?php echo date('y') ?> All right reserved.</p>
                          <a href="#"><img src="images/others/shape/paypol.png" alt="payment images"></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Copyright Area -->
  </footer>
  <!-- End Footer Style -->
  </div>
  <!-- Body main wrapper end -->

  <!-- Placed js at the end of the document so the pages load faster -->

  <!-- jquery latest version -->
  <script src="js/vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap framework js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- All js plugins included in this file. -->
  <script src="js/plugins.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <!-- Waypoints.min.js. -->
  <script src="js/waypoints.min.js"></script>
  <!-- Main js file that contents all jQuery plugins activation. -->
  <script src="js/main.js"></script>

  </body>

  </html>