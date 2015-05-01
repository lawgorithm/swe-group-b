<?php namespace App;

use Illuminate\Database\Eloquent\Model;

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
        $appCourse = Applicant_Course::where('sso', '=', $applicant[0])->where('courseid', '=', $applicant[1])->firstOrFail();
        $appCourse->feedback = $applicant[2];
        $appCourse->recommendation = $applicant[3];
        $appCourse->save();
    }

}
