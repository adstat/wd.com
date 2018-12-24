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
class Privilege extends Model
{
    public $timestamps = false;
    protected $table = 'privilege';

    protected static function upMemberOne($arr)
    {

        return  Privilege::where('member_id','=',$arr['flag'])
            ->update(['status'=>0]);
    }

    protected static function chkLogin($arr)
    {
        return Privilege::where('username',trim($arr['username']))
            ->where('password',md5(trim($arr['password'])))
            ->select('admin_id','username','status')
            ->first();
    }

    protected static function pageCount($arr)
    {
        return Privilege::count();
    }

    protected static function getList($arr)
    {
        $take = isset($arr['pageSize']) ? $arr['pageSize'] : 10;
        $skip = isset($arr['page']) ? ($arr['page'] - 1) * $take : 0;
        return Privilege::skip($skip)
            ->take($take)
            ->get();

    }

    protected static function getUpdateOne($arr)
    {
       return  Privilege::where('pri_id',trim($arr['keyword']))
           ->first()
           ->toArray();
    }

    protected static function getSave($arr)
    {
        return Privilege::where('pri_id',trim($arr['pri_id']))
            ->update([
                'pri_name'=>trim($arr['pri_name']),
                'controller_name'=>trim($arr['controller_name']),
                'module_name'=>trim($arr['module_name']),
                'action_name'=>trim($arr['action_name']),
                'parent_id'=>trim($arr['parent_id']),
            ]);
    }

    protected static function putCreatePrivilege($arr)
    {
        $role= new Privilege();
        $role->pri_name=trim($arr['pri_name']);
        $role->controller_name=trim($arr['controller_name']);
        $role->module_name=trim($arr['module_name']);
        $role->action_name=trim($arr['action_name']);
        $role->parent_id=trim($arr['parent_id']);
        $info=$role->save();
        return $info;
    }

    protected static function getDelete($arr)
    {
        return Privilege::where('pri_id',$arr['id'])->delete();
    }

}