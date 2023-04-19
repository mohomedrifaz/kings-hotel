<?php
// Include your database connection file here
include_once 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    

    $delete_query = "DELETE FROM staff WHERE s_id = $id";
    $result = mysqli_query($con, $delete_query);

    if ($result) {
        // Show success message
        echo '<script type="text/javascript">';
        echo 'alert("Successfully deleted!");';
        echo 'window.location.href = "add-staff.php";'; 
        echo '</script>';
    } else {
        // Show error message
        echo '<script type="text/javascript">';
        echo 'alert("Failed to delete!");';
        echo 'window.location.href = "add-staff.php";'; 
        echo '</script>';
    }
} else {
    header('Location: add-staff.php');
    exit();
}
?>
