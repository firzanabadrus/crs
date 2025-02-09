<?php 
include ('crssession.php');

if(!session_id()) {
  session_start();
} 

include 'headerAdmin.php';
include 'dbconnect.php';

// Check if course ID is provided
if(isset($_GET['id'])) {
    $course_id = $_GET['id'];

    // Retrieve course details
    $sql = "SELECT * FROM tb_course WHERE c_code = '$course_id'";
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result) == 1) {
        $course = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Course not found!'); window.location='managecourse.php';</script>";
        exit();
    }
}

// Handle course update
if(isset($_POST['update'])) {
    $course_name = $_POST['c_name'];
    $course_credit = $_POST['c_credit'];
    $course_lecturer = $_POST['c_lect'];

    // Update course details in database
    $update_sql = "UPDATE tb_course 
                   SET c_name = '$course_name', c_credit = '$course_credit', c_lect = '$course_lecturer' 
                   WHERE c_code = '$course_id'";

    if(mysqli_query($con, $update_sql)) {
        echo "<script>alert('Course updated successfully!'); window.location='managecourse.php';</script>";
    } else {
        echo "<script>alert('Error updating course.');</script>";
    }
}
?>

<div class="container">
    <h4 class="text-center" style="font-family: Verdana, sans-serif;">EDIT COURSE DETAILS</h4>

    <form method="POST" action="">
        <!-- <div class="mb-3">
            <label class="form-label">Course Code</label>
            <input type="text" class="form-control" name="c_code" value=" echo $course['c_code']; ?>" readonly>
        </div> -->

        <div class="mb-3">
            <label class="form-label">Course Code</label>
            <input type="text" class="form-control" name="c_code" value="<?php echo $course['c_code']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Course Name</label>
            <input type="text" class="form-control" name="c_name" value="<?php echo $course['c_name']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Credit</label>
            <input type="number" class="form-control" name="c_credit" value="<?php echo $course['c_credit']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lecturer ID</label>
            <input type="text" class="form-control" name="c_lect" value="<?php echo $course['c_lect']; ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-success">Update Course</button>
        <a href="managecourse.php" class="btn btn-secondary">Back</a>
    </form>
</div>

<?php include 'footer.php'; ?>
