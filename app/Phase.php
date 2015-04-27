<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model {


	// assign table to model
    protected $table = 'phase';

    // attributes to edit
    protected $fillable = [
        'sso',
        'author',
        'open',
        'transition',
        'close'
    ];

}
