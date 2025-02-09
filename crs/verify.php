<?php
include('dbconnect.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token exists
    $query = "SELECT * FROM tb_user WHERE verification_token = '$token' LIMIT 1";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // Update user status
        $updateQuery = "UPDATE tb_user SET is_verified = 1, verification_token = NULL WHERE verification_token = '$token'";
        mysqli_query($con, $updateQuery);
        
        echo "<script>
                alert('Email verified! You can now log in.');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
                alert('Invalid verification link.');
                window.location.href = 'register.php';
              </script>";
    }
}
?>
