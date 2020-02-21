<?php

namespace App\Models;

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
        'title','description', 'author_id'
    ];

    /**
     *
     * Every event belongs only to one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function activities()
    {
        return $this->belongsToMany('App\Activity', 'activity_unit', 'unit_id', 'activity_id')->withPivot('unit_order_number')->withTimestamps();
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
