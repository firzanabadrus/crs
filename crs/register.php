<?php
session_start(); // MUST BE AT THE VERY TOP BEFORE ANY OUTPUT
include('headermain.php');
?>


<div class="container">

  <?php
  // Display error/success messages
  if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger mt-4">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
  }
  if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success mt-4">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']);
  }
  ?>

  <br><h4>Please fill all following details</h4>
  <h6>*This registration only for students.</h6>
  <form method="POST" action="processRegister.php">
    <fieldset>
      
      <div>
        <label for="exampleInputEmail1" class="form-label mt-4">Please enter your student number</label>
        <input type="text" name="funame" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your ID" required>
      </div>

      <!-- Password Field -->
      <div class="form-group">
        <label for="password" class="form-label mt-4">Create your password (min 8 characters)</label>
        <div class="position-relative">
          <input type="password" name="fpwd" class="form-control" id="password" placeholder="Create password" required minlength="8">
          <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y" onclick="togglePassword('password')">
            <i class="bi bi-eye-slash"></i>
          </button>
        </div>
      </div>

      <!-- Confirm Password Field -->
      <div class="form-group">
        <label for="confirmPassword" class="form-label mt-4">Confirm your password</label>
        <div class="position-relative">
          <input type="password" name="fpwd_confirm" class="form-control" id="confirmPassword" placeholder="Rewrite the password" required minlength="8">
          <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y" onclick="togglePassword('confirmPassword')">
            <i class="bi bi-eye-slash"></i>
          </button>
        </div>
      </div>

       <div>
        <label for="exampleInputEmail1" class="form-label mt-4">Please enter your email address</label>
        <input type="email" name="femail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email address" required>
      </div>

       <div>
        <label for="exampleInputEmail1" class="form-label mt-4">Enter your full name</label>
        <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your full name according to your IC" required>
      </div>

      <div>
        <label for="exampleInputEmail1" class="form-label mt-4">Enter your contact number</label>
        <input type="text" name="fcontact" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your phone number" required>
      </div>

      <div>
        <label for="exampleSelect1" class="form-label mt-4">Select your state</label>
        <select class="form-select" name="fstate" id="exampleSelect1" required>
          <option>Please choose ..</option>
          <option>Johor</option>
          <option>Kedah</option>
          <option>Kelantan</option>
          <option>Melaka</option>
          <option>Negeri Sembilan</option>
          <option>Pahang</option>
          <option>Pulau Pinang</option>
          <option>Perak</option>
          <option>Perlis</option>
          <option>Selangor</option>
          <option>Terengganu</option>
          <option>Sabah</option>
          <option>Sarawak</option>
          <option>W.P. Kuala Lumpur</option>
          <option>W.P. Labuan</option>
          <option>W.P. Putrajaya</option>
        </select>
      </div>

      <br>
      <button type="submit" class="btn login-button">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
      <br><br><br><br><br>
    </fieldset>
  </form>
  
</div>

<script>
function togglePassword(fieldId) {
  const passwordField = document.getElementById(fieldId);
  const icon = passwordField.parentElement.querySelector('i');
  
  if (passwordField.type === "password") {
    passwordField.type = "text";
    icon.classList.remove('bi-eye-slash');
    icon.classList.add('bi-eye');
  } else {
    passwordField.type = "password";
    icon.classList.remove('bi-eye');
    icon.classList.add('bi-eye-slash');
  }
}
</script>

<?php include 'footer.php'; ?>