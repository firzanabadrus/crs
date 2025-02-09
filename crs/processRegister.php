<?php
session_start();
include('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize inputs
    $funame = mysqli_real_escape_string($con, $_POST['funame']);
    $fpwd = $_POST['fpwd'];
    $fpwd_confirm = $_POST['fpwd_confirm'] ?? ''; // Handle undefined key
    $femail = mysqli_real_escape_string($con, $_POST['femail']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $fcontact = mysqli_real_escape_string($con, $_POST['fcontact']);
    $fstate = mysqli_real_escape_string($con, $_POST['fstate']);

    // Validate required fields
    $errors = [];
    foreach ([
        'funame' => 'Student/Staff ID',
        'fpwd' => 'Password',
        'fpwd_confirm' => 'Confirm Password',
        'femail' => 'Email',
        'fname' => 'Full Name',
        'fcontact' => 'Contact Number',
        'fstate' => 'State'
    ] as $field => $name) {
        if (empty($_POST[$field])) {
            $errors[] = "$name is required!";
        }
    }

    // Password validation
    if ($fpwd !== $fpwd_confirm) {
        $errors[] = "Passwords do not match!";
    }
    if (strlen($fpwd) < 8) {
        $errors[] = "Password must be at least 8 characters!";
    }

    // Early exit if errors
    if (!empty($errors)) {
        $_SESSION['error'] = implode("<br>", $errors);
        header('Location: register.php');
        exit();
    }

    // Check existing user
    $check = "SELECT * FROM tb_user WHERE u_sNo = '$funame' OR u_email = '$femail'";
    $result = mysqli_query($con, $check);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = "Username or email already exists!";
        header('Location: register.php');
        exit();
    }

    // Hash password
    $hashed_pwd = password_hash($fpwd, PASSWORD_DEFAULT);
    
    // Generate verification token
    $verification_token = bin2hex(random_bytes(50));

    // Insert with prepared statement
    $sql = "INSERT INTO tb_user (u_sNo, u_pwd, u_email, u_name, u_contact, u_state, u_req, u_uType, verification_token, is_verified) 
            VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP(), '2', ?, 0)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $funame, $hashed_pwd, $femail, $fname, $fcontact, $fstate, $verification_token);

    if (mysqli_stmt_execute($stmt)) {
        // Send email with verification link
        $subject = "Verify Your Email";
        $message = "Click this link to verify your email: 
        http://localhost/verify.php?token=$verification_token";
        $headers = "From: no-reply@yourwebsite.com";

        mail($femail, $subject, $message, $headers);

        echo "<script>
                alert('Registration successful! Check your email to verify your account.');
                window.location.href = 'login.php';
              </script>";
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($con);
        header('Location: register.php');
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
