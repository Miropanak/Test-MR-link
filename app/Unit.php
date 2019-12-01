<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','description'
    ];

    public function activities()
    {
        return $this->belongsToMany('App\ActivityUnit', 'activity_unit', 'unit_id', 'activity_id');
    }

    public function unitEvent()
    {
        return $this->hasMany('App\UnitsEvent','unit_id');
    }

    public function events(){
        return $this->belongsToMany('App\Event','units_events','unit_id','event_id')->whereNull('units_events.deleted_at');
    }

    public function test()
    {
        return $this->hasMany('App\Test','unit_id');
    }
}
