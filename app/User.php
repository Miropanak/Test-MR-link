<?php

namespace App;

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
        'name', 'email', 'password', 'user_type_id', 'confirm_private_policy'
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
        return $this->belongsTo('App\UserType', 'user_type_id');
    }

    /**
     * Returns activities created by this user
     * @return BelongsToMany
     */
    public function activities()
    {
        return $this->belongsToMany('App\Activity', 'activity_users', 'author_id', 'activity_id')->whereNull('activity_users.deleted_at');
    }

    /**
     * returns events created by this user
     * @return HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Event', 'author_id');
    }

    /**
     * returns user tests created by this user
     * @return BelongsToMany
     */
    public function tests()
    {
        return $this->belongsToMany('App\Event', 'user_tests', 'student_id', 'test_id');
    }
}
