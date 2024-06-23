<?php

include("inc/config.php");
include("class/class.php");


$dbConnection = new DatabaseConnection($host, $user, $pass, $db_name);

$conn = $dbConnection->connectDb();

if (isset($_POST["update_id"])) {
	$dataFetch = new DataFetcher($conn);
	$id = $_POST["update_id"];
	$row = $dataFetch->fetchData($id);

	echo json_encode($row);

	$dbConnection->closeConnection();
}

if (isset($_POST["del_id"])) {
	$delFetch = new DataFetcher($conn);
	$id_del = $_POST["del_id"];
	$row = $delFetch->fetchData($id_del);

	echo json_encode($row);

	$dbConnection->closeConnection();
}

?>