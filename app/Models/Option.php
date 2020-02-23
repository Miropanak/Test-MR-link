<?php

/**
 * Created by Bernad on 11/6/2017.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Option
 *
 * This class provide ORM part of model for event options. Options can
 * be understand in our system as possible solutions for the event.
 *
 * @package App
 */
class Option extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'answer_data','correct_answer','event_id'
    ];

    /**
     *
     * Every option belongs just to one event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Event', 'event_id');
    }

}
