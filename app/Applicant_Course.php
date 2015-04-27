<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant_Course extends Model {

    // assign table to model
    protected $table = 'applicantcourse';

    // attributes to edit
    protected $fillable = [
        'sso',
        'courseid',
        'action'
    ];
    
    public $incrementing = false;

    public function updateApplicantFeedback($applicants)
    {
        $success = true;
        return $success;
//        $success = DB::table('Applicant_offer')->update(
//            ['rank' => $applicants->rank, 'feedback' => $applicants->feedback]
//        );
    }

}
