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

    public $timestamps = false;

    public $incrementing = false;


}
