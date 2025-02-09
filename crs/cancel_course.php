<?php
include 'crssession.php';
include 'headerStudent.php';
include 'dbconnect.php';

if (!session_id()) {
    session_start();
}

if (isset($_GET['transaction_id'])) {
    $transaction_id = $_GET['transaction_id'];

    // Delete the course registration
    $sql = "DELETE FROM tb_registration WHERE r_tID = '$transaction_id'";

    if (mysqli_query($con, $sql)) {
        // Use JavaScript alert to show success message
        echo "<script>alert('Course registration deleted successfully!');</script>";
        echo "<script>window.location.href = 'courseview.php';</script>"; // Redirect to the courses page after deletion
    } else {
        // If there's an error, show the error message in the alert
        echo "<script>alert('Error canceling course registration: " . mysqli_error($con) . "');</script>";
    }
}

include 'footer.php';
?>
