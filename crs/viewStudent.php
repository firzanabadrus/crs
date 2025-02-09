<?php
include ('crssession.php');

if (!session_id()) {
    session_start();
}

include 'headerStudent.php';
include 'dbconnect.php';

// Fetch student details from session
$student_id = $_SESSION['u_sNo'];
// $student_name = $_SESSION['u_name'];  // Fetch student name from session

// Get total registered courses
$query_courses = "SELECT COUNT(*) AS total_courses FROM tb_registration WHERE r_student = '$student_id' AND r_status = '1'";
$result_courses = mysqli_query($con, $query_courses);
$row_courses = mysqli_fetch_assoc($result_courses);
$total_courses = $row_courses['total_courses'];

// Get pending course approvals
$query_pending = "SELECT COUNT(*) AS total_pending FROM tb_registration WHERE r_student = '$student_id' AND r_status = '2'";
$result_pending = mysqli_query($con, $query_pending);
$row_pending = mysqli_fetch_assoc($result_pending);
$total_pending = $row_pending['total_pending'];

?>

<!-- Page Content -->
<div class="container mt-4">
    <h1 class="text-primary">Hi, Student <?= htmlspecialchars($student_id); ?>!</h1>
    <p>This is student homepage.</p>

    <!-- Dashboard Cards -->
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-info text-white animated-card">
                <div class="card-body">
                    <h5 class="card-title">Total Registered Courses</h5>
                    <p class="card-text"><?= $total_courses; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-warning text-dark animated-card">
                <div class="card-body">
                    <h5 class="card-title">Pending Approvals</h5>
                    <p class="card-text"><?= $total_pending; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table of Enrolled Courses -->
    <div class="mt-4">
        <br><h3>My Courses</h3>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Semester</th>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Credit</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
               $query_list = "SELECT * FROM tb_registration
              LEFT JOIN tb_course ON tb_registration.r_course = tb_course.c_code
              LEFT JOIN tb_status ON tb_registration.r_status = tb_status.s_id
              WHERE r_student = '$student_id' AND r_status ='1'";


                $result_list = mysqli_query($con, $query_list);

                while ($row = mysqli_fetch_assoc($result_list)) {
                    $status = ($row['r_status'] == '1') ? 'Registered' : 'Pending';
                    echo "<tr>
                            <td>{$row['r_sem']}</td>
                            <td>{$row['r_course']}</td>
                            <td>{$row['c_name']}</td>
                            <td>{$row['c_credit']}</td>
                            <td>{$status}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table><br><br><br>
    </div>
</div>

<style>
    .animated-card {
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
    }
    .animated-card:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    }
</style>

<?php include 'footer.php'; ?>
