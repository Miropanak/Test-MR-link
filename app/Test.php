<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'questions', 'startDate'
    ];

    public function findTestByName(String $searchTerm)
    {
        return $this->where('name', 'LIKE', '%'.$searchTerm.'%');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event', 'event_tests', 'tests_id', 'events_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_tests', 'tests_id', 'users_id');
    }

    public function units()
    {
        return $this->belongsTo('App\Unit');
    }
}
