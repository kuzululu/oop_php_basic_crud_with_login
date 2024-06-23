<?php

if (isset($_POST["btnEntry"])) {
	$insertRecords = new InsertwithFileUpload($conn);

	$entry_fname = $conn->escape_string(trim($_POST["entry_fname"]));
	$entry_mname = $conn->escape_string(trim($_POST["entry_mname"]));
	$entry_lname = $conn->escape_string(trim($_POST["entry_lname"]));
	$entry_gender = $conn->escape_string(trim($_POST["entry_gender"]));
	$entry_bday = $conn->escape_string(trim($_POST["entry_bday"]));
	$entry_file = $_FILES["entry_file"];

	if (!empty($entry_file["name"])) {
		$newFileName = $insertRecords->uploadFile($entry_file);
	}else{
		$newFileName = NULL;
	}

	$result = $insertRecords->insert($entry_fname, $entry_mname, $entry_lname, $entry_gender, $entry_bday, $newFileName);

	showAlertSuccess();
}


?>