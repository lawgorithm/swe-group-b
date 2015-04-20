<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

    // assign table to model
    protected $table = 'section';

    // attributes to edit
    protected $fillable = [
        'sectionname',
        'ta',
        'courseid',
        'datetime'
    ];

}
