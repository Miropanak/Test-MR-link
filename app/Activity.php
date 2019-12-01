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
        'title', 'content', 'public', 'validated', 'study_field_id', 'id_author'
    ];

    /**
     * Return units belonging to this activity
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function units(){
        return $this->belongsToMany('App\Unit','activity_unit', 'activity_id', 'unit_id');
    }

    /**
     * Return studyfield this activity belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyField()
    {
        return $this->belongsTo('App\StudyField', 'study_field_id');
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
        return $this->belongsToMany('App\User', 'activity_users', 'activity_id', 'author_id')->whereNull('activity_users.deleted_at')->withPivot('user_type_id');
    }
}
