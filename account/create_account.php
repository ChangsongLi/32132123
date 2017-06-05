<?php
$birthday = $_POST['birthday'];
$email = strtolower($_POST['email']);
$account = $_POST['account'];
$password = $_POST['password'];
$gender = $_POST['gender'];

$connection = new mysqli("localhost", "root", "909185", "AmericanFraud");
if (mysqli_connect_errno($connection)) {
	echo "<div>";
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	echo "</div>";
}

$salt = 'djskhdj324kahjjx54545bmnbxd21hakjsajdd';
$password = hash('sha256', $password.$salt);

$stmt = $connection->prepare("INSERT INTO Users (name, email, password, birthday, gender) VALUES (?, ?, ?, ?, ?);");
$stmt->bind_param('sssss', $account, $email, $password, $birthday, $gender);

$stmt->execute();

$return = array('result' => false);

if($stmt->affected_rows > 0){
	$return = array('result' => true);

	// set up session
	session_start();
	$_SESSION["account"] = $account;
	$_SESSION["email"] = $email;
	$_SESSION["password"] = $password;
}

echo json_encode( $return );
?>
