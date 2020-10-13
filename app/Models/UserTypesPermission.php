<?php
/**
 * Created by PhpStorm.
 * User: Bende
 * Date: 16.11.2018
 * Time: 03:29
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTypesPermission extends Model
{

    protected $table = 'user_types_permissions';
    protected $primaryKey = 'id';

    use SoftDeletes;
    use RefreshDatabase;

    protected $fillable = [
        'user_type_id', 'permission_id'
    ];

    public static function getNumberOfPermissions($query){
        return count($query);
    }

}