<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UnitsEvent
 *
 * This class provides ORM part of model for associative table between unit and event (one unit has many events
 * and one event belongs to many units).
 *
 * @package App
 */
class UnitsEvent extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_events','id_units'
    ];

    /**
     * Every UnitsEvent belongs to only one Event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     * Every UnitsEvent can has only one Unit.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo('App\Unit','id_units');
    }

}
