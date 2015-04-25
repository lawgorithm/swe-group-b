<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model {

    // assign table to model
    protected $table = 'instructor';

    // attributes to edit
    protected $fillable = [
        'sso',
        'name',
    ];

}
