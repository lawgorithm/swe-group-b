$(function() {
	var moreTaught = 0, moreCurrent = 0, moreWant = 0, moreJobs = 0;
	$('#gradSelect').click(function(e) {
		if($("#gradOption").is(':selected')) {
			$("#studentMajor").val("").hide();
			$("#studentYear").val("").hide();
			$("#studentField").val("").hide();
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

	$('#option').click(function(e) {
		if($("#gradOption").is(':selected')) {
			$("#studentMajor").val("").hide();
			$("#studentYear").val("").hide();
			$("#studentField").val("").hide();
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

		if (moreTaught < 11) {
			obj.insertBefore("#moreTaught");
			moreTaught = moreTaught + 1;
		}
	});
    $("#lessTaught").click(function(e) {
        if (moreTaught > 0) {
            $("[id=prevTaught]").get(moreTaught).remove();
            moreTaught = moreTaught - 1;
        }
        else if (moreTaught == 0) {
            $("[id=prevTaught]").get(moreTaught).value = "";
        }
    });

	$("#moreCurrent").click(function(e) {
		var obj = $("#currTaught").clone()

		if (moreCurrent < 4) {
			obj.insertBefore("#moreCurrent");
			moreCurrent = moreCurrent + 1;
		}
	});
    $("#lessCurrent").click(function(e) {
        if (moreCurrent > 0) {
            $("[id=currTaught]").get(moreCurrent).remove();
            moreCurrent = moreCurrent - 1;
        }
        else if (moreCurrent == 0) {
            $("[id=currTaught]").get(moreCurrent).value = "";
        }
    });

	$("#moreWant").click(function(e) {
		var obj = $("#likeTeach").clone();

		if (moreWant < 4) {
			obj.insertBefore("#moreWant");
			moreWant = moreWant + 1;
		}
	});
    $("#lessWant").click(function(e) {
        if (moreWant > 0) {
            $("[id=likeTeach]").get(moreWant).remove();
            moreWant = moreWant - 1;
        }
        else if (moreWant == 0) {
            $("[id=likeTeach]").get(moreWant).value = "";
        }
    });

	$("#moreJobs").click(function(e) {
		var obj = $("#work").clone();
		obj.val("");

		if (moreJobs < 4) {
			obj.insertBefore("#moreJobs");
			moreJobs = moreJobs + 1;
		}
	});
    $("#lessJobs").click(function(e) {
        if (moreJobs > 0) {
            $("[id=work]").get(moreJobs).remove();
            moreJobs = moreJobs - 1;
        }
        else if (moreJobs == 0) {
            $("[id=work]").get(moreJobs).value = "";
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
			'pattern': '{{9}}.{{99}}'
		});
	}

});