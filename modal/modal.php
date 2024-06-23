<div class="modal fade" id="modalAdd" aria-hidden="true" tabindex="-1">

<div class="modal-dialog modal-lg">
<div class="modal-content">
	
<div class="modal-header">
<h3 class="text-uppercase text-primary fw-bolder modal-title">Entry</h3>	
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
	<form method="POST" class="row needs-validation" novalidate="" enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">

<div class="col-md-4 mb-3">
	<label class="fw-bolder">FIrst Name</label>
<div class="input-group">
<span class="input-group-text bg-info bg-gradient"><i class="fa fa-user text-light"></i></span>
		<input type="text" class="form-control" name="entry_fname" required="">
	<small class="text-danger invalid-feedback">Input Blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
	<label class="fw-bolder">Middle Name</label>
<div class="input-group">
<span class="input-group-text bg-info bg-gradient"><i class="fa fa-user text-light"></i></span>
		<input type="text" class="form-control" name="entry_mname" required="">
	<small class="text-danger invalid-feedback">Input Blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
	<label class="fw-bolder">Last Name</label>
<div class="input-group">
<span class="input-group-text bg-info bg-gradient"><i class="fa fa-user text-light"></i></span>
		<input type="text" class="form-control" name="entry_lname" required="">
	<small class="text-danger invalid-feedback">Input Blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
	<label class="fw-bolder">Gender</label>
<div class="input-group">
<span class="input-group-text bg-info bg-gradient"><i class="fa fa-transgender text-light"></i></span>
<select class="form-control" name="entry_gender" required="">
	<option value=""></option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
</select>
	<small class="text-danger invalid-feedback">Input Blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
	<label class="fw-bolder">Birthdate</label>
<div class="input-group">
<span class="input-group-text bg-info bg-gradient"><i class="fa fa-calendar text-light"></i></span>
		<input type="text" class="form-control dtpicker" name="entry_bday" required="">
	<small class="text-danger invalid-feedback">Input Blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
	<label class="fw-bolder">Upload File</label>
<div class="input-group">
<span class="input-group-text bg-info bg-gradient"><i class="fa fa-file text-light"></i></span>
		<input type="file" class="form-control" name="entry_file" accept="image/*">
</div>
</div>

<div class="col-md-12">
	<input type="submit" name="btnEntry" class="btn btn-outline-primary btn-sm" value="Insert">
</div>
		
	</form>
</div>

</div>
</div>
	
</div>
<!--  -->



<!-- modal update -->
<div class="modal fade" id="modalUpdate" aria-hidden="true" tabindex="-1">

<div class="modal-dialog modal-lg">
<div class="modal-content">
	
<div class="modal-header">
<h3 class="text-uppercase text-success fw-bolder modal-title">Update</h3>	
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
	<form method="POST" class="row needs-validation" novalidate="" enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">

<input type="hidden" name="update_id" id="update_id">
<div class="col-md-4 mb-3">
	<label class="fw-bolder">FIrst Name</label>
<div class="input-group">
<span class="input-group-text bg-info bg-gradient"><i class="fa fa-user text-light"></i></span>
		<input type="text" class="form-control" id="update_fname" name="update_fname" required="">
	<small class="text-danger invalid-feedback">Input Blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
	<label class="fw-bolder">Middle Name</label>
<div class="input-group">
<span class="input-group-text bg-info bg-gradient"><i class="fa fa-user text-light"></i></span>
		<input type="text" class="form-control" name="update_mname" id="update_mname" required="">
	<small class="text-danger invalid-feedback">Input Blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
	<label class="fw-bolder">Last Name</label>
<div class="input-group">
<span class="input-group-text bg-info bg-gradient"><i class="fa fa-user text-light"></i></span>
		<input type="text" class="form-control" name="update_lname" id="update_lname" required="">
	<small class="text-danger invalid-feedback">Input Blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
	<label class="fw-bolder">Gender</label>
<div class="input-group">
<span class="input-group-text bg-info bg-gradient"><i class="fa fa-transgender text-light"></i></span>
<select class="form-control" name="update_gender" id="update_gender" required="">
	<option value=""></option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
</select>
	<small class="text-danger invalid-feedback">Input Blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
	<label class="fw-bolder">Birthdate</label>
<div class="input-group">
<span class="input-group-text bg-info bg-gradient"><i class="fa fa-calendar text-light"></i></span>
		<input type="text" class="form-control dtpicker" name="update_bday" id="update_bday" required="">
	<small class="text-danger invalid-feedback">Input Blank Fields</small>
</div>
</div>

<div class="col-md-4 mb-3">
	<label class="fw-bolder">Upload File</label>
<div class="input-group">
<span class="input-group-text bg-info bg-gradient"><i class="fa fa-file text-light"></i></span>
		<input type="file" class="form-control" name="update_file" accept="image/*">
</div>
</div>

<div class="col-md-12">
	<input type="submit" name="btnUpdate" class="btn btn-outline-primary btn-sm" value="Update">
</div>
		
	</form>
</div>

</div>
</div>
	
</div>

<!--  -->

<!-- delete modal -->
<div class="modal fade" id="modalDelete" aria-hidden="true" tabindex="-1">

<div class="modal-dialog modal-lg">
<div class="modal-content">
	
<div class="modal-header">
<h3 class="text-uppercase text-danger fw-bolder modal-title">Delete</h3>	
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
				<h4>Do you want to delete the records of <em><span id="fname" class="text-danger fw-bolder"></span></em> <em><span id="lname" class="text-danger fw-bolder"></span></em> ?</h4>
		</div>

		<div class="col-md-4">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<tr>
						<td class="fw-bolder">First Name</td>
						<td id="first_name"></td>
					</tr>

					<tr>
						<td class="fw-bolder">Last Name</td>
						<td id="last_name"></td>
					</tr>

					<tr>
						<td class="fw-bolder">Gender</td>
						<td id="gender"></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 text-end">
			<form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])  ?>">
				<input type="hidden" name="del_id" id="del_id">
				<input type="submit" name="btnDelete" class="btn btn-outline-danger btn-sm" value="Delete">
			</form>
		</div>
	</div>

</div>

</div>
</div>
	
</div>