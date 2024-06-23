$(document).ready(function(){
	$(".dtpicker").datepicker({
		dateFormat: "mm/dd/yy",
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:c"
	});
});