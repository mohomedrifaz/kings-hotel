<?php
// Include your database connection file here
include_once 'db.php';

// Check if customer ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete customer from the database
    $delete_query = "DELETE FROM receptionist WHERE rec_id = $id";
    $result = mysqli_query($con, $delete_query);

    if ($result) {
        // Show success message
        echo '<script type="text/javascript">';
        echo 'alert("Successfully deleted!");';
        echo 'window.location.href = "add-receptionist.php";'; 
        echo '</script>';
    } else {
        // Show error message
        echo '<script type="text/javascript">';
        echo 'alert("Failed to delete!");';
        echo 'window.location.href = "add-receptionist.php";'; 
        echo '</script>';
    }
} else {
   
    header('Location: add-receptionist.php');
    exit();
}
?>
