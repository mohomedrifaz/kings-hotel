<?php
session_start();
include "db_conn.php";

if (
    isset($_POST['reservation_name']) && isset($_POST['checkin']) && isset($_POST['checkout'])
    && isset($_POST['roomtype'])
    && isset($_POST['email']) && isset($_POST['contact'])
    && isset($_POST['customer_id']) && isset($_POST['customer_name'])

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
    $customer_name = validate($_POST['customer_name']);

    $user_data = 'name=' . $customer_name;


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
    } else {

        $sql_check = "SELECT * FROM reservation WHERE room_type = '$roomtype' AND checkin = '$checkin'";
        $result_check = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($result_check) > 0) {
            header("Location: new-reservation.php?error=There is a Booking already &$user_data");
            exit();
        } else {
            $sql_insert = "INSERT INTO reservation (customer_id, reservation_name, checkin, checkout, room_type, email, contact) 
                   VALUES ('$customer_id', '$res_name', '$checkin', '$checkout', '$roomtype', '$email', '$contact')";
            $result_insert = mysqli_query($conn, $sql_insert);

            if ($result_insert) {
                header("Location: reservation-landing-page.php?success=Your reservation was created successfully");
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