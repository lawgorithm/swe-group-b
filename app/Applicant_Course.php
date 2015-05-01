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

    public function updateApplicantFeedback($applicant)
    {
        $success = true;
        return $success;
        //var_dump($applicant); die();
        $success = DB::table('Applicant_offer')
            ->where('Applicant_offer.sso', '=', $applicant->sso)
            ->where('Applicant_offer.courseid', '=', $applicant->courseid)
            ->update(['feedback' => $applicant->feedback, 'recommendation' => $applicant->optionsRadios]);
    }

}
