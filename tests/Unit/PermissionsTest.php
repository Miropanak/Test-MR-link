<?php
/**
 * Created by PhpStorm.
 * User: Bende
 * Date: 16.11.2018
 * Time: 01:03
 */

namespace Tests\Unit;

use App\UserTypesPermission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionsTest extends TestCase
{
    use RefreshDatabase;

    public function testAnonymPermission()
    {
        $AnonymPermission = UserTypesPermission::where('user_type_id', '1')->get();
        $number = UserTypesPermission::getNumberOfPermissions($AnonymPermission);
        $this->assertEquals(2,$number);
    }

    public function testStudentPermission()
    {
        $StudentPermission = UserTypesPermission::where('user_type_id', '2')->get();
        $number = UserTypesPermission::getNumberOfPermissions($StudentPermission);
        $this->assertEquals(8,$number);
    }

    public function testAuthorPermission()
    {
        $AuthorPermission = UserTypesPermission::where('user_type_id', '3')->get();
        $number = UserTypesPermission::getNumberOfPermissions($AuthorPermission);
        $this->assertEquals(15,$number);
    }

    public function testTeacherPermission()
    {
        $TeacherPermission = UserTypesPermission::where('user_type_id', '4')->get();
        $number = UserTypesPermission::getNumberOfPermissions($TeacherPermission);
        $this->assertEquals(19,$number);
    }

    public function testCommissionerPermission()
    {
        $CommissionerPermission = UserTypesPermission::where('user_type_id', '5')->get();
        $number = UserTypesPermission::getNumberOfPermissions($CommissionerPermission);
        $this->assertEquals(18,$number);
    }

    public function testAdminPermission()
    {
        $AdminPermission = UserTypesPermission::where('user_type_id', '6')->get();
        $number = UserTypesPermission::getNumberOfPermissions($AdminPermission);
        $this->assertEquals(0,$number);
    }

}