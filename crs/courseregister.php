<?php 
include ('crssession.php');

if(!session_id()) {
  session_start();
} 

include 'headerstudent.php';
include 'dbconnect.php';
?>

<!-- Include Select2 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<div class="container">
  
  <br><h5>Course Registration Form</h5>
  <form method="POST" action="processCourseregister.php">
    <fieldset>
      
       <div>
        <label for="courseSelect" class="form-label mt-4">Select Course</label>
        <select class="form-select" name="fcourse" id="courseSelect" required>
          <option value="">. . .</option>
          <?php
            $sql = "SELECT * FROM tb_course";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
              echo "<option value='".$row['c_code']."'>".$row['c_code']." - ".$row['c_name']."</option>";

            }
          ?>
        </select>
      </div>
  
      <br>
      <div>
        <label for="semesterSelect" class="form-label mt-4">Select Semester:</label>
        <select class="form-select" name="fsem" id="semesterSelect" required>
          <option value="">. . .</option>
          <option>2024/2025-1</option>
          <option>2024/2025-2</option>
        </select>
      </div><br>

      <br>
      <button type="submit" class="btn login-button">Register</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
      <br><br><br><br><br>
    </fieldset>
  </form>
  
</div>

<script>
  $(document).ready(function() {
    $('#courseSelect').select2({
      placeholder: "Search for a course",
      allowClear: true
    });
  });
</script>

<?php include 'footer.php'; ?>
