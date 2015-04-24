$(function() {
	var moreTaught = 0, moreCurrent = 0, moreWant = 0;
	$('#gradSelect').click(function(e) {
		if($("#gradOption").is(':selected')) {
			$("#studentMajor").val("").hide();
			$("#studentYear").val("").hide();
			$("#studentGPA").val("").hide();
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
		var obj = $("#prevTaught").clone();

		if (moreTaught < 15) {
			obj.insertBefore("#moreTaught");
			moreTaught = moreTaught + 1;
		}
	});

	$("#moreCurrent").click(function(e) {
		var obj = $("#currTaught").clone()

		if (moreCurrent < 4) {
			obj.insertBefore("#moreCurrent");
			moreCurrent = moreCurrent + 1;
		}
	});

	$("#moreWant").click(function(e) {
		var obj = $("#likeTeach").clone();

		if (moreWant < 4) {
			obj.insertBefore("#moreWant");
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

	var phoneInput = document.getElementById('studentPhone');
	if (phoneInput) {
		new Formatter(phoneInput, {
			'pattern': '({{999}}) {{999}}-{{9999}}'
		});
	}

	var gpaInput = document.getElementById('studentGPA');
	if (gpaInput) {
		new Formatter(gpaInput, {
			'pattern': '{{9}}.{{999}}'
		});
	}

});
