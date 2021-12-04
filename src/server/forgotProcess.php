<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] != 'POST')
  exit(json_encode(['status' => 'error', 'message' => 'Wrong request method']));
if (isset($_POST['email'])) {
  if (empty($_POST['email'])) {
    exit(json_encode(['status' => 'error', 'message' => 'Please enter your email']));
  }
} else {
  exit(json_encode(['status' => 'error', 'message' => 'Please enter your email']));
}

require('db_connect.php');
if ($error) {
  exit(json_encode(['status' => 'error', 'message' => 'Something went wrong, please try again later.']));
}

$token = bin2hex(random_bytes(32));
$query = "UPDATE users SET reset_token = '{$token}' WHERE email = '{$_POST['email']}'";
$result = mysqli_query($connection, $query);
if (!$result) {
  exit(json_encode(['status' => 'db_error2', 'message' => 'Something went wrong, please try again.']));
}

$mail = new PHPMailer();

try {
  $mail->CharSet = 'UTF-8';
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPDebug = 0;
  $mail->SMTPAuth = true;
  $mail->Username = $_ENV['FROM_EMAIL'];
  $mail->Password = $_ENV['FROM_PASSWORD'];
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  $mail->setFrom($_ENV['FROM_EMAIL'], 'Quickscope');
  $mail->addAddress($_POST['email']);
  $mail->isHTML(true);
  $mail->Subject = 'Reset Quickscope Password';
  $mail->Body = '<p>You request a password reset. Please click the following link:</p><br><a href="http://localhost/the-project-360-quickscope/src/client/reset.php?token=' . $token . '&email=' . $_POST['email'] . '">Reset Password</a>';
  $mail->send();
  exit(json_encode(['status' => 'success', 'message' => 'Please check your email for further instructions.']));
} catch (Exception $e) {
  exit(json_encode(['status' => 'exception_error', 'message' => 'Something went wrong, please try again.']));
}
