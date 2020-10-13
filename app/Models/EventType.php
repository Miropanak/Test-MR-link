<?php

/**
 * Created by Bernad on 11/6/2017.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EventType
 *
 * This class provide ORM part of model for event types. Event type can
 * be understand in our system for example as "questions" or anything other.
 *
 * @package App
 */
class EventType extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     *
     * Multiple events can have same event type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

}
