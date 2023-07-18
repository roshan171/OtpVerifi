<?php
// Assuming you have a database connection established
include "constant.php";
// Check if the verification form is submitted
if (isset($_POST['verify'])) {
    // Retrieve form values
    $userId = $_POST['user_id'];
    $otp = $_POST['otp'];

    // Check if the OTP is valid
    $selectQuery = "SELECT * FROM user WHERE id = '$userId' AND otp = '$otp'";
    $result = mysqli_query($conn, $selectQuery);

    if (mysqli_num_rows($result) == 1) {
        // Update user verification status
        $updateQuery = "UPDATE user SET is_verified = 1 WHERE id = '$userId'";
        mysqli_query($conn, $updateQuery);

        // Redirect to login page or display success message
        header("Location:login_process.php");
        exit;
    } else {
        // OTP verification failed, display an error message
        echo "Invalid OTP";
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
 <form action="verify_otp.php" method="post">
    <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
    <input type="text" name="otp" placeholder="Enter OTP" required>
    <button type="submit" name="verify">Verify</button>
</form>




</body>
</html>