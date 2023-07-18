<?php
// Assuming you have a database connection established
include "constant.php";
// Check if the login form is submitted
if (isset($_POST['login'])) {
    // Retrieve form values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user is verified
    $selectQuery = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND is_verified = 1";
    $result = mysqli_query($conn, $selectQuery);

    if (mysqli_num_rows($result) == 1) {
        // User is logged in, proceed with further actions
        // Redirect to dashboard or display success message
        // echo "Login successful";
         header("Location:imgcrud.php");
    } else {
        // Login failed, display an error message
        echo "Invalid credentials or user not verified";
    }
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

	<form action="login_process.php" method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>

</body>
</html>