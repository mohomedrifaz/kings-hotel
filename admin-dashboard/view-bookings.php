<?php
session_start();
if (!isset( $_SESSION["id"]) ) {
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
    .row-hover:hover {
        background-color: aliceblue;
        cursor: pointer;
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
                        <a href="add-receptionist.php"><i class="fa fa-qrcode"></i> Add Receptionist</a>
                    </li>
                    <li>
                        <a href="add-staff.php"><i class="fa fa-qrcode"></i> Add Staff</a>
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
                            Room Booking
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <?php
                include('db.php');
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                    <button class="btn btn-default" type="button">
                                                        New Room Bookings <span class="badge"></span>
                                                    </button>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                            <div class="panel-body">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table" id="dataTables-example">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Room</th>
                                                                        <th>Check In</th>
                                                                        <th>Check Out</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $tsql = "select * from reservation";
                                                                    $tre = mysqli_query($con, $tsql);
                                                                    while ($trow = mysqli_fetch_array($tre)) { {
                                                                            echo "<tr class='row-hover' onclick=\"window.location='view_reservation.php?id=" . $trow['reservation_id'] . "';\">";
                                                                            echo "<th>" . $trow['reservation_id'] . "</th>";
                                                                            echo "<th>" . $trow['reservation_name'] . "</th>";
                                                                            echo "<th>" . $trow['email'] . "</th>";
                                                                            echo "<th>" . $trow['room_type'] . "</th>";
                                                                            echo "<th>" . $trow['checkin'] . "</th>";
                                                                            echo "<th>" . $trow['checkout'] . "</th>";
                                                                            echo "</tr>";
                                                                        }

                                                                    }
                                                                    ?>

                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End  Basic Table  -->
                                            </div>
                                        </div>
                                    </div>
                                    <button onclick='getDeliveryPDF();'
                                        style="margin-top: 20px; background-color: #90c3ef;"
                                        class='btn btn-outline-success my-2 my-sm-0'>
                                        Print Bookings
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

    <!-- print button script -->
    <script>
        function getDeliveryPDF() {
            $(".panel-collapse .panel-body .panel-default").css('background-color', 'white');
            var HTML_Width = $(".panel-collapse .panel-body .panel-default").width();
            var HTML_Height = $(".panel-collapse .panel-body .panel-default").height();
            var top_left_margin = 15;
            var PDF_Width = HTML_Width + (top_left_margin * 2);
            var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;
            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
            html2canvas($(".panel-collapse .panel-body .panel-default")[0], {
                allowTaint: true
            }).then(function (canvas) {
                canvas.getContext('2d');
                console.log(canvas.height + " " + canvas.width);
                var imgData = canvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
                for (var i = 1; i <= totalPDFPages; i++) {
                    pdf.addPage(PDF_Width, PDF_Height);
                    pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
                } pdf.save("booking-details.pdf");
            });
        }; 
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <!-- End of print button script-->

    <!-- <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script> -->

</body>

</html>