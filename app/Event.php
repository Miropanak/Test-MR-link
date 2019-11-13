<?php

/**
 * Created by Bernad on 11/6/2017.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Event
 *
 * This class provides ORM part of model for events. Events can be understand
 * in our system as tasks (school tasks, subject tasks, or other events).
 *
 * @package App
 */
class Event extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'time_to_explain','time_to_handle','message', 'id_event_types', 'id_users',
    ];

    protected $hidden = ['pivot']; // https://stackoverflow.com/questions/26474201/laravel-belongstomany-exclude-pivot-table

    /**
     *
     * Every event belongs only to one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_users');
    }

    /**
     *
     * Every event can has only one event type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventType()
    {
        return $this->belongsTo('App\EventType');
    }

    /**
     *
     * Every event may contains multiple options
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function option()
    {
        return $this->hasMany('App\Option', 'id_events');
    }

    public function tests()
    {
        return $this->belongsToMany('App\Test', 'event_tests', 'events_id', 'tests_id');
    }
}
