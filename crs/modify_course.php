<!-- student -->
<?php
include 'crssession.php';
include 'headerstudent.php';
include 'dbconnect.php';

if (!session_id()) {
    session_start();
}

if (isset($_GET['transaction_id'])) {
    $transaction_id = $_GET['transaction_id'];
    
    // Get the current registration details
    $sql = "SELECT * FROM tb_registration WHERE r_tID = '$transaction_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    // Fetch available courses for modification
    $coursesResult = mysqli_query($con, "SELECT * FROM tb_course");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_course = $_POST['new_course'];
        
        // Update the registration with the new course
        $updateSql = "UPDATE tb_registration SET r_course = '$new_course' WHERE r_tID = '$transaction_id'";
        if (mysqli_query($con, $updateSql)) {
            // JavaScript alert for success
            echo "<script>alert('Course registration updated successfully!');</script>";
            echo "<script>window.location.href = 'courseview.php';</script>";  // Redirect to the view courses page
        } else {
            // Show the error in an alert
            echo "<script>alert('Error updating course registration: " . mysqli_error($con) . "');</script>";
        }
    }
}
?>
<div class="container">
    <form method="POST">
        <h4>Modify Course Registration</h4><br>
        <label for="new_course">Select New Course:</label>
        <select name="new_course" required>
            <?php while ($course = mysqli_fetch_array($coursesResult)): ?>
                <option value="<?php echo $course['c_code']; ?>" <?php echo ($row['r_course'] == $course['c_code']) ? 'selected' : ''; ?>>
                    <?php echo $course['c_name']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br><br>
        <button type="submit" class="btn login-button">Update Registration</button>
    </form>
</div>

<?php include 'footer.php'; ?>
