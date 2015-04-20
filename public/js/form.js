$(function() {

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