<?php

if (isset($_POST["btnDelete"])) {
	if (!empty($_POST["del_id"])) {
		$id = intval($_POST["del_id"]);

		$dataDelete = new DeleteRecords($conn);
		$result = $dataDelete->delete($id);

		if ($result) {
			showalertDelete();
		}
	}
}

?>