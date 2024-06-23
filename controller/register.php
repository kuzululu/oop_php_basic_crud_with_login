<?php

$dbConnection = new DatabaseConnection($host, $user, $pass, $db_name);

$conn = $dbConnection->connectDb();


if (isset($_POST["btnRegister"])) {
	$insert = new UserRegistration($conn);

	$register = $insert->register($_POST["username"], $_POST["password"], $_POST["email"]);
}

$dbConnection->closeConnection();

?>