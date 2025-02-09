<?php
session_start(); // Start session at the beginning

include 'crssession.php';
include 'headerStudent.php';
include 'dbconnect.php';

// Check if the user is logged in
if (!isset($_SESSION['u_sNo'])) {
    echo "<script>alert('You need to log in first!'); window.location.href='login.php';</script>";
    exit();
}

// Get student ID from session
// $uic = $_SESSION['funame'];
$uic = $_SESSION['u_sNo']; // Use the session variable from processLogin.php

// Fetch student details from the database
$sql = "SELECT * FROM tb_user WHERE u_sNo = '$uic'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_name = $_POST['student_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $state = $_POST['state']; 

    // Update student details in the database
    $updateSql = "UPDATE tb_user SET u_name = '$student_name', u_email = '$email', u_contact = '$phone', u_state = '$state' WHERE u_sNo = '$uic'";

    if (mysqli_query($con, $updateSql)) {
        echo "<script>alert('Profile updated successfully!'); window.location.href='studentprofile.php';</script>";
    } else {
        echo "<script>alert('Error updating profile: " . mysqli_error($con) . "');</script>";
    }
}

?>

<div class="container">
    <h4>Student Profile</h4><br>
    <form method="POST">
        <!-- Permanent Student ID Field -->
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" class="form-control" id="student_id" value="<?php echo $row['u_sNo']; ?>" readonly>
        </div><br>

        <!-- Editable Full Name -->
        <div class="form-group">
            <label for="student_name">Full Name</label>
            <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $row['u_name']; ?>" required>
        </div><br>
        
        <!-- Editable Email -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['u_email']; ?>" required>
        </div><br>

        <!-- Editable Phone Number -->
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['u_contact']; ?>" required>
        </div><br>

        <!-- Editable State -->
        <div class="form-group">
            <label for="state">State</label>
            <textarea class="form-control" id="state" name="state" rows="2" required><?php echo $row['u_state']; ?></textarea>
        </div>

        <br>
        <button type="submit" class="btn login-button">Update Profile</button>
    </form>
</div>

<?php include 'footer.php'; ?>
