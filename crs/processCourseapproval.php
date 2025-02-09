<?php include ('crssession.php');

if(!session_id())
{
  session_start();
} 

include 'headerLecturer.php';
include 'dbconnect.php';

//Get transaction id
if($_GET['id'])
{
    $tid = $_GET['id'];
}


//retrieve all registered courses
$sql = "SELECT * FROM tb_registration
        LEFT JOIN tb_user ON tb_registration.r_student = tb_user.u_sNo
        LEFT JOIN tb_course ON tb_registration.r_course = tb_course.c_code
        LEFT JOIN tb_status ON tb_registration.r_status = tb_status.s_id
        WHERE r_tid = '$tid' ";

//execute SQL statement
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

?>

<div class="container">
  <br>
  <h4>Student Details</h4><br>
   <table class="table table-striped table-hover">
     <tr>
        <td>Transaction ID</td>
        <td><?php echo$row['r_tID']?></td>
      </tr>

      <tr>
        <td>Semester</td>
        <td><?php echo$row['r_sem']?></td>
      </tr>

      <tr>
        <td>Student ID</td>
        <td><?php echo$row['u_sNo']?></td>
      </tr>

      <tr>
        <td>Student Name</td>
        <td><?php echo$row['u_name']?></td>
      </tr>

      <tr>
        <td>Course</td>
        <td><?php echo$row['c_code']?></td>
      </tr>

      <tr>
        <td>Course Name</td>
        <td><?php echo$row['c_name']?></td>
      </tr>

      <tr>
        <td>Approval</td>
        <td>
          <?php echo$row['s_desc']
          ?>
          </td>
      </tr>
    
  </table>
  <a href="courselist.php" class="btn btn-success">Back</a>
</div>

<?php include 'footer.php'; ?>

