<?php

class DatabaseConnection{

private $host;
private $user;
private $pass;
private $db_name;
private $conn;


// setter
public function __construct($host, $user, $pass, $db_name){
	$this->host = $host;
	$this->user = $user;
	$this->pass = $pass;
	$this->db_name = $db_name;
}

// getter
public function connectDb(){
	$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

	if ($this->conn->connect_error) {
		die("Connection failed: " . $this->conn->connect_error);
	}
	return $this->conn;
  }

public function closeConnection(){
	if ($this->conn) {
			return $this->conn->close();
	}
}
}


// login user
class UserLogin{

private $conn;

public function __construct($conn){
	$this->conn = $conn;
}

public function login($conn, $postUser, $postPass){
	$username = $this->conn->escape_string(trim($postUser));
	$password = $this->conn->escape_string(trim($postPass));

	$sql = "SELECT * FROM tbl_users WHERE username = '$username'";
	$user = $this->conn->query($sql);
	$total_user = $user->num_rows;

	if ($total_user > 0) {
		while ($row = $user->fetch_assoc()) {
			$user_id = $row["user_id"];
			$db_user = $row["username"];
			$db_pass = $row["password"];
			$db_email = $row["email"];

			if (password_verify($password, $db_pass) && strcmp($username, $db_user) === 0) {
				$_SESSION["user_id"] = $user_id;
				$_SESSION["username"] = $db_user;
				$_SESSION["password"] = $db_pass;
				$_SESSION["email"] = $db_email;
				header("location: information");
				
			}else{
				return "Wrong password or considerate the case sensitivity of the username";
			}

		}
	}else{
		return "No Username";
	 }
	return null;
 }
}

class UserRegistration{

	private $conn;

	public function __construct($conn){
		$this->conn = $conn;
	}

	public function register($username, $password, $email){
			$username = $this->conn->escape_string(trim($username));
			$password = $this->conn->escape_string(trim($password));
			$email = $this->conn->escape_string(trim($email));

			$check_user = "SELECT * FROM tbl_users WHERE username='$username'";
			$check_email = "SELECT * FROM tbl_users WHERE email ='$email'";

			$check_user_row = $this->conn->query($check_user);
			$check_email_row = $this->conn->query($check_email);

			$total_user_row = $check_user_row->num_rows;
			$total_email_row = $check_email_row->num_rows;

			if ($total_user_row > 0 || $total_email_row > 0) {
					showAlertRegistrationError();
			}else{
				$hash = password_hash($password, PASSWORD_BCRYPT);
				$sql = "INSERT INTO tbl_users(username, password, email) VALUES(?,?,?)";
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("sss", $username, $hash, $email);
				$stmt->execute();
				$stmt->close();
				showAlertRegistrationSuccess();
			}

	}

}


class InsertwithFileUpload{

	private $conn;

	public function __construct($conn){
		$this->conn = $conn;
	}

	public function uploadFile($file){
		$originalName = $file["name"];
		$ext = pathinfo($originalName, PATHINFO_EXTENSION);
		$newFileName = uniqid() . "_" . $originalName;
		$destination = "upload/" . $newFileName;

		while (file_exists($destination)) {
				$newFileName = uniqid() . "_" . $originalName;
				$destination = "upload/" . $newFileName;
		}

		move_uploaded_file($file["tmp_name"], $destination);

		return $newFileName;
	}

	public function insert($first_name, $middle_name, $last_name, $gender, $birthdate, $newFileName){
		$sql = "INSERT INTO tbl_information(first_name, middle_name, last_name, gender, birthdate, upload_file) VALUES(?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("ssssss", $first_name, $middle_name, $last_name, $gender, $birthdate, $newFileName);
		$stmt->execute();
		$stmt->close();
	}

}

class RecordsManager{

	private $conn;

	public function __construct($conn){
		$this->conn = $conn;
	}

	public function getRecords(){
		$sql = "SELECT * FROM tbl_information ORDER BY id";
		$records = $this->conn->query($sql);
		return $records;
	}

}


class DataFetcher{

	private $conn;

	public function __construct($conn){
		$this->conn = $conn;
	}

	public function fetchData($id){
		$query = "SELECT * FROM tbl_information WHERE id = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
		return $row;
	}

}


class UpdatewithFileUpload{

private $conn;

public function __construct($conn){
	$this->conn = $conn;
}


public function uploadFileUpdate($file){

	$originalName = $file["name"];
		$ext = pathinfo($originalName, PATHINFO_EXTENSION);
		$newFileName = uniqid() . "_" . $originalName;
		$destination = "upload/" . $newFileName;

		while (file_exists($destination)) {
				$newFileName = uniqid() . "_" . $originalName;
				$destination = "upload/" . $newFileName;
		}

		move_uploaded_file($file["tmp_name"], $destination);

		return $newFileName;
}

public function updatewithFileUpload($id, $first_name, $middle_name, $last_name, $gender, $birthdate, $newFileName){

	$sql = "UPDATE tbl_information SET first_name=? ,middle_name=?, last_name=?, gender=?, birthdate=?, upload_file=? WHERE id=?";
	$stmt = $this->conn->prepare($sql);
	$stmt->bind_param("ssssssi", $first_name, $middle_name, $last_name, $gender, $birthdate, $newFileName, $id);
	$stmt->execute();
	$stmt->close();
}

public function updatewithoutFileUpload($id, $first_name, $middle_name, $last_name, $gender, $birthdate){

$sql = "UPDATE tbl_information SET first_name=? ,middle_name=?, last_name=?, gender=?, birthdate=? WHERE id=?";
	$stmt = $this->conn->prepare($sql);
	$stmt->bind_param("sssssi", $first_name, $middle_name, $last_name, $gender, $birthdate, $id);
	$stmt->execute();
	$stmt->close();

 }
}


class DeleteRecords{

	private $conn;

public function __construct($conn){
	$this->conn = $conn;
}


public function delete($id){

	$sql = "DELETE FROM tbl_information WHERE id = ?";
	$stmt = $this->conn->prepare($sql);
	$stmt->bind_param("i", $id);
	$result = $stmt->execute();
	return $result;
}

}

class Filterdata{

private $conn;

public function __construct($conn){
	$this->conn = $conn;
}

public function performFilter($name){

	$sql = "SELECT * FROM tbl_information WHERE first_name LIKE '%$name%' || last_name LIKE '%$name%'";
	$get = $this->conn->query($sql);
	$total = $get->num_rows;
	$data = "";

	$data .="
<table class='table table-hover'>
<thead>
<tr class='text-center'>
<th>No.</th>
<th>First Name</th>
<th>Middle Name</th>
<th>Last Name</th>
<th>Gender</th>
<th>Birthdate</th>
<th>Upload File</th>
<th>Options</th>
</tr>
</thead>
<tbody>
	";

	if ($total > 0) {
		$ctr = 1;
while ($row = $get->fetch_assoc()) {
$origdate = $row["birthdate"];
$dateTime = new DateTime($origdate);
$formatDate = $dateTime->format("M d, Y");

$data .="

<tr class='text-center'>
 <td>".$ctr."</td>
 <td>".$row['first_name']."</td>
 <td>".$row['middle_name']."</td>
 <td>".$row['last_name']."</td>
 <td>".$row['gender']."</td>
 <td>".$formatDate."</td>
 <td><a href='upload/".$row['upload_file']."' class='text-success fw-bolder text-decoration-none' target='_blank'>".shortenLinkName($row['upload_file'])."</a></td>
 <td>
 	<a href='#' id='".$row['id']."' type='button' class='btn btn-outline-success edit-id' data-bs-toggle='modal' data-bs-target='#modalUpdate'><i class='fa-solid fa-underline'></i></a> <a href='#' id='".$row['id']."' type='button' class='btn btn-outline-danger del-id' data-bs-toggle='modal' data-bs-target='#modalDelete'><i class='fa-solid fa-eraser'></i></a>
 </td>
</tr>


";

			$ctr++;
		}
	$data .="</tbody>";
	}else{
		$data .="

		<tbody>
		<tr>
			<td colspan=8><h4 class='text-danger'>No Record</h4></td>
		</tr>
		</tbody>

		";
	}
	$data .="</table>";
	echo $data;
 }
}

if (isset($_POST["filterVal"])) {
	$filter = $_POST["filterVal"];
	include("../inc/config.php");
	require "../inc/shortLink.php";


$dbConnection = new DatabaseConnection($host, $user, $pass, $db_name);

$conn = $dbConnection->connectDb();

$filterSearch = new Filterdata($conn);
$filterSearch->performFilter($filter);

$dbConnection->closeConnection();
}

?>