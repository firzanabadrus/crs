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
$sql = "SELECT * FROM tb_course
        WHERE c_lect = '$uic'";



//execute SQL statement
$result = mysqli_query($con, $sql);

?>

<div class="container">

  <div class="container">
  <h4 style="text-align: center; font-family: Verdana, sans-serif;">COURSE LIST</h4><br>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <!-- <th scope="col">ID</th> -->
        <th scope="col">Code</th>
        <th scope="col">Course Name</th>
        <th scope="col">Credit</th>
        <!-- <th scope="col">Course</th>
        <th scope="col">Course Name</th>
        <th scope="col">Status</th> -->
        <th scope="col">Details</th>
      </tr>
    </thead>
    

    <tbody>
        <?php

      while($row = mysqli_fetch_array($result))
      {
        echo"<tr>";
            echo"<td>".$row['c_code']."</td>";
            echo"<td>".$row['c_name']."</td>";
            echo"<td>".$row['c_credit']."</td>";
            echo"<td>";
            echo "<a href='processCourseassign.php?id=".$row['c_code']."' class='btn btn-info'>View</a>";
            echo"</td>";
        echo"</tr>";
      }

      ?>
    </tbody>
  </table>

</div><br><br><br>

<?php include 'footer.php'; ?>

