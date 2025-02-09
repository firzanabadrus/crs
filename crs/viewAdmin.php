<?php 
include ('crssession.php'); 

if (!session_id()) {
    session_start();
} 

include 'headerAdmin.php'; 
include 'dbconnect.php';  // Ensure this connects to your database

// Get the total number of students registered
$query_registered = "SELECT COUNT(*) AS total_registered FROM tb_registration WHERE r_status = '1'";
$result_registered = mysqli_query($con, $query_registered);
$row_registered = mysqli_fetch_assoc($result_registered);
$total_registered = $row_registered['total_registered'];

// Get the total number of pending registrations
$query_pending = "SELECT COUNT(*) AS total_pending FROM tb_registration WHERE r_status = '2'";
$result_pending = mysqli_query($con, $query_pending);
$row_pending = mysqli_fetch_assoc($result_pending);
$total_pending = $row_pending['total_pending'];

// Get the total number of courses
$query_course = "SELECT COUNT(*) AS total_course FROM tb_course";
$result_course = mysqli_query($con, $query_course);
$row_course = mysqli_fetch_assoc($result_course);
$total_course = $row_course['total_course'];

?>

<!-- Page Content -->
<div class="container mt-4">
    <h1 class="text-primary">Welcome, IT Staff!</h1><br>
    <!-- <p>This is the IT Staff Page</p> -->

    <!-- Dashboard Cards -->
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-info text-white animated-card" onclick="window.location.href='#'">
                <div class="card-body">
                    <h5 class="card-title">Total Registered Students</h5>
                    <p class="card-text"><?= $total_registered; ?></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card bg-warning text-dark animated-card" onclick="window.location.href='courseapproval.php'">
                <div class="card-body">
                    <h5 class="card-title">Pending Registrations</h5>
                    <p class="card-text"><?= $total_pending; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success text-white animated-card" onclick="window.location.href='managecourse.php'">
                <div class="card-body">
                    <h5 class="card-title">Total Courses</h5>
                    <p class="card-text"><?= $total_course; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Graph for Registrations -->
    <div class="mt-5">
        <canvas id="registrationChart"></canvas>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('registrationChart').getContext('2d');
    var registrationChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Registered', 'Pending'],
            datasets: [{
                label: 'Students', 
                data: [<?= $total_registered; ?>, <?= $total_pending; ?>], 
                backgroundColor: ['#28a745', '#ffc107'],
                borderColor: ['#218838', '#e0a800'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script><br><br><br>

<!-- CSS & jQuery for Card Animation -->
<style>
    .animated-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s;
        cursor: pointer;
    }
    .animated-card:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    }
</style>

<?php include 'footer.php'; ?>
