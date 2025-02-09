<?php include 'headermain.php'; ?>

<!-- Add Google Fonts link to the head section (inside headermain.php) -->
<!-- Example font: Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

<!-- Main Container -->
<div class="container">
  <!-- Hero Section with Background Image -->
  <div class="jumbotron jumbotron-fluid text-white rounded shadow-lg" style="background-image: url('your-image.jpg'); background-size: cover; background-position: center;">
    <div class="container text-center py-5">
      <h1 class="display-4 font-weight-bold" style="font-family: 'Poppins', sans-serif;">Course Registration System</h1>
      <p class="lead mb-4" style="color: #333333;">Your gateway to easy course registration and academic management. Seamless, intuitive, and designed with your education in mind.</p>
      <a class="btn btn-light btn-lg px-4 py-2 shadow-sm" href="login.php" role="button">Log In</a>
      <a class="btn btn-outline-light btn-lg px-4 py-2 shadow-sm ml-3" href="#" role="button">Learn More</a>
    </div>
  </div>

  <!-- Features Section -->
  <div class="row text-center mt-5">
    <div class="col-md-4 mb-4">
      <div class="feature-box p-4 rounded shadow-lg hover-shadow">
        <i class="fas fa-book-open fa-3x mb-3"></i>
        <h3>Explore Courses</h3>
        <p>Browse a variety of courses tailored to your academic goals and interests.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="feature-box p-4 rounded shadow-lg hover-shadow">
        <i class="fas fa-clipboard-check fa-3x mb-3"></i>
        <h3>Easy Registration</h3>
        <p>Sign up for courses effortlessly with a few simple clicks and create your schedule.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="feature-box p-4 rounded shadow-lg hover-shadow">
        <i class="fas fa-user-tie fa-3x mb-3"></i>
        <h3>Manage Profiles</h3>
        <p>Manage your student, lecturer, and staff profiles with ease and efficiency.</p>
      </div>
    </div>
  </div>

  <!-- Call-to-Action Section -->
  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
      <h2 class="text-center text-dark">New Student?</h2>
      <p class="text-center mb-4">Sugn up to start your academic journey and manage your courses and profile seamlessly.</p>
      <div class="text-center">
        <a class="btn btn-success btn-lg px-4 py-2 rounded-pill shadow-lg" href="register.php" role="button">Sign Up</a>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
