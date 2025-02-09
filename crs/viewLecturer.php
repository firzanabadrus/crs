<?php
include ('crssession.php');

if (!session_id()) {
    session_start();
}

include 'headerLecturer.php';
include 'dbconnect.php';

// Fetch lecturer details (assuming session stores lecturer ID)
$lecturer_id = $_SESSION['u_sNo'];

// Get total assigned courses
$query_courses = "SELECT COUNT(*) AS total_courses FROM tb_course WHERE c_lect = '$lecturer_id'";
$result_courses = mysqli_query($con, $query_courses);
$row_courses = mysqli_fetch_assoc($result_courses);
$total_courses = $row_courses['total_courses'];

// Get pending student approvals
$query_pending = "SELECT COUNT(*) AS total_pending FROM tb_registration
                  JOIN tb_course ON tb_registration.r_course = tb_course.c_code
                  WHERE c_lect = '$lecturer_id' AND r_status = '2'";
$result_pending = mysqli_query($con, $query_pending);
$row_pending = mysqli_fetch_assoc($result_pending);
$total_pending = $row_pending['total_pending'];

?>


<!-- Page Content -->
<div class="container mt-4">
  <h1 class="text-primary">Hi, Lecturer <?= htmlspecialchars($lecturer_id); ?>!</h1>
    <p>This is your homepage.</p>

    <!-- Dashboard Cards -->
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-success text-white animated-card">
                <div class="card-body">
                    <h5 class="card-title">Total Courses Assigned</h5>
                    <p class="card-text"><?= $total_courses; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-danger text-white animated-card">
                <div class="card-body">
                    <h5 class="card-title">Pending Student Approvals</h5>
                    <p class="card-text"><?= $total_pending; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table of Assigned Courses -->
    <div class="mt-4">
        <br><h3>Assigned Courses</h3>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Total Students</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query_list = "SELECT tb_course.*, 
                                    COUNT(tb_registration.r_student) AS student_count
                              FROM tb_course
                              LEFT JOIN tb_registration ON tb_course.c_code = tb_registration.r_course
                              WHERE tb_course.c_lect = '$lecturer_id'
                              GROUP BY tb_course.c_code";


                $result_list = mysqli_query($con, $query_list);

                while ($row = mysqli_fetch_assoc($result_list)) {
                    echo "<tr>
                            <td>{$row['c_code']}</td>
                            <td>{$row['c_name']}</td>
                            <td>{$row['student_count']}</td>
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
