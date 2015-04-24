<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {


    // assign table to model
    protected $table = 'role';

    // attributes to edit
    protected $fillable = [
        'sso',
        'user_role'
    ];

    public $timestamps = false;

    public $incrementing = false;

}
