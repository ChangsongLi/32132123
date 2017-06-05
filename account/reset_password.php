<?php
// check email exists
$email = strtolower($_POST['email']);

$connection = new mysqli("localhost", "root", "909185", "AmericanFraud");
if (mysqli_connect_errno($connection)) {
	echo "<div>";
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	echo "</div>";
}

$stmt = $connection->prepare("SELECT password FROM Users WHERE email = ?;");
$stmt->bind_param('s', $email);
$stmt->execute();

// get result from query
$result = $stmt->get_result();

$return = array('result' => false);

if($result->num_rows > 0){
	// get only rwo returned
	$row = $result->fetch_assoc();
	$return = array('result' => true);

	$salt = "uwi189y9dhsjfhgyhzxzmb43";
	$password = hash('sha256', $password.$salt);

	$stmt->close();

	$stmt = $connection->prepare("UPDATE Users SET hash = ?, resetDate = ? WHERE email = ?");
	$stmt->bind_param('sss', $password, date('Y-m-d H:i:s'), $email);
	$stmt->execute();

	$url = "reset.php?p=".$password."&e=".$email;

	// send reset link
	$to = "changsongliqd@gmail.com";
	$subject = "重置密码（不要回复次邮件）";
	$txt = "Hello world! ".$url;
	$headers = "From: resetPassword@notdecide.com" . "\r\n" .
	"CC: ";

	mail($to,$subject,$txt,$headers);
}

echo json_encode( $return );

?>
