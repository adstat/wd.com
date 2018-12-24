<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 2018-12-13
 * Time: 18:33
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Role extends Model
{
    public $timestamps = false;
    protected $table = 'role';

    protected static function upMemberOne($arr)
    {

        return  Admin::where('member_id','=',$arr['flag'])
            ->update(['status'=>0]);
    }

    protected static function chkLogin($arr)
    {
        return Admin::where('username',trim($arr['username']))
            ->where('password',md5(trim($arr['password'])))
            ->select('admin_id','username','status')
            ->first();
    }

    protected static function pageCount($arr)
    {
        return Role::count();
    }

    protected static function getList($arr)
    {
        $take = isset($arr['pageSize']) ? $arr['pageSize'] : 10;
        $skip = isset($arr['page']) ? ($arr['page'] - 1) * $take : 0;
        return Role::skip($skip)
            ->take($take)
            ->get();

    }

    protected static function getUpdateOne($arr)
    {
       return  Role::where('role_id',trim($arr['keyword']))
           ->first()
           ->toArray();
    }

    protected static function getSave($arr)
    {
        return Role::where('role_id',trim($arr['role_id']))
            ->update([
                'role_name'=>trim($arr['role_name'])
            ]);
    }

    protected static function putCreateRole($arr)
    {
//        return Admin::save($arr);
        $role= new Role();
        $role->role_name=trim($arr['role_name']);
        $info=$role->save();
        return $info;
    }

    protected static function getDelete($arr)
    {
        return Role::where('role_id',$arr['id'])->delete();
    }

}