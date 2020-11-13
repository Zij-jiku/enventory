<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paysalary extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}
