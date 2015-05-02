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
}
