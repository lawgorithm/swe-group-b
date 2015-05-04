<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Applicant_Course extends Model {

    // assign table to model
    protected $table = 'applicantcourse';

    // attributes to edit
    protected $fillable = [
        'sso',
        'courseid',
        'action',
        'rank',
        'feedback',
        'recommendation'
    ];
    
    public $incrementing = false;

    public function updateApplicantFeedback($applicant)
    {
        $appCourse = \App\Applicant_Course::where('sso', '=', $applicant[0])
            ->where('courseid', '=', $applicant[1])
            ->update(['feedback' => $applicant[2], 'recommendation' => $applicant[3]]);
    }

    public static function checkIfCourseHasApps($courseid) {
        if (Applicant_Course::where('courseid', '=', $courseid)->where('action', '=', '001')->first() == null)
            return false;
        return true;
    }

    public static function getPrevTaught($id) {
        return Applicant_Course::where('sso', '=', $id)->where('action', '=', '100')->get()->toArray();
    }
    public static function getCurrTaught($id) {
        return Applicant_Course::where('sso', '=', $id)->where('action', '=', '010')->get()->toArray();
    }
}
