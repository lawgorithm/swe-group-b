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
        'previouswork',
        'speakscore',
        'speakdate'
    ];

    public function getApplicantsByCourseId($courseId)
    {
        $applicants = new Applicant();
        $db = new DB();

        $applicants = $db::table('applicant')
                            ->join('applicantcourse', 'applicant.sso', '=', 'applicantcourse.sso')
                            ->where('applicantcourse.courseid', '=', $courseId)
                            ->where('applicantcourse.action', '=', '001')
                            ->get();

        return $applicants;
    }

    public function getRecommendedByCourseId($courseId){
        $recommended = new Applicant();
        $db = new DB();

        $recommended = $db::table('applicant')
            ->join('applicantcourse', 'applicant.sso', '=', 'applicantcourse.sso')
            ->where('applicantcourse.courseid', '=', $courseId)
            ->where('applicantcourse.recommendation', '=', 1)
            ->select('applicant.name')
            ->get();

        return $recommended;
    }

    public function getTopTenApplicantsByCourseId(){
        $topTen = new Applicant();
        $db = new DB();

        $topTen = $db::table('applicant')
            ->join('applicantcourse', 'applicant.sso', '=', 'applicantcourse.sso')
            ->join('course', 'applicantcourse.courseid', '=', 'course.courseid')
            ->where('applicantcourse.rank', '>=', 1)
            ->where('applicantcourse.rank', '<', 10)
            ->groupby('applicantcourse.rank', 'applicant.name', 'applicantcourse.courseid', 'course.coursename', 'applicant.email')
            ->orderby('applicantcourse.courseid')
            ->select('applicantcourse.rank', 'applicant.name', 'applicantcourse.courseid', 'course.coursename', 'applicant.email')
            ->get();

        return $topTen;
    }
}
