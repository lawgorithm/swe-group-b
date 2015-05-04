<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Applicant_offer extends Model {

    // assign table to model
    protected $table = 'applicantoffer';

    // attributes to edit
    protected $fillable = [
        'sso',
        'courseid',
        'rank',
        'offersent',
        'offeraccepted',
    ];

    public $incrementing = false;

    public function updateOfferSentBySso($applicant){
        \App\Applicant_offer::where('sso', '=', $applicant['sso'])
            ->where('courseid', '=', $applicant['course'])
            ->update(['offersent' => true]);
    }

    public function getTopTenApplicantsForEachCourse(){
        $topTen = new Applicant();
        $db = new DB();

        $topTen = $db::table('applicant')
            ->join('applicantoffer', 'applicant.sso', '=', 'applicantoffer.sso')
            ->join('course', 'applicantoffer.courseid', '=', 'course.courseid')
            ->where('applicantoffer.rank', '>=', 1)
            ->where('applicantoffer.rank', '<', 10)
            ->groupby('applicant.sso','applicantoffer.rank', 'applicant.name', 'applicantoffer.courseid', 'course.coursename', 'applicant.email')
            ->orderby('applicantoffer.courseid')
            ->orderby('applicantoffer.rank', 'ASC')
            ->select('applicantoffer.rank', 'applicant.name', 'applicantoffer.courseid', 'course.coursename', 'applicant.email','applicant.sso')
            ->get();

        return $topTen;
    }


    public function getOfferedCourseBySSO($sso){
        $offer = new Applicant_offer();
        $db = new DB();

        $offer = $db::table('applicantoffer')
            ->where('applicantoffer.sso', '=', $sso)
            ->where('applicantoffer.offersent', '=', true)
            ->select('applicantoffer.courseid', 'applicantoffer.rank', 'applicantoffer.offeraccepted')
            ->get();

        return $offer;
    }

    public function updateOfferAccepted($applicant){
        \App\Applicant_offer::where('sso', '=', $applicant['sso'])
            ->where('courseid', '=', $applicant['course'])
            ->update(['offeraccepted' => true]);
    }

    public function getAcceptedBySSO($sso, $courseid){
        $accepted = new Applicant_offer();
        $db = new DB();

        $accepted = $db::table('applicantoffer')
            ->where('applicantoffer.sso', '=', $sso)
            ->where('applicantoffer.courseid', '=', $courseid)
            ->select('applicantoffer.offeraccepted', 'applicantoffer.courseid')
            ->get();

        return $accepted;
    }
}
