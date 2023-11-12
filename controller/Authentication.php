<?php

include("../config/app.php");

//echo $connect ;


require '../assets/vendor/autoload.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// $result = mysqli_query($conn, $query);

//if user signup button
if (isset($_POST['signup'])) {
    $name = validateInput($connection, $_POST['usr_name']);
    $email = validateInput($connection, $_POST['usr_email']);
    $password = validateInput($connection, $_POST['usr_password']);
    $cpassword = validateInput($connection, $_POST['usr_cpassword']);

    if ($password !== $cpassword) {

        $msg = "<span>Confirm password not matched!</span>";
        $_SESSION['error'] = $msg;
        echo '<script>window.location.href = "../template/signUp.php";</script>';
    } else {
        $email_check = "SELECT usr_email FROM rv_users WHERE usr_email = '$email'";
        $email_res = mysqli_query($connection, $email_check);
        $check = mysqli_num_rows($email_res) > 0;
        if ($check == true) {

            $msg = "<span>Email already exist.!<br></span>" . $email;
            $_SESSION['error'] = $msg;
            echo '<script>window.location.href = "../template/signUp.php";</script>';
        } else {
            $encpass = md5($password);
            $code = rand(999999, 111111);
            $status = "notverified";

                echo "<div style='display: none;'>";
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   =  true;                                   //Enable SMTP authentication
                    $mail->Username   = 'bereketkassahun369@gmail.com';                     //SMTP username
                    $mail->Password   = 'pjkljjwhxjourjtd';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('bereketkassahun369@gmail.com');
                    $mail->addAddress($email);

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'OTP - Verification';
                    $mail->Body = 'Your verification code is : ' . $code;
                    $mail->send();

                    if ($mail->send()) {

                        //function
                        $query = "INSERT INTO rv_users (usr_name, usr_email, usr_password, usr_code, usr_status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
                        $result = mysqli_query($connection, $query);

                        $msg = "<span>We sent a verification link to your email address</span>";
                        $_SESSION['success'] = $msg;
                        echo '<script>window.location.href = "../template/Otp.php";</script>';

                        // Go to OTP page
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        echo '<script>window.location.href = "../template/Otp.php";</script>';
                        exit();
                    } else {
                        // Failed to send code
                        $msg = "<span>Failed while sending code! Retry</span>";
                        $_SESSION['error'] = $msg;
                        echo '<script>window.location.href = "../template/signUp.php";</script>';
                    }
                } catch (Exception $e) {
                    // to be re write
                    // echo "Failed while sending code! {$mail->ErrorInfo}";
                    $msg = "<span> Failed while sending code! Retry </span>";
                    $_SESSION['error'] = $msg;
                    echo '<script>window.location.href = "../template/signUp.php";</script>';
                }
   
        }
    }
}
