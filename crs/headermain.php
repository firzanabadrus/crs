<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Favicon -->
  <link rel="icon" href="img/logocrs.png" type="image/x-icon">
  <title>Course Registration System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <style>
    body {
      background-color: lightblue;
      color: black;
    }
    .navbar {
      background-color: steelblue !important;
      width: 100%;
      max-width: 100%;
      margin: 0 auto;
    }
    .navbar .nav-link,
    .navbar .navbar-brand {
      color: white !important;
    }
    .navbar .nav-link:hover {
      color: #cccccc !important;
    }
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: lightblue;
      color: dimgray;
      text-align: center;
    }
    .login-button {
      background-color: steelblue !important;
      color: white !important;
      border: none;
    }
    .login-button:hover {
      background-color: navy !important;
    }
    .nav-right {
      margin-left: auto;
    }
    .form-label {
      color: #333333; /* Dark gray color */
    }
    .btn-link {
        color: dodgerblue;
        padding: 0.375rem 0.75rem;
    }
    .feature-box {
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
    .btn-link:hover {
        color: mediumblue;
    }
    .alert {
      margin-top: 1rem;
      padding: 1rem;
      border-radius: 5px;
    }
    .alert-danger {
      background-color: #f8d7da;
      border-color: #f5c6cb;
      color: #721c24;
    }
    .alert-success {
      background-color: #d4edda;
      border-color: #c3e6cb;
      color: #155724;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg" data-bs-theme="dark">
  <div class="container-fluid">
    <img src="img/logocrs.png" alt="CRS Logo" style="width: 100px; height: auto;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <!-- <ul class="navbar-nav nav-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-person-circle"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Logout</a>
          </div>
        </li>
      </ul> -->
    </div>
  </div>
</nav>
<br>
</body>
</html>
