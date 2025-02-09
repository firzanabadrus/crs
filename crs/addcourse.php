<?php 
include ('crssession.php');

if(!session_id()) {
  session_start();
} 

include 'headerAdmin.php';
include 'dbconnect.php';

// Handle form submission
if(isset($_POST['add'])) {
    $course_code = $_POST['c_code'];
    $course_name = $_POST['c_name'];
    $course_credit = $_POST['c_credit'];
    $course_lecturer = $_POST['c_lect'];

    // Check if course code already exists
    $check_sql = "SELECT * FROM tb_course WHERE c_code = '$course_code'";
    $check_result = mysqli_query($con, $check_sql);

    if(mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Course Code already exists!');</script>";
    } else {
        // Insert new course into database
        $insert_sql = "INSERT INTO tb_course (c_code, c_name, c_credit, c_lect) 
                       VALUES ('$course_code', '$course_name', '$course_credit', '$course_lecturer')";
        
        if(mysqli_query($con, $insert_sql)) {
            echo "<script>alert('Course added successfully!'); window.location='managecourse.php';</script>";
        } else {
            echo "<script>alert('Error adding course.');</script>";
        }
    }
}
?>

<div class="container">
    <h4 class="text-center" style="font-family: Verdana, sans-serif;">ADD NEW COURSE</h4>

    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label">Course Code</label>
            <input type="text" class="form-control" name="c_code" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Course Name</label>
            <input type="text" class="form-control" name="c_name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Credit</label>
            <input type="number" class="form-control" name="c_credit" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lecturer ID</label>
            <input type="text" class="form-control" name="c_lect" required>
        </div>

        <button type="submit" name="add" class="btn login-button">Add Course</button>
        <a href="managecourse.php" class="btn btn-secondary">Back</a>
    </form>
</div>

<?php include 'footer.php'; ?>
