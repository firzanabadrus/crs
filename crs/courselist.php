<?php include ('crssession.php');

if(!session_id())
{
  session_start();
} 

include 'headerLecturer.php';
include 'dbconnect.php';

//Get user id
$uic = $_SESSION['u_sNo'];


//retrieve all registered courses
$sql = "SELECT * FROM tb_registration
        LEFT JOIN tb_user ON tb_registration.r_student = tb_user.u_sNo
        LEFT JOIN tb_course ON tb_registration.r_course = tb_course.c_code
        LEFT JOIN tb_status ON tb_registration.r_status = tb_status.s_id
        WHERE tb_course.c_lect = '$uic'";


//execute SQL statement
$result = mysqli_query($con, $sql);

?>

<div class="container">

  <div class="container">
  <h4 style="text-align: center; font-family: Verdana, sans-serif;">STUDENT LIST</h4><br>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Semester</th>
        <th scope="col">Student ID</th>
        <th scope="col">Student Name</th>
        <th scope="col">Course</th>
        <th scope="col">Course Name</th>
        <th scope="col">Status</th>
        <th scope="col">Details</th>
      </tr>
    </thead>
    

    <tbody>
        <?php

      while($row = mysqli_fetch_array($result))
      {
        echo"<tr>";
            echo"<td>".$row['r_tID']."</td>";
            echo"<td>".$row['r_sem']."</td>";
            echo"<td>".$row['u_sNo']."</td>";
            echo"<td>".$row['u_name']."</td>";
            echo"<td>".$row['r_course']."</td>";
            echo"<td>".$row['c_name']."</td>";
            echo"<td>".$row['s_desc']."</td>";
            echo"<td>";
            echo"<a href='processCourseapproval.php?id=".$row['r_tID']."' class='btn btn-info'>View</a>";
            echo"</td>";
        echo"</tr>";
      }

      ?>
    </tbody>
  </table>

</div><br><br><br>

<?php include 'footer.php'; ?>

