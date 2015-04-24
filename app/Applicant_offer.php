<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant_offer extends Model {

    // assign table to model
    protected $table = 'applicantoffer';

    // attributes to edit
    protected $fillable = [
        'sso',
        'courseid',
        'rank',
        'acceptstatus',
        'sectionid',
    ];

    public $incrementing = false;

}
