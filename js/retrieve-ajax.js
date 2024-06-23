$(document).on("click", ".edit-id", function(e){
	e.preventDefault();
	let id = $(this).attr("id");

	$.ajax({
		url: "retrieve.php",
		method: "POST",
		data:{
			update_id: id
		},
		dataType: "json",
		success: function(data){
			$("#update_id").val(data.id);
			$("#update_fname").val(data.first_name);
			$("#update_mname").val(data.middle_name);
			$("#update_lname").val(data.last_name);
			$("#update_gender").val(data.gender);
			$("#update_bday").val(data.birthdate);
		}
	});
});

$(document).on("click", ".del-id", function(e){
	e.preventDefault();
	let id = $(this).attr("id");

	$.ajax({
		url: "retrieve.php",
		method: "POST",
		data:{
			del_id: id
		},
		dataType: "json",
		success: function(data){
			$("#del_id").val(data.id);
			$("#fname").html(data.first_name);
			$("#lname").html(data.last_name);
			$("#first_name").html(data.first_name);
			$("#last_name").html(data.last_name);
			$("#gender").html(data.gender);
		}
	});
});


$(document).on("keyup", "#search", function(e){
	e.preventDefault();

	let getFilter = $(this).val();
	$.ajax({
		url: "class/class.php",
		method: "POST",
		data:{
			filterVal: getFilter
		},
		success: function(response){
			$("#showData").html(response);
		}

	});
});


$(document).ready(function(){
	$(".resetSearch").on("keyup", function(){
		let reset = $(this).val();
		reset == "" ? window.location.href = window.location.href : null
	});
});