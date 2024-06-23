<?php

ob_start();
session_start();

if (!isset($_SESSION)){
	unset($_SESSION["user_id"]);
	header("location: logout");
}

// check if the session username is set if not automatic logout
if (isset($_SESSION["username"])) {
	echo "<h3 class='text-danger fw-bolder'> Welcome " . $_SESSION["username"] . "</h3>";
}else{
	header("location: logout");
}

?>