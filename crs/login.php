<?php 
session_start();
include 'headermain.php'; ?>

<div class="container">

  <br><br><h4>Login to Course Registration System</h4>
  <form method="POST" action="processLogin.php">
    <fieldset>
      
      <div>
        <label for="exampleInputEmail1" class="form-label mt-4">Enter staff or student number</label>
        <input type="text" name="funame" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your staff or student ID" required>
      </div>

      <div>
        <label for="exampleInputPassword1" class="form-label mt-4">Enter password</label>
        <div class="position-relative">
          <input type="password" name="fpwd" class="form-control" id="password" placeholder="Enter password" required>
          <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y" onclick="togglePassword('password')">
            <i class="bi bi-eye-slash"></i>
          </button>
        </div>
      </div>
    
      <br>
      <button type="submit" class="btn login-button">Login</button>
      <br><br><br><br>
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