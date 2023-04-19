<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KINGS HOTEL</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">



    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #a69a8d, #dfa970, #e8a966, #f9a750);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #a69a8d, #dfa970, #e8a966, #f9a750);
        }

        #mybookings {
            display: none;
        }

        @media (min-width: 768px) {
            .gradient-form {
                /* height: 150vh !important; */
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
</head>

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="canvas-open">
    <i class="icon_menu"></i>
</div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="icon_close"></i>
    </div>
    <div class="search-icon search-switch">
        <i class="icon_search"></i>
    </div>
    <div class="header-configure-area">

        <a href="new-reservation.php" class="bk-btn">Booking Now</a>
    </div>
    <nav class="mainmenu mobile-menu">
        <ul>
            <li class="active"><a href="./index.php">Home</a></li>
            <li><a href="./rooms.html">Rooms</a></li>
            <li><a href="./about-us.html">About Us</a></li>
            <li><a href="./pages.html">Pages</a>
                <ul class="dropdown">
                    <li><a href="./room-details.html">Room Details</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                    <li><a href="#">Family Room</a></li>
                    <li><a href="#">Premium Room</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">News</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="top-social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-tripadvisor"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
    <ul class="top-widget">
        <li><i class="fa fa-phone"></i> 033 22 70 229</li>
        <li><i class="fa fa-envelope"></i> kingshotel@gmail.com</li>
    </ul>
</div>
<!-- Offcanvas Menu Section End -->

<!-- Header Section Begin -->
<header class="header-section">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">
                        <li><i class="fa fa-phone"></i> 033 22 70 229</li>
                        <li><i class="fa fa-envelope"></i> kingshotel@gmail.com</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tn-right">
                        <div class="top-social">
                            <span id="userwelcome"></span>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                        <a href="new-reservation.php" class="bk-btn">Booking Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="img/logo1.png" alt="" width="90" height="90">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php')
                                    echo 'class="active"'; ?>><a
                                        href="./index.php">Home</a></li>
                                <li <?php if (basename($_SERVER['PHP_SELF']) == 'rooms.php')
                                    echo 'class="active"'; ?>><a
                                        href="./rooms.php">Rooms</a></li>
                                <li <?php if (basename($_SERVER['PHP_SELF']) == 'about-us.php')
                                    echo 'class="active"'; ?>><a href="./about-us.php">About Us</a></li>
                                <li <?php if (basename($_SERVER['PHP_SELF']) == 'gallery.php')
                                    echo 'class="active"'; ?>>
                                    <a href="./gallery.php">Gallery</a>
                                </li>
                                <!-- <li <?php //if (basename($_SERVER['PHP_SELF']) == 'blog.html') echo 'class="active"'; ?>><a href="./blog.html">News</a></li> -->
                                <li <?php if (basename($_SERVER['PHP_SELF']) == 'contact.php')
                                    echo 'class="active"'; ?>>
                                    <a href="./contact.php">Contact</a>
                                </li>
                                <li id="loginlink"><a href="">Login</a>
                                    <ul class="dropdown">
                                        <li <?php if (basename($_SERVER['PHP_SELF']) == 'admin-login.php')
                                            echo 'class="active"'; ?>><a href="./admin-login.php">Admin</a></li>
                                        <li <?php if (basename($_SERVER['PHP_SELF']) == 'manager-login.php')
                                            echo 'class="active"'; ?>><a href="./manager-login.php">Manager</a></li>
                                        <li <?php if (basename($_SERVER['PHP_SELF']) == 'receptionist-login.php')
                                            echo 'class="active"'; ?>><a href="./receptionist-login.php">Receptionist</a>
                                        </li>
                                        <li <?php if (basename($_SERVER['PHP_SELF']) == 'staff-login.php')
                                            echo 'class="active"'; ?>><a href="./staff-login.php">Staff</a></li>
                                        <li <?php if (basename($_SERVER['PHP_SELF']) == 'login.php')
                                            echo 'class="active"'; ?>><a href="./login.php">Customer</a></li>
                                    </ul>
                                </li>
                                <li id="signup" <?php if (basename($_SERVER['PHP_SELF']) == 'sign-up.php')
                                    echo 'class="active"'; ?>>
                                    <a href="./sign-up.php">Sign Up</a>
                                </li>
                                <li id="mybookings" <?php if (basename($_SERVER['PHP_SELF']) == 'mybookings.php')
                                    echo 'class="active"'; ?>>
                                    <a href="mybookings.php">My Bookings</a>
                                </li>
                            </ul>
                        </nav>

                        <div class="nav-right search-switch">
                            <i class="icon_search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<script>
    // Use JavaScript to access the session data as JavaScript variables
    var email = "<?php echo $_SESSION['email']; ?>";
    var name = "<?php echo $_SESSION['name']; ?>";
    var id = "<?php echo $_SESSION['id']; ?>";

    var isloggedIn = "<?php echo isset($_SESSION['email']) ? 'true' : 'false'; ?>"

    if (isloggedIn === 'true') {
        $("#loginlink").html('<a href="./logout.php">Logout</a>');
        $("#signup").html('<a href="./mybookings.php">Bookings</a>');
        $("#userwelcome").text('Hi <?php echo $_SESSION['name']; ?>');
    }

    if ($('#loginlink').text() === 'Logout') {
        $('#loginlink').click(function () {
            $.ajax({
                url: 'index.php',
                data: { logout: true },
                type: 'POST',
                success: function (res) {
                    window.location.href = 'index.php';
                }

            });
        });
    }

</script>