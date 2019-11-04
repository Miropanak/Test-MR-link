<?php

namespace App;

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
        'name', 'email', 'password', 'id_user_types'
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
     * Returns activities created by this user
     * @return $this
     */
    public function activities()
    {
        return $this->belongsToMany('App\Activity', 'activity_users', 'id_users', 'id_activities')->whereNull('activity_users.deleted_at');
    }

    /**
     * returns events created by this user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Event', 'id_users');
    }

    /**
     * returns user tests created by this user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests()
    {
        return $this->belongsToMany('App\Event', 'user_tests', 'users_id', 'tests_id');
    }
}
