<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Applicant extends Model {

	// assign table to model
    protected $table = 'applicant';

    // attributes to edit
    protected $fillable = [
        'name',
        'sso',
        'phone',
        'email',
        'gpa',
        'graddate',
        'program',
        'speakscore'
    ];

    public function getApplicantsByCourseId($courseId)
    {
        $applicants = new Applicant();
        $db = new DB();

        $applicants = $db::table('applicant')
                            ->join('applicantcourse', 'applicant.sso', '=', 'applicantcourse.sso')
                            ->where('applicantcourse.courseid', '=', $courseId)
                            ->select('applicant.firstname', 'applicant.lastname')
                            ->get();

        return $applicants;
    }
}
