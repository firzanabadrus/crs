<?php 
include ('crssession.php');

if(!session_id())
{
  session_start();
} 

include 'headerLecturer.php';
include 'dbconnect.php';

// Get course code from the URL
if(isset($_GET['id']))
{
    $course_code = $_GET['id'];
}

// Retrieve course details based on course code
$sql = "SELECT tb_course.*, 
               COUNT(tb_registration.r_student) AS student_count, 
               tb_user.u_sNo, 
               tb_user.u_name
        FROM tb_course
        LEFT JOIN tb_registration ON tb_course.c_code = tb_registration.r_course
        LEFT JOIN tb_user ON tb_course.c_lect = tb_user.u_sNo
        WHERE tb_course.c_code = '$course_code' 
        GROUP BY tb_course.c_code, tb_user.u_sNo, tb_user.u_name";

// Execute SQL statement
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>

<div class="container">
  <br>
  <h4>Course Details</h4><br>
   <table class="table table-striped table-hover">
      <tr>
        <td>Lecturer Code</td>
        <td><?php echo $row['c_lect']; ?></td>
      </tr>

      <tr>
        <td>Course Code</td>
        <td><?php echo $row['c_code']; ?></td>
      </tr>

      <tr>
        <td>Course Name</td>
        <td><?php echo $row['c_name']; ?></td>
      </tr>

      <tr>
        <td>Credit</td>
        <td><?php echo $row['c_credit']; ?></td>
      </tr>

      <tr>
        <td>Lecturer Name</td>
        <td><?php echo $row['u_name']; ?></td>
      </tr>

      <tr>
        <td>Students Registered</td>
        <td><?php echo $row['student_count']; ?></td>
      </tr>
    
  </table>
  <a href="courseassign.php" class="btn btn-success">Back</a>
</div>

<?php include 'footer.php'; ?>
