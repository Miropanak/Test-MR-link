<?php

namespace App\Models;

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
        return $this->belongsToMany('App\Models\Event', 'event_tests', 'test_id', 'event_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_tests', 'test_id', 'user_id');
    }

    public function units()
    {
        return $this->belongsTo('App\Models\Unit');
    }

    public function activity(){
        return $this->belongsTo('App\Models\Activity');
    }
}
