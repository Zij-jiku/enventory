<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    function employee(){
        return $this->belongsTo('App\Employee');
    }

}
