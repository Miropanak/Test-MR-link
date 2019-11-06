<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserType
 * User can have any of the role represented by this class
 * @package App
 */
class UserType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    /**
     * Returns user role created by this user
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
