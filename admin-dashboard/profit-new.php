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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js"> -->

    <link rel="stylesheet" href="https://cdn.plot.ly/plotly-latest.min.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>



</head>

<style>
    .row-hover:hover {
        background-color: aliceblue;
        cursor: pointer;
    }

    .total-profit {
        font-size: 18px;
        margin-top: -20px;
        margin-bottom: 25px;
        text-transform: uppercase;
        font-weight: 700;
    }

    .total-profit-amount {
        background-color: #52b788;
        padding: 5px 20px;
        margin-left: 10px;
        font-weight: 700;
        border-radius: 20px;
        font-size: 20px;
    }

    .single-room-edit {
        font-size: 18px;
        margin-top: 0px;
        margin-bottom: 10px;
        text-transform: uppercase;
        font-weight: 800;
    }

    .single-room-name {
        font-size: 17px;
        font-weight: 600;
        padding-right: 3px;
    }

    .profit-single-room p {
        padding-top: 10px;
    }

    .single-room-amount {
        background-color: #95d5b2;
        padding: 5px 10px;
        font-weight: 700;
        border-radius: 20px;
        font-size: 16px;
    }

    .profit-single-room {
        margin-bottom: 50px;
    }

    form {
        margin-bottom: 35px
    }

    .submit-button {
        background-color: #80ed99;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 600;
        color: black;
    }

    .submit-button:hover {
        background-color: #57cc99;
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
                            Profit
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <?php
                include('db.php');
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="">
                            <div style="display: flex; align-items: center; padding-bottom: 15px;">
                                <label for="month"
                                    style="margin-right: 10px; font-size: 17px; text-transform: uppercase; margin-bottom: 0px; font-weight: 800;">Select
                                    Month:</label>
                                <select id="month" name="month" style="margin-right: 10px;">
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <button class="submit-button" type="submit">
                                    Generate Report
                                </button>
                            </div>
                        </form>

                        <?php
                        include('db.php');

                        // Get the reservation_id parameter from the URL
                        // $reservation_id = $_GET['id'];
                        
                        // Fetch the reservation details from the database based on reservation_id
                        $tsql = "SELECT * FROM reservation WHERE reservation_id = 2";
                        $tre = mysqli_query($con, $tsql);
                        $trow = mysqli_fetch_array($tre);


                        // Fetch all rows from the 'room_type' table
                        $rsql = "SELECT * FROM roomtype";
                        $rre = mysqli_query($con, $rsql);

                        // Create an array to store room type prices
                        $room_type_prices = array();

                        // Loop through the rows and save the room type prices in the array
                        while ($rrow = mysqli_fetch_array($rre)) {
                            $room_type = $rrow['name'];
                            $price = $rrow['price'];
                            $room_type_prices[$room_type] = $price;
                        }

                        // Now you can access the room type prices from the array
                        $price_deluxe = $room_type_prices['deluxe'];
                        $price_premium = $room_type_prices['premium'];
                        $price_double = $room_type_prices['double'];
                        $price_luxury = $room_type_prices['luxury'];
                        $price_family = $room_type_prices['family'];
                        $price_small = $room_type_prices['small'];

                        $checkin = strtotime($trow['checkin']);
                        $checkout = strtotime($trow['checkout']);
                        $no_of_days = floor(($checkout - $checkin) / (60 * 60 * 24));

                        $total_price = 0;
                        if ($trow['room_type'] == 'deluxe') {
                            $total_price = $price_deluxe * $no_of_days;
                        } else if ($trow['room_type'] == 'premium') {
                            $total_price = $price_premium * $no_of_days;
                        } else if ($trow['room_type'] == 'double') {
                            $total_price = $price_double * $no_of_days;
                        } else if ($trow['room_type'] == 'luxury') {
                            $total_price = $price_luxury * $no_of_days;
                        } else if ($trow['room_type'] == 'family') {
                            $total_price = $price_family * $no_of_days;
                        } else if ($trow['room_type'] == 'small') {
                            $total_price = $price_small * $no_of_days;
                        }


                        // Get the current month and year
                        if (isset($_POST['month'])) {
                            $selected_month = $_POST['month'];
                        } else {
                            $selected_month = date('m');
                        }
                        $current_year = date('Y');

                        // Construct the SQL query to fetch reservations for the current month
                        $tsql = "SELECT * FROM reservation WHERE MONTH(checkin) = $selected_month AND YEAR(checkin) = $current_year";
                        $tre = mysqli_query($con, $tsql);

                        // Initialize a variable to store the total profit
                        $total_profit = 0;

                        // Loop through the reservations and calculate the profit for each reservation
                        while ($trow = mysqli_fetch_array($tre)) {
                            // Calculate the number of days of stay
                            $checkin = strtotime($trow['checkin']);
                            $checkout = strtotime($trow['checkout']);
                            $no_of_days = floor(($checkout - $checkin) / (60 * 60 * 24));

                            // Get the room type and corresponding price
                            $room_type = $trow['room_type'];
                            $price = $room_type_prices[$room_type];

                            // Calculate the profit for this reservation
                            $reservation_profit = $price * $no_of_days;

                            // Add the reservation profit to the total profit
                            $total_profit += $reservation_profit;
                        }

                        // Display the total profit
                        ?>
                        <div class="print-report">
                            <div class="total-profit">
                                <?php echo "Total profit for the month: " ?>
                                <span class="total-profit-amount">
                                    <?php echo "LKR" . $total_profit; ?>
                                </span>
                            </div>

                            <?php
                            //Profit Per room
                            
                            // Construct the SQL query to fetch reservations for the current month
                            $tsql = "SELECT * FROM reservation WHERE MONTH(checkin) = $selected_month AND YEAR(checkin) = $current_year";
                            $tre = mysqli_query($con, $tsql);

                            // Define variables to store profit for each room type
                            $profit_deluxe = 0;
                            $profit_premium = 0;
                            $profit_double = 0;
                            $profit_luxury = 0;
                            $profit_family = 0;
                            $profit_small = 0;

                            // Loop through the reservations and calculate profit for each room type
                            while ($trow = mysqli_fetch_array($tre)) {
                                $checkin = strtotime($trow['checkin']);
                                $checkout = strtotime($trow['checkout']);
                                $no_of_days = floor(($checkout - $checkin) / (60 * 60 * 24));

                                if ($trow['room_type'] == 'deluxe') {
                                    $profit_deluxe += $price_deluxe * $no_of_days;
                                } else if ($trow['room_type'] == 'premium') {
                                    $profit_premium += $price_premium * $no_of_days;
                                } else if ($trow['room_type'] == 'double') {
                                    $profit_double += $price_double * $no_of_days;
                                } else if ($trow['room_type'] == 'luxury') {
                                    $profit_luxury += $price_luxury * $no_of_days;
                                } else if ($trow['room_type'] == 'family') {
                                    $profit_family += $price_family * $no_of_days;
                                } else if ($trow['room_type'] == 'small') {
                                    $profit_small += $price_small * $no_of_days;
                                }
                            }

                            // Display the profit gained by each room type
                            echo "<div class='profit-single-room'>";
                            echo "<div class='single-room-edit'>Profit by Room Type :</div>";
                            echo "<p> <span class='single-room-name'> Deluxe: </span> <span class='single-room-amount'> LKR " . $profit_deluxe . "</span> </p>";
                            echo "<p> <span class='single-room-name'> Premium: </span> <span class='single-room-amount'> LKR " . $profit_premium . "</span> </p>";
                            echo "<p> <span class='single-room-name'> Double: </span> <span class='single-room-amount'> LKR " . $profit_double . "</span> </p>";
                            echo "<p> <span class='single-room-name'> Luxury: </span> <span class='single-room-amount'> LKR " . $profit_luxury . "</span> </p>";
                            echo "<p> <span class='single-room-name'> Family: </span> <span class='single-room-amount'> LKR " . $profit_family . "</span> </p>";
                            echo "<p> <span class='single-room-name'> Small:  </span> <span class='single-room-amount'> LKR" . $profit_small . " </span> </p>";
                            echo "</div>";

                            $room_profit = array(
                                $profit_deluxe,
                                $profit_premium,
                                $profit_double,
                                $profit_luxury,
                                $profit_family,
                                $profit_small
                            );

                            // Retrieve the profit gained by each room type
                            // (Assuming you have already retrieved the data and stored it in the $room_profit array)
                            
                            // Calculate the total profit
                            $total_profit = 0;
                            foreach ($room_profit as $profit) {
                                $total_profit += $profit;
                            }

                            ?>

                            <div id="profitChart"></div>
                        </div>

                        <button onclick='getDeliveryPDF();' style="margin-top: 20px; background-color: #90c3ef;"
                            class='btn btn-outline-success my-2 my-sm-0'>
                            Print Profit Report
                        </button>
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

    <script>

        // Define the data for the pie chart
        var room_profit = <?php echo json_encode($room_profit); ?>;

        var data = [{
            labels: ['Deluxe', 'Premium', 'Double', 'Luxury', 'Family', 'Small'],
            values: room_profit,
            type: 'pie',
            marker: {
                colors: [
                    '#6c757d',
                    '#adb5bd',
                    '#ced4da',
                    '#dee2e6',
                    '#e9ecef',
                    '#f8f9fa'
                ]
            },
            text: ['Deluxe: LKR' + room_profit[0], 'Premium: LKR' + room_profit[1], 'Double: LKR' + room_profit[2], 'Luxury: LKR' + room_profit[3], 'Family: LKR' + room_profit[4], 'Small: LKR' + room_profit[5]],
            hoverinfo: 'text',
        }];

        var layout = {
            title: {
                text: 'Profit by Room Type',
                font: {
                    color: 'rgba(255, 255, 255, 0.8)',
                    size: 16,
                    family: 'Arial',
                    weight: 'bold'
                }
            },
            showlegend: true,
            legend: {
                font: {
                    color: 'rgba(255, 255, 255, 0.8)',
                    size: 12,
                    family: 'Arial',
                    weight: 'bold'
                }
            },
            paper_bgcolor: '#343a40',
            plot_bgcolor: '#343a40',
        };

        Plotly.newPlot('profitChart', data, layout);

    </script>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <!-- <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script> -->
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

    <!-- print button script -->
    <script>
        var totalProfit = $(".total-profit-amount").text();
        var totalProfitWithoutSpaces = totalProfit.replace(/\s+/g, '');

        if (totalProfitWithoutSpaces === 'LKR0') {
            $('#profitChart').css('display', 'none')
        }
    </script>
    <script>
        function getDeliveryPDF() {
            var HTML_Width = $(".print-report").width();
            var HTML_Height = $(".print-report").height();
            var top_left_margin = 15;
            var PDF_Width = HTML_Width + (top_left_margin * 2);
            var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;
            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
            html2canvas($(".print-report")[0], {
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
                } pdf.save("profit-report.pdf");

            });
        }; 
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <!-- End of print button script-->

</body>

</html>