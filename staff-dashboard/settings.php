<?php
include "db.php";

$selected_date = date('Y-m-d');

// Retrieve the selected date from the form submission
if (isset($_POST['date'])) {
    $selected_date = $_POST['date'];

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

}
?>

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
    <title>KINGS HOTEL</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<style>
    .available-rooms {
        margin-top: 20px;
    }

    .available-rooms h2 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .available-rooms ul {
        padding-left: 20px;
        margin-top: 20px;
    }

    .available-rooms li {
        font-size: 15px;
        margin-bottom: 20px;
        background-color: #32de84;
        width: 10%;
        text-align: center;
        border-radius: 15px;
        padding: 5px 0px;
        text-transform: uppercase;
        font-weight: bold;
        list-style: none;
        margin-left: -20px;
    }

    .reservation-form {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }

    .form-label {
        font-size: 18px;
        font-weight: bold;
        margin-right: 10px;
    }

    .form-input {
        padding: 5px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .form-button {
        padding: 5px 10px;
        font-size: 12px;
        font-weight: 500;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        text-transform: uppercase;
    }

    .form-button:hover {
        background-color: #0056b3;
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
                <a class="navbar-brand" href="index.php">MAIN MENU </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        
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
                        <a class="active-menu" href="settings.php"><i class="fa fa-dashboard"></i>Room Status</a>
                    </li>
                    <li>
                        <a href="room.php"><i class="fa fa-plus-circle"></i>Add Room</a>
                    </li>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Available <small> Rooms</small>
                        </h1>
                    </div>
                </div>

                <form action="" method="post" class="reservation-form" id="availabilityForm">
                    <label for="date" class="form-label">Select Date:</label>
                    <input type="date" id="date" name="date" class="form-input" value="<?php echo $selected_date; ?>"
                        required>
                    <button type="submit" class="form-button">Check Availability</button>
                </form>
                <?php

                // Display the available room types to the user
                echo '<div class="available-rooms">';
                echo '<h2>Available Room Types on ' . $selected_date . ':</h2>';
                echo '<ul>';
                foreach ($available_room_types as $room_type) {
                    echo '<li>' . $room_type . '</li>';
                }
                echo '</ul>';
               
                echo '</div>';
                ?>
            </div>
            <!-- /. ROW  -->




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
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

    <script>
        if (!sessionStorage.getItem('formSubmitted')) {
            document.getElementById('availabilityForm').submit();
            sessionStorage.setItem('formSubmitted', 'true');
        }
    </script>


</body>

</html>