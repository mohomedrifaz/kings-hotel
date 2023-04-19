<!-- Include SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
<!-- Include SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.js"></script>

<?php
session_start();
include 'header.php';

if (!isset($_SESSION['id'])) {
    // Session data does not exist, show a custom alert and redirect to sign-in.php
    echo '<script>
      Swal.fire({
        title: "Please login to make a reservation.",
        icon: "warning",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "OK",
        customClass: {
            title: "my-title-class",
            text: "my-text-class",
            confirmButton: "my-confirm-button-class"
          }
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "login.php";
        }
      });
    </script>';
}
?>


<style>
    /* #booking {
        background-image: linear-gradient(to right, #7B1FA2, #E91E63)
    } */

    .my-confirm-button-class {
        background-color: rgb(217 160 107) !important;
    }

    .section {
        position: relative;
        height: 100vh
    }

    .section .section-center {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%)
    }

    #booking {
        font-family: 'Raleway', sans-serif
    }

    .booking-form {
        position: relative;
        max-width: 642px;
        width: 100%;
        margin: auto;
        padding: 40px;
        overflow: hidden;
        background-image: url('https://i.imgur.com/8z1tx3u.jpg');
        background-size: cover;
        border-radius: 5px;
        z-index: 20
    }

    .booking-form::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: -1
    }

    .booking-form .form-header {
        text-align: center;
        position: relative;
        margin-bottom: 30px
    }

    .booking-form .form-header h1 {
        font-weight: 700;
        text-transform: capitalize;
        font-size: 42px;
        margin: 0px;
        color: #fff
    }

    .booking-form .form-group {
        position: relative;
        margin-bottom: 30px
    }

    .booking-form .form-control {
        background-color: rgba(255, 255, 255, 0.2);
        height: 60px;
        padding: 0px 25px;
        border: none;
        border-radius: 40px;
        color: #fff;
        -webkit-box-shadow: 0px 0px 0px 2px transparent;
        box-shadow: 0px 0px 0px 2px transparent;
        -webkit-transition: 0.2s;
        transition: 0.2s
    }

    .booking-form .form-control::-webkit-input-placeholder {
        color: rgba(255, 255, 255, 0.5)
    }

    .booking-form .form-control:-ms-input-placeholder {
        color: rgba(255, 255, 255, 0.5)
    }

    .booking-form .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5)
    }

    .booking-form .form-control:focus {
        -webkit-box-shadow: 0px 0px 0px 2px #ff8846;
        box-shadow: 0px 0px 0px 2px #ff8846
    }

    .booking-form input[type="date"].form-control {
        padding-top: 16px
    }

    .booking-form input[type="date"].form-control:invalid {
        color: rgba(255, 255, 255, 0.5)
    }

    .booking-form input[type="date"].form-control+.form-label {
        opacity: 1;
        top: 10px
    }

    .booking-form select.form-control {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none
    }

    .booking-form select.form-control:invalid {
        color: rgba(255, 255, 255, 0.5)
    }

    .booking-form select.form-control+.select-arrow {
        position: absolute;
        right: 15px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        width: 32px;
        line-height: 32px;
        height: 32px;
        text-align: center;
        pointer-events: none;
        color: rgba(255, 255, 255, 0.5);
        font-size: 14px
    }

    .booking-form select.form-control+.select-arrow:after {
        content: '\279C';
        display: block;
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg)
    }

    .booking-form select.form-control option {
        color: #000
    }

    .booking-form .form-label {
        position: absolute;
        top: -10px;
        left: 25px;
        opacity: 0;
        color: #ff8846;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.3px;
        height: 15px;
        line-height: 15px;
        -webkit-transition: 0.2s all;
        transition: 0.2s all
    }

    .booking-form .form-group.input-not-empty .form-control {
        padding-top: 16px
    }

    .booking-form .form-group.input-not-empty .form-label {
        opacity: 1;
        top: 10px
    }

    .booking-form .submit-btn {
        color: #fff;
        background-color: #e35e0a;
        font-weight: 700;
        height: 60px;
        padding: 10px 30px;
        width: 100%;
        border-radius: 40px;
        border: none;
        text-transform: uppercase;
        font-size: 16px;
        letter-spacing: 1.3px;
        -webkit-transition: 0.2s all;
        transition: 0.2s all
    }

    .booking-form .submit-btn:hover,
    .booking-form .submit-btn:focus {
        opacity: 0.9
    }
</style>

<body>


    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <div class="form-header">
                            <h1>Make your reservation</h1>
                        </div>
                        <form action="new-reservation-validation.php" method="post">
                            <div class="form-group">
                                <input name="reservation_name" class="form-control" type="text"
                                    placeholder="Reservation Name">
                                <input hidden name="customer_id" id="hidden-customer-id" class="form-control"
                                    type="text" placeholder="Reservation Name">
                                <input hidden name="customer_name" id="hidden-customer-name" class="form-control"
                                    type="text" placeholder="Reservation Name">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="checkin" class="form-control" type="date" required>
                                        <span class="form-label">Check
                                            In</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="checkout" class="form-control" type="date" required> <span
                                            class="form-label">Check out</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="roomtype" class="form-control" required>
                                            <option value="" selected hidden>Room Type</option>
                                            <option value="premium">Premium King Room</option>
                                            <option value="deluxe">Deluxe Room</option>
                                            <option value="double">Double Room</option>
                                            <option value="luxury">Luxury Room</option>
                                            <option value="family">Family Room</option>
                                            <option value="small">Small Room</option>
                                        </select> <span class="select-arrow"></span>
                                        <span class="form-label">Rooms
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="email" class="form-control" type="email"
                                            placeholder="Enter your Email"> <span class="form-label">Email</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="contact" class="form-control" type="tel"
                                            placeholder="Enter you Phone"> <span class="form-label">Phone</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn"> <button type="submit" class="submit-btn">Book Now</button> </div>
                        </form>
                    </div>
                </div>
            </div>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/main.js"></script>

    <script>

        // Use JavaScript to access the session data as JavaScript variables
        var session_name = "<?php echo $_SESSION['name']; ?>";
        var session_id = "<?php echo $_SESSION['id']; ?>";

        $('#hidden-customer-id').val(session_id);
        $('#hidden-customer-name').val(session_name);

        console.log(session_name);
        console.log(session_id);
    </script>
</body>