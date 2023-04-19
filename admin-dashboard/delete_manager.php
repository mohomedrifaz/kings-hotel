<?php
// Include your database connection file here
include_once 'db.php';

// Check if customer ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete customer from the database
    $delete_query = "DELETE FROM manager WHERE m_id = $id";
    $result = mysqli_query($con, $delete_query);

    if ($result) {
        // Show success message
        echo '<script type="text/javascript">';
        echo 'alert("Successfully deleted!");';
        echo 'window.location.href = "add-manager.php";'; // Redirect to view-customer.php after deletion
        echo '</script>';
    } else {
        // Show error message
        echo '<script type="text/javascript">';
        echo 'alert("Failed to delete!");';
        echo 'window.location.href = "add-manager.php";'; // Redirect to view-customer.php after deletion
        echo '</script>';
    }
} else {
    // Redirect to view-customer.php if customer ID is not provided
    header('Location: add-manager.php');
    exit();
}
?>
