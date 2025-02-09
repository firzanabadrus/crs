<?php 
include ('crssession.php');

if(!session_id()) {
  session_start();
} 

// Connect to database
include('dbconnect.php');

// Retrieve data from form
$uic = $_SESSION['u_sNo'];
$fcourse = $_POST['fcourse'];
$fsem = $_POST['fsem'];

// SQL Insert operation
$sql = "INSERT INTO tb_registration(r_student, r_course, r_sem, r_status)
        VALUES ('$uic', '$fcourse', '$fsem', '1')";

// Execute SQL
if (mysqli_query($con, $sql)) {
    // Close connection
    mysqli_close($con);
    
    // JavaScript alert and redirect
    echo "<script>
            alert('Course registration successful!');
            window.location.href='courseview.php';
          </script>";
} else {
    // Close connection
    mysqli_close($con);
    
    // JavaScript alert for failure
    echo "<script>
            alert('Course registration failed. Please try again.');
            window.location.href='courseregister.php';
          </script>";
}
?>
