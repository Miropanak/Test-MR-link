<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User, representing logged user in the application
 * @package App
 */
class User extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type_id', 'confirm_private_policy', 'class', 'organization_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Returns user role created by this user
     * @return BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\UserType', 'user_type_id');
    }

    /**
     * Returns activities created by this user
     * @return BelongsToMany
     */
    public function activities()
    {
        return $this->belongsToMany('App\Models\Activity', 'activity_users', 'author_id', 'activity_id')->whereNull('activity_users.deleted_at');
    }

    /**
     * returns events created by this user
     * @return HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Models\Event', 'author_id');
    }
    /**
     * returns subscriber Activity
     * @return BelongsToMany
     */
    public function subscriberActivities()
    {
        return $this->belongsToMany('App\Models\Activity', 'activity_users', 'subscriber_id','activity_id');
    }

    /**
     * returns user tests created by this user
     * @return BelongsToMany
     */
    public function tests()
    {
        return $this->belongsToMany('App\Models\Event', 'user_tests', 'student_id', 'test_id');
    }
}
