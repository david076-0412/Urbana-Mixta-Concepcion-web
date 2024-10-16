<?php
session_start();

$email = $_REQUEST['email'];

$value = (int)$_REQUEST['otp'];
$otp = (int)$_SESSION['otp'];

if ($value == $otp) {
    $_SESSION['email'] = $_REQUEST['email'];
    $_SESSION['status'] = 'success';
    header("Location: ../newPasswordAlumno.php?email=".$email);
    exit();
} else {
    $_SESSION['message'] = 'wrong otp';
    header("Location: ../EnterOtpAlumno.php?email=".$email);
    exit();
}
