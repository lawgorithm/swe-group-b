$(function() {

	$('#gradSelect').click(function(e) {
		if($("#gradOption").is(':selected')) {
			$("#studentMajor").hide();
			$("#studentYear").hide();
			$("#studentGPA").hide();
			$("#studentField").hide();
			$("#gpaLabel").hide();
			$("#programLabel").hide();
		}
		else
		{
			$("#studentMajor").show();
			$("#studentYear").show();
			$("#studentGPA").show();
			$("#studentField").show();
			$("#gpaLabel").show();
			$("#programLabel").show();
		}
	});

	$("#next1").click(function(e) {
		e.preventDefault();
		$("#fs3").show();
		$("#fs1").hide();
	});
	$("#prev2").click(function(e) {
		e.preventDefault();
		$("#fs1").show();
		$("#fs3").hide();
	});
});