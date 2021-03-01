<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";




session_start();

// initializing variables
$name = "";
$email    = "";
$errors = array(); 
$mail = new PHPMailer(true);

// connect to the database
$db = mysqli_connect('localhost','root', '', 'ems');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE name='$name' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['name'] === $name) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (name, email, password) 
  			  VALUES('$name', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
    //Enable SMTP debugging.
    $mail->SMTPDebug = 3;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name 
    $mail->Host = "smtp.mailtrap.io";
    //Set this to true if SMTP host required authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password 
    $mail->Username = "machinelearner2334@gmail.com";
    $mail->Password = "";
    //If SMTP required TLS encryption then set it 
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to 
    $mail->Port = 2525;

    $mail->From = 'machinelearner2334@gmail.com';
    $mail->FromName = 'March Madness';

    $mail->addAddress($email, $name);

    $mail->isHTML(true);

    $mail->Subject = "Welcome to March Madness";
    $mail->Body = "<p>Your account was registered successfully</p>";

    try {
      $mail->send();
      echo "Message has been sent successfully";
    } catch (Exception $e) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
  }
}
