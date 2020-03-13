<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Activity, handled by ORM
 * @package App
 */
class Activity extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'public', 'validated', 'study_field_id', 'author_id'
    ];

    /**
     * Return units belonging to this activity
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function units(){
        return $this->belongsToMany('App\Models\Unit','activity_unit', 'activity_id', 'unit_id')->withTimestamps()->withPivot('id','unit_order_number');
    }

    /**
     * Return studyfield this activity belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyField()
    {
        return $this->belongsTo('App\Models\StudyField', 'study_field_id');
    }

    /**
     * Return author of this activity
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author() {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    /**
     * Return subscribers of this activity
     * @return $belongsToMany
     */
    public function subscriber(){
        return $this->belongsToMany('App\Models\User', 'activity_users', 'activity_id', 'subscriber_id')->withTimestamps();
    }

    /**
     * Return tests of this activity
     * @return $belongsToMany
     */
    public function tests(){
        return $this->hasMany('App\Models\Test','activity_id','id');
    }
}
