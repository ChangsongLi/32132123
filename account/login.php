<?php
$email = strtolower($_POST['email']);
$password = $_POST['password'];

$salt = 'djskhdj324kahjjx54545bmnbxd21hakjsajdd';
$password = hash('sha256', $password.$salt);

$connection = new mysqli("localhost", "root", "909185", "AmericanFraud");
if (mysqli_connect_errno($connection)) {
	echo "<div>";
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	echo "</div>";
}

$stmt = $connection->prepare("SELECT * FROM Users WHERE email = ? AND password = ?");
$stmt->bind_param('ss', $email, $password);
$stmt->execute();

// get result from query
$result = $stmt->get_result();

$return = array('result' => false);

if($result->num_rows > 0){
	// get only rwo returned
	$row = $result->fetch_assoc();
	$return = array('result' => true);

	// set up session
	session_start();
	$_SESSION["account"] = $row['name'];
	$_SESSION["email"] = $email;
	$_SESSION["password"] = $password;
}

echo json_encode( $return );
?>
