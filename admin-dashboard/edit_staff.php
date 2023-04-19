<?php
include "db.php";
$id = $_GET["id"];
$name = "";
$contact = "";
$email = "";
$address = "";
$res = mysqli_query($con, "select * from staff where s_id=$id");
while ($row = mysqli_fetch_array($res)) {
    $name = $row["s_name"];
    $contact = $row["s_contact"];
    $email = $row["email"];
    $address = $row["s_address"];
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.min.css">

<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.min.js"></script>

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
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
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
                        <a href="add-manager.php"><i class="fa fa-qrcode"></i> Add Manager</a>
                    </li>
                    <li>
                        <a href="profit.php"><i class="fa fa-qrcode"></i> Add Receptionist</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-qrcode"></i> Add Staff</a>
                    </li>
                    <li>
                        <a href="view-customer.php"><i class="fa fa-qrcode"></i> Customers</a>
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
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Edit Staff
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error">
                                    <?php echo $_GET['error']; ?>
                                </p>
                            <?php } ?>
                            <?php if (isset($_GET['success'])) { ?>
                                <p class="success">
                                    <?php echo $_GET['success']; ?>
                                </p>
                            <?php } ?>

                            <div class="form-group">
                                <label for="name">Staff Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="name"
                                    value="<?php echo $name; ?>">
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact No</label>
                                <input type="text" class="form-control" placeholder="Enter Contact" name="contact"
                                    value="<?php echo $contact; ?>">
                            </div>

                            <div class="form-group">
                                <label for="contact">Address</label>
                                <input type="text" class="form-control" placeholder="Enter Address" name="address"
                                    value="<?php echo $address; ?>">
                            </div>

                            <div class="form-group">
                                <label for="contact">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email" name="email"
                                    value="<?php echo $email; ?>">
                            </div>

                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </form>
                        <?php
                        if (isset($_POST["update"])) {
                            mysqli_query(
                                $con,
                                "update staff set 
                            email='$_POST[email]',
                            s_name='$_POST[name]',
                            s_address='$_POST[address]',
                            s_contact='$_POST[contact]'
                            where s_id = $id"
                            );

                            echo '<script type="text/javascript">';
                            echo 'Swal.fire({';
                            echo '    title: "Success!",';
                            echo '    text: "Successfully updated!",';
                            echo '    icon: "success",';
                            echo '    confirmButtonText: "OK"';
                            echo '}).then((result) => {';
                            echo '    if (result.isConfirmed) {';
                            echo '        window.location = "add-staff.php";'; 
                            echo '    }';
                            echo '});';
                            echo '</script>';
                        }
                        ?>
                    </div>
                </div>
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
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

</body>

</html>