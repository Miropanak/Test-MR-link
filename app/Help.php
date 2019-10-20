<?php

/**
 * Created by Boris on 21/11/2018.
 */

namespace App;

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
class Help extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','url','id_events'
    ];

    /**
     *
     * Every option belongs just to one event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'id_events');
    }

}
