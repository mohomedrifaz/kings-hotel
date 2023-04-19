<?php
session_start();
include "db_conn.php";

if (
    isset($_POST['checkin']) && isset($_POST['checkout']) && isset($_POST['roomtype'])
) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $checkin = validate($_POST['checkin']);
    $checkout = validate($_POST['checkout']);
    $roomtype = validate($_POST['roomtype']);

    $user_data = 'name=' . $customer_name;


    if (empty($checkin)) {
        header("Location: room-available.php?error=Check In is required&$user_data");
        exit();
    } else if (empty($checkout)) {
        header("Location: room-available.php?error= Checkout is required&$user_data");
        exit();
    } else if (empty($roomtype)) {
        header("Location: room-available.php?error=Room Type is required&$user_data");
        exit();
    } else {

        $sql_check = "SELECT * FROM reservation WHERE room_type = '$roomtype' AND checkin = '$checkin'";
        $result_check = mysqli_query($conn, $sql_check);

        if ( mysqli_num_rows($result_check) > 0 ) { 
            header("Location: room-available.php?status=booking-not-available");
            exit();
        } else {
            header("Location: room-available.php?status=booking-available");
            exit();
        }
    }
} else {
    header("Location: check-availability.php");
    exit();
}