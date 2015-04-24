<?php namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public $timestamps = false;

    public $incrementing = false;

}
