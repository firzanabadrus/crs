<!-- admin -->
<?php 
include ('crssession.php');

if(!session_id()) {
  session_start();
} 

include 'headerAdmin.php';
include 'dbconnect.php';

// Get user ID
$uic = $_SESSION['u_sNo'];

// Retrieve all registered courses
$sql = "SELECT * FROM tb_registration
        LEFT JOIN tb_user ON tb_registration.r_student = tb_user.u_sNo
        LEFT JOIN tb_course ON tb_registration.r_course = tb_course.c_code
        LEFT JOIN tb_status ON tb_registration.r_status = tb_status.s_id
        WHERE r_status = '2'";

$result = mysqli_query($con, $sql);

// Handle status update
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action']; // 'approve' or 'reject'
    $id = $_GET['id'];
    
    if ($action == 'approve') {
        $new_status = 1; // Approved status
        $message = "Your course registration has been approved!";
    } elseif ($action == 'reject') {
        $new_status = 3; // Rejected status
        $message = "Your course registration has been rejected.";
    }

    // Update student status in the database
    $update_sql = "UPDATE tb_registration SET r_status = '$new_status' WHERE r_tID = '$id'";
    if (mysqli_query($con, $update_sql)) {
        // Insert notification into tb_notifications (assuming it exists)
        $notif_sql = "INSERT INTO tb_notification (student_id, message, status) VALUES ((SELECT r_student FROM tb_registration WHERE r_tID = '$id'), '$message', 'unread')";
        mysqli_query($con, $notif_sql);
        
        // Redirect back with success message
        echo "<script>alert('Status updated successfully!'); window.location='courseapproval.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error updating status.');</script>";
    }
}
?>

<div class="container">
  <h4>Manage Registration</h4>
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
        <th scope="col">Operation</th>
      </tr>
    </thead>
    
    <tbody>
     <?php
      while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$row['r_tID']."</td>";
        echo "<td>".$row['r_sem']."</td>";
        echo "<td>".$row['u_sNo']."</td>";
        echo "<td>".$row['u_name']."</td>";
        echo "<td>".$row['r_course']."</td>";
        echo "<td>".$row['c_name']."</td>";
        echo "<td>".$row['s_desc']."</td>";
        echo "<td>";
        echo "<a href='?action=approve&id=".$row['r_tID']."' class='btn btn-success'>Approve</a> ";
        echo "<a href='?action=reject&id=".$row['r_tID']."' class='btn btn-danger '>Reject </a>";
        echo "</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div><br><br><br>

<?php include 'footer.php'; ?>
