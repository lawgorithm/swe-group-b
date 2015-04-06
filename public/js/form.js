$(function() {

	$("#next1").click(function(e) {
		e.preventDefault();
		$("#fs2").show();
		$("#fs1").hide();
	});
	$("#next2").click(function(e) {
		e.preventDefault();
		$("#fs3").show();
		$("#fs2").hide();
	});
	$("#prev1").click(function(e) {
		e.preventDefault();
		$("#fs1").show();
		$("#fs2").hide();
	});
	$("#prev2").click(function(e) {
		e.preventDefault();
		$("#fs2").show();
		$("#fs3").hide();
	});
});