<?php

if (isset($_POST["btnUpdate"])) {
	$dataUpdate = new UpdatewithFileUpload($conn);


	if (!empty($_POST["update_id"])) {
		$id = $conn->escape_string(trim($_POST["update_id"]));
		$update_fname = $conn->escape_string(trim($_POST["update_fname"]));
		$update_mname = $conn->escape_string(trim($_POST["update_mname"]));
		$update_lname = $conn->escape_string(trim($_POST["update_lname"]));
		$update_gender = $conn->escape_string(trim($_POST["update_gender"]));
		$update_bday = $conn->escape_string(trim($_POST["update_bday"]));
		$update_file = $_FILES["update_file"];

		if (!empty($update_file["name"])) {
			$newFileName = $dataUpdate->uploadFileUpdate($update_file);
			$dataUpdate->updatewithFileUpload($id, $update_fname, $update_mname, $update_lname, $update_gender, $update_bday, $newFileName);
				showAlertUpdate();
		}else{
			$dataUpdate->updatewithoutFileUpload($id, $update_fname, $update_mname, $update_lname, $update_gender, $update_bday);
				showAlertUpdate();
		}
	}
}

?>