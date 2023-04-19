<?php
session_start();
if (!isset($_SESSION["id"])) {
    // header("location:index.php");
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

    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.min.css">

    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.min.js"></script>
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

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Customers
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
                                                        View Customers<span class="badge"></span>
                                                    </button>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                            <div class="panel-body">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Contact</th>
                                                                        <th>Email</th>
                                                                        <th class="print-none">Edit</th>
                                                                        <th class="print-none">Delete</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $tsql = "select * from customer_reg";
                                                                    $tre = mysqli_query($con, $tsql);
                                                                    while ($trow = mysqli_fetch_array($tre)) { {
                                                                            echo "<th>" . $trow['id'] . "</th>";
                                                                            echo "<th>" . $trow['name'] . "</th>";
                                                                            echo "<th>" . $trow['contact'] . "</th>";
                                                                            echo "<th>" . $trow['email'] . "</th>";
                                                                            echo "<th onclick=\"window.location='edit_customer.php?id=" . $trow['id'] . "';\">" ?><button
                                                                                type="button"
                                                                                class="print-none btn btn-success">Edit</button>
                                                                            <?php
                                                                            echo "<th onclick=\"deleteCustomer(" . $trow['id'] . ");\">" ?>
                                                                            <button type="button"
                                                                                class="print-none btn btn-danger">Delete</button>
                                                                            <?php
                                                                            echo "</tr>";
                                                                        }
                                                                    }
                                                                    ?>

                                                                </tbody>
                                                            </table>

                                                            <?php
                                                            // Delete customer function
                                                            function deleteCustomer($id)
                                                            {
                                                                global $con;
                                                                mysqli_query($con, "DELETE FROM customer_reg WHERE id=$id");
                                                                // Show success message using SweetAlert
                                                                echo '<script type="text/javascript">';
                                                                echo 'Swal.fire({';
                                                                echo '    title: "Success!",';
                                                                echo '    text: "Successfully deleted!",';
                                                                echo '    icon: "success",';
                                                                echo '    confirmButtonText: "OK"';
                                                                echo '}).then((result) => {';
                                                                echo '    if (result.isConfirmed) {';
                                                                echo '        window.location = "edit_customer.php";'; // Redirect to edit_customer.php without any specific customer ID
                                                                echo '    }';
                                                                echo '});';
                                                                echo '</script>';
                                                            }
                                                            ?>

                                                            <!-- JavaScript function to confirm and call deleteCustomer() -->
                                                            <script>
                                                                function deleteCustomer(id) {
                                                                    Swal.fire({
                                                                        title: 'Are you sure?',
                                                                        text: 'You are about to delete a customer.',
                                                                        icon: 'warning',
                                                                        showCancelButton: true,
                                                                        confirmButtonColor: '#d33',
                                                                        cancelButtonColor: '#3085d6',
                                                                        confirmButtonText: 'Yes, delete it!'
                                                                    }).then((result) => {
                                                                        if (result.isConfirmed) {
                                                                            // Call PHP function to delete customer
                                                                            window.location = 'delete_customer.php?id=' + id;
                                                                        }
                                                                    });
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End  Basic Table  -->
                                            </div>
                                        </div>
                                    </div>
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
            $(".panel-collapse .panel-body .table-responsive .print-none").hide();

            var HTML_Width = $(".panel-collapse .panel-body .table-responsive").width();
            var HTML_Height = $(".panel-collapse .panel-body .table-responsive").height();
            var top_left_margin = 15;
            var PDF_Width = HTML_Width + (top_left_margin * 2);
            var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;
            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
            html2canvas($(".panel-collapse .panel-body .table-responsive")[0], {
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
                } pdf.save("customer-details.pdf");

                setTimeout(function () {
                    $(".panel-collapse .panel-body .table-responsive .print-none").show();
                }, 1000);
            });
        }; 
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <!-- End of print button script-->

</body>

</html>