<!DOCTYPE html>
<html lang="en">

<head>

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
        <h2>Code Verification</h2>
        <h4>OTP code sent to your Email address.</h4>


        <form action="../controller/Authentication.php" method="post">
          <div class="form-group">
            <label>Username</label>
            <input type="number" class="form-control" placeholder="Enter verification code" name="otp" Required>
          </div>

          <input type="submit" value="Sign Up" class="btn btn-az-primary btn-block name" name="otp_check">
        </form>







      </div><!-- az-signin-header -->
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