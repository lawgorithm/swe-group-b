$(function() {
	var moreTaught = 0, moreCurrent = 0, moreWant = 0;
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

	$("#moreTaught").click(function(e) {
			var foo = $("#prevTaught").clone();
			var tmp = foo.attr("id");
			tmp = tmp + moreTaught;

			foo.attr("id", tmp);
			foo.attr("name", tmp);
			if (moreTaught < 4) {
				foo.appendTo("#previouslyTaught");
				moreTaught = moreTaught + 1;
			}
	});

	$("#moreCurrent").click(function(e) {
		var foo = $("#currTaught").clone()
		var tmp = foo.attr("id");
		tmp = tmp + moreCurrent;

		foo.attr("id", tmp);
		foo.attr("name", tmp);
		if (moreCurrent < 4) {
			foo.appendTo("#currentlyTeaching");
			moreCurrent = moreCurrent + 1;
		}
	});

	$("#moreWant").click(function(e) {
		var foo = $("#likeTeach").clone()
		var tmp = foo.attr("id");
		tmp = tmp + moreWant;

		foo.attr("id", tmp);
		foo.attr("name", tmp);
		if (moreWant < 4) {
			foo.appendTo("#likeToTeach");
			moreWant = moreWant + 1;
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