<?php

/*
    Helper functions for input validation and formatting
*/


function formatPhone( &$phone ) {
    //(xxx) xxx-xxxx -> xxxxxxxxx  #(10 numbers)

    $phone = preg_replace("/[^0-9]/", "", $phone);
}

function formatGPA( &$gpa ) {
    //i'm so sorry

    $gpa = str_pad( $gpa, 4, "0", STR_PAD_RIGHT);
}

function formatProgram( $mode, $major, $field, $year, &$gpa) {
    if ($mode == 'Und') {
        $program = $mode . " " . $major . " "
            . $field . " " . $year;
    } else {
        $program = $mode;
        $gpa = NULL;
    }

    return $program;
}

function checkProgram( $mode, $major, $field, $year ) {
    $retval = "";
    $badflag = false;

    $validMode = ['Und', 'Gra'];
    $validMajor = ['CS', 'IT'];
    $validField = ['BS', 'BA'];
    $validYear = ['freshman', 'sophomore', 'junior', 'senior'];

    if ( strcmp($mode, 'Und') == 0 ) {

        if (!in_array($mode, $validMode)) {
            $retval = $retval . "Program option not valid " . htmlspecialchars($mode). ".";
            $badflag = true;
        }

        if (!in_array($major, $validMajor)) {
            $retval = $retval . "Program option not valid " . htmlspecialchars($major). ".";
            $badflag = true;
        }
        
        if (!in_array($field, $validField)) {
            $retval = $retval . "Program option not valid " . htmlspecialchars($field). ".";
            $badflag = true;
        }

        if (!in_array($year, $validYear)) {
            $retval = $retval . "Program option not valid " . htmlspecialchars($year). ".";
            $badflag = true;
        }

    }

    if ( $badflag ) {
        return $retval;
    }

    return $retval;
}

function checkPhone ( $phone ) {
    if ( strlen($phone) != 10 ) 
        return "Enter a valid phone number, with 10 digits \n";

    return '';
}



function checkGPA( $gpa ) {
    if ( $gpa == '') return '';

    $validator = preg_match("/^[0]|[0-3]\.(\d?\d?)|[4].[00]$/", $gpa);

    if ( strcmp($gpa, "4.00") == 0 ) {
        $validator = true;
    }

    if ($validator) {
        return '';
    } else {
        return "Enter a valid GPA: 3, 3.14, 0.1 \n";
    }

}

function checkGradDate( $date ) {
    $valid = ['', 'F15', 'S16', 'F16', 'S17', 'F17', 'S18', 'F18'];
    $retval = '';

    if (!in_array($date, $valid)) {
        $retval = $retval . "Grad Date option not valid " . htmlspecialchars($date). ".";
    }

    return $retval;
}

function checkSpeakScore( $score ) {

    $check = intval( $score );
    $validator = false;

    if ($check <= 60 && $check >= 0) {
        $validator = true;
    }

    if ( $validator ) {
        return '';
    } else {
        return "Enter a valid SPEAK score: 0 - 60";
    }
}

function checkSpeakDate( $date , $score) {
    if ( $score != "" ) {
        $valid = ['F12', 'S13', 'F13', 'S14', 'F14', 'F15'];
        $retval = "";

        if (!in_array($date, $valid)) {
            $retval = $retval . "Speak Date option not valid " . htmlspecialchars($date). ".";
        }

        return $retval;
    } else {
        return "";
    }
}

function checkPrevTaught( &$prevTaught ) {
    $valid = ['','CS1050', 'CS2050', 'CS2270', 'CS3050', 'CS3280', 'CS3330',
              'CS3380', 'CS4050', 'CS4270', 'CS4320', 'CS4450', 'CS4520'];
    $retval = '';

    $prevTaught = array_unique($prevTaught);

    if (count(array_intersect($prevTaught, $valid)) != count($prevTaught)) {
        $retval = $retval . "Previously Taught option not valid \n";
    }

    return $retval;
}

function checkCurrTaught( &$currTaught ) {
    $valid = ['','CS1050', 'CS2050', 'CS2270', 'CS3050', 'CS3280', 'CS3330',
              'CS3380', 'CS4050', 'CS4270', 'CS4320', 'CS4450', 'CS4520'];
    $retval = '';
    $currTaught = array_unique($currTaught);

    if (count(array_intersect($currTaught, $valid)) != count($currTaught)) {
        $retval = $retval . "Currently Teaching option not valid \n";
    }

    return $retval;
}

function checkLikeTeach( &$likeTeach ) {
    $valid = ['CS1050', 'CS2050', 'CS2270', 'CS3050', 'CS3280', 'CS3330',
              'CS3380', 'CS4050', 'CS4270', 'CS4320', 'CS4450', 'CS4520'];
    $retval = '';
    $likeTeach = array_unique($likeTeach);

    if (count(array_intersect($likeTeach, $valid)) != count($likeTeach)) {
        $retval = $retval . "Like to Teach option not valid and is required.";
    }

    return $retval;
}

function validInput( &$checkArray ) {
    $badMessage = "";

    formatPhone( $checkArray['phone'] );
    formatGPA( $checkArray['gpa'] );

    $badMessage = $badMessage . checkPhone($checkArray['phone']);

    $badMessage = $badMessage . checkGPA($checkArray['gpa']);

    $badMessage = $badMessage . checkProgram($checkArray['mode'],
                                             $checkArray['major'],
                                             $checkArray['field'],
                                             $checkArray['year']);

    $checkArray['program'] = formatProgram($checkArray['mode'],
                                             $checkArray['major'],
                                             $checkArray['field'],
                                             $checkArray['year'],
                                             $checkArray['gpa']);

    $badMessage = $badMessage . checkGradDate($checkArray['graddate']);

    $badMessage = $badMessage . checkSpeakScore($checkArray['speakscore']);

    $badMessage = $badMessage . checkSpeakDate($checkArray['speakdate'], $checkArray['speakscore']);

    $badMessage = $badMessage . checkPrevTaught($checkArray['prevtaught']);

    $badMessage = $badMessage . checkCurrTaught($checkArray['currtaught']);

    $badMessage = $badMessage . checkLikeTeach($checkArray['liketeach']);

    return $badMessage;
}