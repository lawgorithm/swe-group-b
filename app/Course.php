<?php namespace App;

use App\Applicant_offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model {

    // assign table to model
    protected $table = 'course';

    // attributes to edit
    protected $fillable = [
        'courseid',
        'coursename',
        'instructor'
    ];

    public $incrementing = false;

    public function getAllCourses(){
        $courses = new Applicant();
        $db = new DB();

       $user = \Auth::user();

        $courses = $db::table('course')
            ->where('instructor', '=', $user['sso'])
            ->select('courseid', 'coursename')
            ->get();

        return $courses;
    }

    /**
     * Determine if given course has ranking already submitted
     *
     * @param $courseid
     * @return bool
     */
    public static function checkIfCourseComplete($courseid) {
        if (Applicant_offer::where('courseid', '=', $courseid)->first() == NULL)
            return false;
        return true;
    }

    public static function getInstructor ($courseid) {

        $inst= Course::where('courseid', '=', $courseid)->first()->instructor;
        return User::where('sso', '=', $inst)->first()->name;
    }
}
