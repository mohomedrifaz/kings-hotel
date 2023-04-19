<!DOCTYPE html>
<html lang="zxx">

<?php
session_start();
include "header.php"
    ?>

<style>
    .page-wrapper {
        display: flex;
        justify-content: space-between;
        height: auto;
        margin-top: 12px;
        /* margin-bottom: 25px; */
        background-color: #e7ba8dbd;
    }

    .image img {
        min-width: 100%;
        padding: 0 20px 0 0;
        height: 350px;
    }

    .availabiliy-message {
        width: 50%;
        margin: auto;
        text-align: center;
        font-weight: 700;
        font-size: 30px;
        color: red;
        background-color: #ffffff6b;
        border-radius: 15px;
        margin-right: 20px;
        padding: 10px;
    }

    .image {
        width: 50%;
    }

    .btn {
        display: inline-block;
        padding: 5px 10px;
        background-color: green;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: darkgreen;
    }
</style>

<div class="page-wrapper">
    <div class="image"> <img src="img/hero/hero-3.jpg" /></div>
    <div class="availabiliy-message">
        <?php
        $status = isset($_GET['status']) ? $_GET['status'] : '';

        if ($status === 'booking-available') {
            echo 'Availability - Booking Available  </br><a href="new-reservation.php" class="btn">Book Now</a>';
        } elseif ($status === 'booking-not-available') {
            echo 'Availability - No Booking Available </br><span class="sad-emoji">&#128532;</span>';
        } else {
            echo 'Booking Status Unknown';
        }
        ?>

    </div>
</div>

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


<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

<script>
    $(document).ready(function () {
        var message = $('.availabiliy-message').text().trim();

        if (message.includes('Availability - Booking Available')) {
            // Change the color to green
            $('.availabiliy-message').css('color', 'green');
        } else if (message === 'Booking Status Unknown') {
            // Change the color to orange
            $('.availabiliy-message').css('color', 'orange');
        }
    });
</script>


</body>

</html>