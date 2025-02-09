<!-- student -->
<?php
include ('crssession.php');

if (!session_id()) {
    session_start();
}

include 'headerStudent.php';
include 'dbconnect.php';

// Get user ID
$uic = $_SESSION['u_sNo'];

// Get current semester (you can replace this with your method of getting the current semester)
$currentSemester = "2024/2025-2"; // Update this with the actual current semester logic

// Check if previous semester is passed via URL, otherwise set it to null
$previousSemester = isset($_GET['semester']) ? $_GET['semester'] : null;

// Retrieve current courses
$currentSql = "SELECT * FROM tb_registration
        LEFT JOIN tb_course ON tb_registration.r_course = tb_course.c_code
        LEFT JOIN tb_status ON tb_registration.r_status = tb_status.s_id
        WHERE r_student = '$uic' AND r_sem = '$currentSemester'";

// Retrieve previous courses (if a previous semester is selected, use it)
$previousSql = $previousSemester ? "SELECT * FROM tb_registration
        LEFT JOIN tb_course ON tb_registration.r_course = tb_course.c_code
        LEFT JOIN tb_status ON tb_registration.r_status = tb_status.s_id
        WHERE r_student = '$uic' AND r_sem = '$previousSemester'"
:       "SELECT * FROM tb_registration
        LEFT JOIN tb_course ON tb_registration.r_course = tb_course.c_code
        LEFT JOIN tb_status ON tb_registration.r_status = tb_status.s_id
        WHERE r_student = '$uic' AND r_sem != '$currentSemester'";

// Execute SQL statements
$currentResult = mysqli_query($con, $currentSql);
$previousResult = mysqli_query($con, $previousSql);
?>

<div class="container">
    <h4 style="text-align: center; font-family: Verdana, sans-serif;">Course Registration</h4>
    <br>

    <!-- Current Courses Table -->
    <h5>Current Courses</h5>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Transaction ID</th>
                <th scope="col">Semester</th>
                <th scope="col">Code</th>
                <th scope="col">Course Name</th>
                <th scope="col">Credit</th>
                <th scope="col">Status</th>
                <th scope="col">Modify</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($currentResult)) {
                echo "<tr>";
                echo "<td>" . $row['r_tID'] . "</td>";
                echo "<td>" . $row['r_sem'] . "</td>";
                echo "<td>" . $row['r_course'] . "</td>";
                echo "<td>" . $row['c_name'] . "</td>";
                echo "<td>" . $row['c_credit'] . "</td>";
                echo "<td>" . $row['s_desc'] . "</td>";

                // Add buttons for modify and cancel
                echo "<td>";
                echo "<a href='modify_course.php?transaction_id=" . $row['r_tID'] . "' class='btn btn-warning btn-sm'>Edit</a> ";
                echo "<a href='cancel_course.php?transaction_id=" . $row['r_tID'] . "' class='btn btn-danger btn-sm'>Cancel</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>

    </table>
    <p>*Note: If the status of your course is "pending", it means the course is full.</p>
    <br><br>

    <!-- Link to Previous Courses -->
    <h5><a href="?semester=2024/2025-1" style="text-decoration: underline;">Previous Course Semester (2024/2025-1)</a></h5>
<br><br>
    <!-- Previous Courses Table -->
    <?php if ($previousSemester): ?>
        <!-- <h5>Previous Courses</h5> -->
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Code</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Credit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($previousResult)) {
                    echo "<tr>";
                    echo "<td>" . $row['r_tID'] . "</td>";
                    echo "<td>" . $row['r_sem'] . "</td>";
                    echo "<td>" . $row['r_course'] . "</td>";
                    echo "<td>" . $row['c_name'] . "</td>";
                    echo "<td>" . $row['c_credit'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br><br><br>

        <!-- JavaScript to show confirmation alert -->
        <script>
        function confirmDelete(transaction_id) {
            if (confirm("Are you sure you want to delete this course?")) {
            window.location.href = "cancel_course.php" ;
            }
        }
        </script>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
