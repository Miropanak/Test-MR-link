<?php

namespace App;

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
        'title', 'content', 'public', 'validated', 'id_study_field', 'id_author'
    ];

    /**
     * Return units belonging to this activity
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function units(){
        return $this->hasMany('App\Unit','id_activities');
    }

    /**
     * Return studyfield this activity belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyField()
    {
        return $this->belongsTo('App\StudyField', 'id_study_field');
    }

    /**
     * Return author of this activity
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author() {
        return $this->belongsTo('App\User', 'id_author');
    }

    /**
     * Return subscribers of this activity
     * @return $this
     */
    public function subscriber(){
        return $this->belongsToMany('App\User', 'activity_users', 'id_activities', 'id_users')->whereNull('activity_users.deleted_at')->withPivot('id_user_types');
    }
}
