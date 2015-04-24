<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    // assign table to model
    protected $table = 'course';

    // attributes to edit
    protected $fillable = [
        'courseid',
        'coursename',
        'instructor'
    ];

    public $timestamps = false;

    public $incrementing = false;

}
