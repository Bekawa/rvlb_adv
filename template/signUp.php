<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
  <meta name="author" content="BootstrapDash">

  <title>Sign Up</title>

  <!-- vendor css -->
  <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/typicons.font/typicons.css" rel="stylesheet">

  <!-- azia CSS -->
  <link rel="stylesheet" href="../assets/css/azia.css">

</head>

<body class="az-body">

  <div class="az-signin-wrapper">
    <div class="az-card-signin card">

      <div class="az-logo centric">
        <h2 class="az-logo-title">Ministry Of Water and Energy</h2>
        <p class="az-dashboard-text"> FDRE | የኢትዮጵያ ፌደራላዊ ዴሞክራሲያዊ ሪፐብሊክ</p>
      </div>





      <?php
      session_start();

      if (isset($_SESSION['error'])) {
      ?>
        <div class="alert alert-warning alert-dismissible mt-1" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php
          echo $_SESSION['error'];
          unset($_SESSION['error']);
          ?>
        </div>
      <?php
      }if (isset($_SESSION['success'])) {
      ?>
        <div class="alert alert-warning alert-dismissible mt-1" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php
          echo $_SESSION['success'];
          unset($_SESSION['success']);
          ?>
        </div>
      <?php
      }
      ?>





      <div class="az-signin-header mt-3">
        <h2>Welcome to Registration</h2>


        <form action="../controller/Authentication.php" method="post">
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Enter your Username" name="usr_name" Required>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" placeholder="Enter your email" name="usr_email" Required>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter your password" name="usr_password" Required>
          </div>

          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" placeholder="Enter your Confirm password" name="usr_cpassword" Required>
          </div>





          <input type="submit" value="Sign Up" class="btn btn-az-primary btn-block name" name="signup">
        </form>







      </div><!-- az-signin-header -->
      <div class="az-signin-footer mt-1">
        <p><a href="signin.php">already have Account? Signin </a></p>
      </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
  </div><!-- az-signin-wrapper -->

  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/ionicons/ionicons.js"></script>
  <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>

  <script src="../assets/js/azia.js"></script>
  <script>
    $(function() {
      'use strict'

    });
  </script>
</body>

</html>