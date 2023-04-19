<!DOCTYPE html>

<script src="js/jquery-3.3.1.min.js"></script>

<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location:index.php");
}
include "db_conn.php";
include "header.php";
?>

<style>
    .wrapper {
        overflow-x: auto;
        margin: 20px;
        /* Add horizontal scroll if table overflows */
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f0f0f0;
        /* Light gray background for table header */
        font-weight: bold;
    }

    .table tbody tr:hover {
        background-color: #f9f9f9;
        /* Lighter gray background on hover */
    }

    .table-heading {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Add some additional styles for table cells */
    .table td {
        font-size: 14px;
        color: #333;
        /* Dark text color for table cells */
    }

    .table th:first-child,
    .table td:first-child {
        padding-left: 20px;
        /* Add left padding for first column */
    }

    .table th:last-child,
    .table td:last-child {
        padding-right: 20px;
        /* Add right padding for last column */
    }
</style>

<div class="wrapper">
    <h1 class="table-heading">Reservation Information</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Room</th>
                <th>Check In</th>
                <th>Check Out</th>

            </tr>
        </thead>
        <tbody>

            <?php
            $id = $_SESSION['id'];
            $tsql = "SELECT * FROM `reservation` WHERE customer_id = '$id';";
            $tre = mysqli_query($conn, $tsql);
            while ($trow = mysqli_fetch_array($tre)) { {
                    $checkinDate = date('Y-m-d', strtotime($trow['checkin']));
                    $checkoutDate = date('Y-m-d', strtotime($trow['checkout']));
                    echo "<tr>
                                                <td>" . $trow['reservation_name'] . "</td>
                                                <td>" . $trow['email'] . "</td>
                                                <td>" . $trow['room_type'] . "</td>
                                                <td>" . $checkinDate . "</td>
                                                <td>" . $checkoutDate . "</td>
                                                
                                                
                                                </tr>";
                }

            }
            ?>

        </tbody>
    </table>
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
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

<script>

</script>


</body>

</html>