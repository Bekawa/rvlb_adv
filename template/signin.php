<?php


?>


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

  <title>Sing In</title>

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

      <div class="az-signin-header">
        <h2>Welcome back!</h2>
        <h4>Please sign in to continue</h4>




        <form action="../controller/Authentication.php" method="post">
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" placeholder="Enter your email" name="usr_email" id="usr_mail">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter your password" value="" name="usr_password" id="usr_pass">
          </div>
          <input type="submit" value="Signin" class="btn btn-az-primary btn-block name" name="login"> 
        </form>

       





      </div><!-- az-signin-header -->
      <div class="az-signin-footer">
        <p><a href="">Forgot password?</a></p>
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