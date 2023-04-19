<!DOCTYPE html>
<html>

<head>
    <title>Reservation Details</title>
</head>

<style>
    .print-wrapper {
        border: 1px solid black;
        padding: 15px;
        width: 35%;
        margin: 0 auto;
        background-color: #f1dbc3;
        font-size: 16px;
        font-family: 'Open Sans', sans-serif;
    }

    .print-wrapper h1 {
        text-align: center;
        margin: 10px 0;
    }

    button.print-button {
        width: 75px;
        height: 75px;
    }

    span.print-icon,
    span.print-icon::before,
    span.print-icon::after,
    button.print-button:hover .print-icon::after {
        border: solid 4px #333;
    }

    span.print-icon::after {
        border-width: 2px;
    }

    button.print-button {
        position: relative;
        padding: 0;
        border: 0;

        border: none;
        background: transparent;
    }

    span.print-icon,
    span.print-icon::before,
    span.print-icon::after,
    button.print-button:hover .print-icon::after {
        box-sizing: border-box;
        background-color: #fff;
    }

    span.print-icon {
        position: relative;
        display: inline-block;
        padding: 0;
        margin-top: 20%;

        width: 60%;
        height: 35%;
        background: #fff;
        border-radius: 20% 20% 0 0;
    }

    span.print-icon::before {
        content: "";
        position: absolute;
        bottom: 100%;
        left: 12%;
        right: 12%;
        height: 110%;

        transition: height .2s .15s;
    }

    span.print-icon::after {
        content: "";
        position: absolute;
        top: 55%;
        left: 12%;
        right: 12%;
        height: 0%;
        background: #fff;
        background-repeat: no-repeat;
        background-size: 70% 90%;
        background-position: center;
        background-image: linear-gradient(to top,
                #fff 0, #fff 14%,
                #333 14%, #333 28%,
                #fff 28%, #fff 42%,
                #333 42%, #333 56%,
                #fff 56%, #fff 70%,
                #333 70%, #333 84%,
                #fff 84%, #fff 100%);

        transition: height .2s, border-width 0s .2s, width 0s .2s;
    }

    button.print-button:hover {
        cursor: pointer;
    }

    button.print-button:hover .print-icon::before {
        height: 0px;
        transition: height .2s;
    }

    button.print-button:hover .print-icon::after {
        height: 120%;
        transition: height .2s .15s, border-width 0s .16s;
    }
</style>

<body>
    <div class="reservation_wrapper">
        <?php
        include('db.php');

        // Get the reservation_id parameter from the URL
        $reservation_id = $_GET['id'];

        // Fetch the reservation details from the database based on reservation_id
        $tsql = "SELECT * FROM reservation WHERE reservation_id = '$reservation_id'";
        $tre = mysqli_query($con, $tsql);
        $trow = mysqli_fetch_array($tre);

        if ($trow) {
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

            // Display the reservation details
            echo "<div class='print-wrapper'>";
            echo "<h1>Reservation Details</h1>";
            echo "<div class='row'> 
            <p class='res_id'><strong>Reservation ID:</strong> " . $trow['reservation_id'] . "</p>
            <p class='res_name'><strong>Name:</strong> " . $trow['reservation_name'] . "</p>
            </div>";
            echo "<div class='row'> 
            <p class='res_email'><strong>Email:</strong> " . $trow['email'] . "</p>
            <p class='res_roomtype'><strong>Room:</strong> " . $trow['room_type'] . "</p>
            </div>";
            echo "<p class='res_checkin'><strong>Check In:</strong> " . $trow['checkin'] . "</p>";
            echo "<p class='res_checkout'><strong>Check Out:</strong> " . $trow['checkout'] . "</p>";
            echo "<p class='res_days'><strong>No of days:</strong> " . $no_of_days . "</p>";
            if ($total_price > 0) {
                echo "<p class='res_totalvalue'><strong>Total Price:</strong> LKR" . $total_price . "</p>";
                echo "<div class='row' style='
                display: flex;
                justify-content: space-between;
            '> 
                <button onclick='getDeliveryPDF();'class='print-button btn btn-outline-success my-2 my-sm-0'><span class='print-icon'></span></button>
                <img src='assets/img/logo1.png' width='100px'>
                </div>";
            }
        } else {
            // Display an error message if reservation not found
            echo "<h1>Error</h1>";
            echo "<p>Reservation not found.</p>";
            echo "</div>";
        }
        ?>
       
    </div>
</body>

<script>
    function getDeliveryPDF() {
        var HTML_Width = $(".print-wrapper").width();
        var HTML_Height = $(".print-wrapper").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;
        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
        html2canvas($(".print-wrapper")[0], {
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
            } pdf.save("reservation-details.pdf");
        });
    }; 
</script>




<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

</html>