<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTest extends Model
{
    use SoftDeletes;

    protected $fillable = ['users_id', 'tests_id'];

    function Users() {
        return $this->belongsTo('App\Users');
    }
}
