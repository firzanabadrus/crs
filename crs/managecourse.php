<!-- admin -->
<?php 
include ('crssession.php');

if (!session_id()) {
    session_start();
} 

include 'headerAdmin.php';
include 'dbconnect.php';

// Get user ID
$uic = $_SESSION['u_sNo'];

// Retrieve all registered courses
$sql = "SELECT * FROM tb_course";
$result = mysqli_query($con, $sql);
?>

<div class="container">
  
  <!-- Add Course Button -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 style="font-family: Verdana, sans-serif;">COURSE LIST</h4>
    <a href="addCourse.php" class="btn btn-warning">+ Add Course</a>
  </div>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">Course Code</th>
        <th scope="col">Course Name</th>
        <th scope="col">Credit</th>
        <th scope="col">Lecturer ID</th>
        <th scope="col">Operation</th>
      </tr>
    </thead>

    <tbody>
      <?php
      while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['c_code'] . "</td>";
          echo "<td>" . $row['c_name'] . "</td>";
          echo "<td>" . $row['c_credit'] . "</td>";
          echo "<td>" . $row['c_lect'] . "</td>";
          echo "<td>";
          echo "<a href='processManagecourse.php?id=" . $row['c_code'] . "' class='btn btn-info'>Edit</a>";
          echo "<a href='#' onclick='confirmDelete(\"" . $row['c_code'] . "\")' class='btn btn-danger'>Delete</a>";
          echo "</td>";
          echo "</tr>";
      }
      ?>
    </tbody>
  </table>

</div><br><br><br>

<!-- JavaScript to show confirmation alert -->
<script>
  function confirmDelete(courseCode) {
    if (confirm("Are you sure you want to delete this course?")) {
      window.location.href = "delete_course.php?c_code=" + courseCode;
    }
  }
</script>

<?php include 'footer.php'; ?>
