<?php

$dbConnection = new DatabaseConnection($host, $user, $pass, $db_name);

$conn = $dbConnection->connectDb();

if (isset($_POST["btnLogin"])) {
	$user = new UserLogin($conn);

	$result = $user->login($conn, $_POST["userLog"], $_POST["passLog"]);

	// echo $result;
	if ($result) {
		showAlertLoginError($result);
	}
}

$dbConnection->closeConnection();

?>