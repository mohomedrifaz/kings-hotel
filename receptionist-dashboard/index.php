<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator </title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<style>
    .content {
        text-align: center;
        font-size: 36px;
        /* font-weight: 600; */
        text-transform: uppercase;
    }

    .time {
        padding-top: 20px;
        font-size: 24px;
    }

    .admin-stats {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
        padding: 25px;
        background-color: #4c4848;
        /* dark background color */
        color: #fff;
        transition: all 0.5s ease-in;
        /* added transition property */
        /* text color */
        border-radius: 15px;
    }

    .stat-box {
        text-align: center;
        border: none;
        /* remove border */
        width: 200px;
        height: 150px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        background-color: #262626;
        /* dark box background color */
        padding: 15px;
        box-shadow: 0px 0px 5px rgba(255, 255, 255, 0.1);
        transition: all 0.5s ease-in;
        /* added transition property */
        border-radius: 15px;
        /* add box shadow */
    }

    .stat-heading {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .stat-detail {
        font-size: 28px;
        font-weight: bold;
    }

    .admin-stats:hover .stat-box {
        transform: scale(1.05);
        /* added hover effect */
    }
</style>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    MAIN MENU
                </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">

                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a href="view-bookings.php"><i class="fa fa-bar-chart-o"></i> Room Booking</a>
                    </li>
<li>
                        <a href="new-reservation.php"><i class="fa fa-bar-chart-o"></i>New Reservation</a>
                    </li>

                    <li>
                        <a href="view-customer.php"><i class="fa fa-qrcode"></i> Customers</a>
                    </li>

<li>
                        <a href="add-customer.php"><i class="fa fa-qrcode"></i> Add Customer</a>
                    </li>

                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">

                <div class="content">
                    <div class="greeting">
                        Hi
                        <?php echo $_SESSION["name"]; ?>
                    </div>
                    <div class="greeting-emoji">
                        &#x1F64F;
                    </div>
                </div>

                <div class="admin-stats">

                    <div class="stat-box">
                        <div class="stat-heading">
                            Total No of Bookings
                        </div>
                        <div class="stat-detail">
                            <?php
                            include('db.php');
                            $sql = "SELECT COUNT(*) AS row_count FROM reservation;";
                            $result = mysqli_query($con, $sql);

                            $row = mysqli_fetch_assoc($result);
                            $rowCount = $row['row_count'];

                            echo $rowCount;

                            ?>
                        </div>
                    </div>

                    <div class="stat-box">
                        <div class="stat-heading">
                            No of Bookings Today
                        </div>
                        <div class="stat-detail">
                            <?php
                            include('db.php');
                            $currentDate = date('Y-m-d');
                            $sql = "SELECT COUNT(*) AS row_count FROM reservation WHERE DATE(checkin) = '$currentDate'";
                            $result = mysqli_query($con, $sql);

                            $row = mysqli_fetch_assoc($result);
                            $rowCount = $row['row_count'];

                            echo $rowCount;

                            ?>
                        </div>
                    </div>

                    <div class="stat-box">
                        <div class="stat-heading">
                            No of Available Rooms
                        </div>
                        <div class="stat-detail">
                            <?php
                            include "db.php";

                            // Retrieve the selected date from the form submission
                            
                            $selected_date = date('Y-m-d');

                            // Query the reservation table for reservations on the selected date
                            $query = "SELECT * FROM `reservation` WHERE DATE(checkin) <= '$selected_date' AND DATE(checkout) >= '$selected_date'";
                            $result = mysqli_query($con, $query);

                            // Retrieve the reserved room types
                            $reserved_room_types = array();
                            while ($row = mysqli_fetch_assoc($result)) {
                                $reserved_room_types[] = $row['room_type'];
                            }

                            // Query the roomtype table for all room types
                            $query = "SELECT * FROM `roomtype`";
                            $result = mysqli_query($con, $query);

                            // Retrieve all room types
                            $all_room_types = array();
                            while ($row = mysqli_fetch_assoc($result)) {
                                $all_room_types[] = $row['name'];
                            }

                            // Determine available room types
                            $available_room_types = array_diff($all_room_types, $reserved_room_types);

                            // Get the count of available rooms
                            $available_room_count = count($available_room_types);

                            // Echo the count of available rooms
                            echo $available_room_count;

                            ?>
                        </div>
                    </div>

                    <div class="stat-box">
                        <div class="stat-heading">
                            Total Number of customers
                        </div>
                        <div class="stat-detail">
                            <?php
                            include('db.php');
                            $sql = "SELECT COUNT(*) AS row_count FROM customer_reg;";
                            $result = mysqli_query($con, $sql);

                            $row = mysqli_fetch_assoc($result);
                            $rowCount = $row['row_count'];

                            echo $rowCount;

                            ?>
                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->
                <?php
                ?>


                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

</body>

</html>