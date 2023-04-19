<?php
session_start();
include "db_conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['email']) && isset($_POST['password'])) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        if (empty($email)) {
            header("Location: receptionist-login.php?error=Email is required");
            exit();
        } else if (empty($password)) {
            header("Location: receptionist-login.php?error=Password is required");
            exit();
        } else {

            //Hashing the password
            $password = md5($password);

            $sql = "SELECT * FROM receptionist WHERE email='$email' AND password='$password'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['email'] === $email && $row['password'] === $password) {
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['rec_name'];
                    $_SESSION['id'] = $row['rec_id'];
                    $_SESSION['address'] = $row['rec_address'];
                    $_SESSION['contact'] = $row['rec_contact'];
                    header("Location: receptionist-dashboard");
                    exit();
                } else {
                    header("Location: receptionist-login.php?error=Incorect User name or password");
                    exit();
                }
            } else {
                header("Location: receptionist-login.php?error=Incorect User name or password");
                exit();
            }
        }
    } else {
        header("Location: receptionist-login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<?php
include 'header.php'
    ?>

<style>
    .form {
        width: 50%;
        margin: auto;
    }
</style>

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Sign In</h2>
                    <div class="bt-option">
                        <a href="./index.html">Home</a>
                        <span>Receptionist Sign In</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Page start -->
<form action="" method="post" class="form">
    <?php if (isset($_GET['error'])) { ?>
        <p class="error">
            <?php echo $_GET['error']; ?>
        </p>
    <?php } ?>
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" name="email" id="form2Example1" class="form-control" />
        <label class="form-label" for="form2Example1">Email address</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" name="password" id="form2Example2" class="form-control" />
        <label class="form-label" for="form2Example2">Password</label>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

    <!-- Register buttons -->

</form>

<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-text">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ft-about">
                        <div class="logo">
                            <a href="#">
                                <img src="img/logo1.png" alt="" width="150" height="150">
                            </a>
                        </div>

                        <div class="fa-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-contact">
                        <h6>Contact Us</h6>
                        <ul>
                            <li>033 22 70 229</li>
                            <li>kingshotel@gmail.com</li>
                            <li>63/5 Pasyala - Attanagalla Rd, Pasyala</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-newslatter">
                        <h6>New latest</h6>
                        <p>Get the latest updates and offers.</p>
                        <form action="#" class="fn-form">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <ul>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Environmental Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="co-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> All rights reserved by KINGS
                            HOTEL</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>