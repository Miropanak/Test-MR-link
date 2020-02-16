<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTest extends Model
{
    use SoftDeletes;

    protected $fillable = ['student_id', 'test_id'];

    function Users() {
        return $this->belongsTo('App\Users');
    }
}
