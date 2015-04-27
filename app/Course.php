<?php namespace App;

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
}
