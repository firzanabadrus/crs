<?php
session_start();
include('dbconnect.php');

// Retrieve and sanitize inputs
$funame = trim($_POST['funame']);
$fpwd = trim($_POST['fpwd']);

// Query database
$stmt = $con->prepare("SELECT * FROM tb_user WHERE u_sNo = ?");
$stmt->bind_param("s", $funame);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    if ($row['is_verified'] == 0) {
        echo "<script>
                alert('Please verify your email before logging in.');
                window.location.href = 'login.php';
              </script>";
        exit();
    }

    if (password_verify($fpwd, $row['u_pwd'])) {
        $_SESSION['u_sNo'] = $row['u_sNo'];
        $_SESSION['u_uType'] = $row['u_uType']; // Store user type in session

        // Define redirect paths
        $redirect = [
            1 => 'viewLecturer.php',
            2 => 'viewStudent.php',
            3 => 'viewAdmin.php'
        ];

        if (isset($redirect[$row['u_uType']])) {
            echo "<script>
                    alert('Login successful!');
                    window.location.href = '{$redirect[$row['u_uType']]}';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Invalid user type.');
                    window.location.href = 'login.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Invalid username or password. Please try again.');
                window.location.href = 'login.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Invalid username or password.');
            window.location.href = 'login.php';
          </script>";
}

// Close resources
$stmt->close();
$con->close();
?>
