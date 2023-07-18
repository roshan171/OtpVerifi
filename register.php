<?php  
include "constant.php";

if (isset($_POST['register'])) {
    // Retrieve form values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Generate OTP
    $otp = mt_rand(100000, 999999);

    // Insert user details into the database
    $insertQuery = "INSERT INTO user (name, email, password, otp) VALUES ('$name', '$email', '$password', '$otp')";
    mysqli_query($conn, $insertQuery);
    $userId = mysqli_insert_id($conn);

    // Send OTP to user's email
    $subject = "OTP for Registration";
    $message = "Your OTP is: $otp";
    $headers = "From: your-email@example.com";
    mail($email, $subject, $message, $headers);

    // Redirect to the OTP verification page
    header("Location: verify_otp.php?user_id=$userId");
    exit;
}







?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<form action="register.php" method="post">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="password" placeholder="Password" required>
    <button type="submit" name="register">Register</button>
</form>



</body>
</html>