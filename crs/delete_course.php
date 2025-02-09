<!-- admin -->
<?php  
include 'dbconnect.php';

if (!session_id()) {
    session_start();
}

if (isset($_GET['c_code'])) {
    $courseCode = $_GET['c_code'];

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM tb_course WHERE c_code = ?");
    $stmt->bind_param("s", $courseCode);

    if ($stmt->execute()) {
        echo "<script>alert('Course deleted successfully!'); </script>";
        echo "<script>window.location.href = 'managecourse.php';</script>";
    } else {
        echo "<script>alert('Error deleting course. Please try again.'); </script>";
        echo "<script>window.location.href = 'managecourse.php';</script>";
    }

    $stmt->close();
}

$con->close();
?>

