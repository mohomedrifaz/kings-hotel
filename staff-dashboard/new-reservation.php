<?php


include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST['reservation_name']) && isset($_POST['checkin']) && isset($_POST['checkout'])
        && isset($_POST['roomtype'])
        && isset($_POST['email']) && isset($_POST['contact'])
        && isset($_POST['customer_id'])
    ) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $res_name = validate($_POST['reservation_name']);
        $checkin = validate($_POST['checkin']);
        $checkout = validate($_POST['checkout']);
        $roomtype = validate($_POST['roomtype']);
        $email = validate($_POST['email']);
        $contact = validate($_POST['contact']);
        $customer_id = validate($_POST['customer_id']);

        $user_data = 'email=' . $email;

        if (empty($res_name)) {
            header("Location: new-reservation.php?error=Reservation Name is required&$user_data");
            exit();
        } else if (empty($checkin)) {
            header("Location: new-reservation.php?error=Check In is required&$user_data");
            exit();
        } else if (empty($checkout)) {
            header("Location: new-reservation.php?error= Checkout is required&$user_data");
            exit();
        } else if (empty($roomtype)) {
            header("Location: new-reservation.php?error=Room Type is required&$user_data");
            exit();
        } else if (empty($email)) {
            header("Location: new-reservation.php?error=Email is required&$user_data");
            exit();
        } else if (empty($contact)) {
            header("Location: new-reservation.php?error=Contact is required&$user_data");
            exit();
        } else if (empty($customer_id)) {
            header("Location: new-reservation.php?error=Customer Registration ID is required&$user_data");
            exit();
        } else {

            //Hashing the password
            $sql_check = "SELECT * FROM reservation WHERE room_type = '$roomtype' AND checkin = '$checkin'";
            $result_check = mysqli_query($con, $sql_check);

            if (mysqli_num_rows($result_check) > 0) {
                header("Location: new-reservation.php?error=There is a Booking already &$user_data");
                exit();
            } else {
                $sql_insert = "INSERT INTO reservation (customer_id, reservation_name, checkin, checkout, room_type, email, contact) 
                   VALUES ('$customer_id', '$res_name', '$checkin', '$checkout', '$roomtype', '$email', '$contact')";
                $result_insert = mysqli_query($con, $sql_insert);

                if ($result_insert) {
                    header("Location: new-reservation.php?success=Your reservation was created successfully");
                    exit();
                } else {
                    header("Location: new-reservation.php?error=Unknown error occurred&$user_data");
                    exit();
                }
            }
        }
    } else {
        header("Location: new-reservation.php");
        exit();
    }
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
                        <a href="view-customer.php"><i class="fa fa-qrcode"></i> Customers</a>
                    </li>

 <li>
                        <a href="room.php"><i class="fa fa-qrcode"></i> Room Status</a>
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
                            Add Reservation
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->


                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
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
                                <label for="name">Registration Name</label>
                                <select id="select2" name="customer_id" class="form-control">
                                    <?php
                                    include "db.php";
                                    $records = mysqli_query($con, "SELECT id, name From customer_reg"); // Use select query here 
                                    
                                    while ($data = mysqli_fetch_array($records)) {
                                        echo "<option value='" . $data['id'] . "'>" . $data['name'] . "</option>"; // displaying data in option menu
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="address">Reservation Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name"
                                    name="reservation_name">
                            </div>

                            <div class="form-group">
                                <label for="address">Check In</label>
                                <input type="date" class="form-control" placeholder="Enter Checkin" name="checkin">
                            </div>

                            <div class="form-group">
                                <label for="address">Check Out</label>
                                <input type="date" class="form-control" placeholder="Enter Address" name="checkout">
                            </div>

                            <div class="form-group">
                                <label for="address">Room Type</label>
                                <select name="roomtype" class="form-control" required>
                                    <option value="" selected hidden>Room Type</option>
                                    <option value="premium">Premium King Room</option>
                                    <option value="deluxe">Deluxe Room</option>
                                    <option value="double">Double Room</option>
                                    <option value="luxury">Luxury Room</option>
                                    <option value="family">Family Room</option>
                                    <option value="small">Small Room</option>
                                </select> <span class="select-arrow"></span>
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact No</label>
                                <input type="text" class="form-control" placeholder="Enter Contact" name="contact">
                            </div>

                            <div class="form-group">
                                <label for="contact">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email" name="email">
                            </div>

                            <button type="submit" class="btn btn-primary">Insert</button>
                        </form>
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
                } pdf.save("manager-details.pdf");

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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#select2').select2();
        });
    </script>
</body>

</html>