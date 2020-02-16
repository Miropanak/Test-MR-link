<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyField extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code', 'name'
    ];

}
