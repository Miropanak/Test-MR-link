<?php

/**
 * Created by Bernad on 11/6/2017.
 */

namespace App\Models;

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
        'time_to_explain','time_to_handle','message', 'event_type_id', 'author_id',
    ];

    protected $hidden = ['pivot'];

    /**
     *
     * Every event belongs only to one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    /**
     *
     * Every event can has only one event type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventType()
    {
        return $this->belongsTo('App\Models\EventType');
    }

    /**
     *
     * Every event may contains multiple options
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function option()
    {
        return $this->hasMany('App\Models\Option', 'event_id');
    }

    public function tests()
    {
        return $this->belongsToMany('App\Models\Test', 'event_tests', 'event_id', 'test_id');
    }
}
