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
        'title','description','id_activities'
    ];

    public function activity()
    {
        return $this->belongsTo('App\Activity', 'id_activities');
    }

    public function unitEvent()
    {
        return $this->hasMany('App\UnitsEvent','id_units');
    }

    public function events(){
        return $this->belongsToMany('App\Event','units_events','id_units','id_events')->whereNull('units_events.deleted_at');
    }

    public function test()
    {
        return $this->hasMany('App\Test','unit_id');
    }
}
