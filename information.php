<?php

require_once "inc/config.php";
require_once "inc/sessions.php";
include("class/class.php");
require_once "inc/shortLink.php";


$dbConnection = new DatabaseConnection($host, $user, $pass, $db_name);

$conn = $dbConnection->connectDb();

require_once "inc/showalert.php";
require_once "controller/insert.php";
require_once "controller/update.php";
require_once "controller/delete.php";

?>

<!DOCTYPE html>
<html lang="en">
<?php
// php codes
require_once "template-parts/head.php";
?>
<body>

<?php 
	require_once "modal/modal.php";
?>

<section id="main-page" class="mt-5">
<div class="container">
<div class="row mb-5">
<div class="col-md-5 d-md-flex">
<label class="fw-bolder mt-1">Filter:</label> <input type="search" id="search" class="me-1 ms-1 form-control resetSearch">
<a href="information" class="btn btn-outline-danger btn-sm" type="button">Reset</a>
</div>

<div class="col-md-7 text-end">
<a href="#" type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdd">Add New</a> <a href="logout" type="button" class="btn btn-outline-danger btn-sm">Logout</a>
</div>
</div> <!-- end of row -->

<div class="row">
<div class="col-md-12">
<div class="table-responsive" id="showData">
<table class="table table-hover">
<thead>
<tr class="text-center">
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

<?php

class RecordView{

private $records;

public function __construct($records){
	$this->records = $records;
}

public function displayRecords(){

$ctr = 1;
while ($row = $this->records->fetch_assoc()) {
$origdate = $row["birthdate"];
$dateTime = new DateTime($origdate);
$formatDate = $dateTime->format("M d, Y");
?>

<tr class="text-center">
 <td><?= $ctr; ?></td>
 <td><?= $row["first_name"]; ?></td>
 <td><?= $row["middle_name"]; ?></td>
 <td><?= $row["last_name"]; ?></td>
 <td><?= $row["gender"]; ?></td>
 <td><?= $formatDate; ?></td>
 <td><a href="upload/<?= $row['upload_file'] ?>" class="text-success fw-bolder text-decoration-none" target="_blank"><?= shortenLinkName($row["upload_file"]); ?></a></td>
 <td>
 	<a href="#" id="<?= $row['id']; ?>" type="button" class="btn btn-outline-success edit-id" data-bs-toggle="modal" data-bs-target="#modalUpdate"><i class="fa-solid fa-underline"></i></a> <a href="#" id="<?= $row['id']; ?>" type="button" class="btn btn-outline-danger del-id" data-bs-toggle="modal" data-bs-target="#modalDelete"><i class="fa-solid fa-eraser"></i></a>
 </td>
</tr>

<?php
 
 $ctr++;
  }

 }
}

$recordsMananger = new RecordsManager($conn);
$records = $recordsMananger->getRecords();

$recordView = new RecordView($records);
$recordView->displayRecords();
?>

</tbody>
</table>
</div>
</div>
</div>

</div>	
</section>


<?php 
require_once "template-parts/bottom.php";
?>
</body>
</html>