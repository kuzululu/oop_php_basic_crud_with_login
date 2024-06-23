<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once "inc/config.php";
include("class/class.php");
require_once "inc/showalert.php";
require_once "controller/login.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php
// php codes
	require_once "template-parts/head.php";
?>

<body id="login-page">

<div class="container mt-5 ">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 p-5" id="login-form">
			<h3 class="text-light text-center fw-bolder text-uppercase animate__animated animate__fadeInDown animate__slow animate__infinite infinite">Login Page</h3>
			<form class="row needs-validation" method="POST" novalidate="" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				
			<div class="col-md-12 mb-3">
				<label class="fw-bolder text-white">Username</label>
				<div class="input-group">
					<span class="input-group-text bg-info bg-gradient"><i class="fa-solid fa-user text-light"></i></span>
					<input type="text" class="form-control" name="userLog" required="">
				<small class="text-danger invalid-feedback">Please provide Username</small>
				</div>
			</div>

			<div class="col-md-12 mb-3">
				<label class="fw-bolder text-white">Password</label>
				<div class="input-group">
							<span class="input-group-text bg-info bg-gradient"><i class="fa-solid fa-lock text-light"></i></span>
						<input type="password" class="form-control togglePassword" name="passLog" required="">
						<small class="text-danger invalid-feedback">Please provide Password</small>
						<span class="bg-primary bg-gradient input-group-text toggleIcon">
							<i class="text-light fa fa-eye-slash d-none hide_eyes"></i>
							<i class="text-light fa fa-eye show_eyes"></i>
						</span>
				</div>
			</div>

			<div class="col-md-12 mb-3">
				<input type="submit" value="Login" class="btn btn-success btn-sm" name="btnLogin">
				<a href="register" type="button" class="btn btn-primary btn-sm">Register</a>
			</div>

			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

<?php 
	require_once "template-parts/bottom.php";
?>
</body>
</html>