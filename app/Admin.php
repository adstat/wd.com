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
class Admin extends Model
{
    public $timestamps = false;
    protected $table = 'admin';

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
        return Admin::count();
    }

    protected static function getList($arr)
    {
        $take = isset($arr['pageSize']) ? $arr['pageSize'] : 10;
        $skip = isset($arr['page']) ? ($arr['page'] - 1) * $take : 0;
        return Admin::skip($skip)
            ->take($take)
            ->get();

    }

    protected static function getUpdateOne($arr)
    {
       return  Admin::where('admin_id',trim($arr['keyword']))
           ->first()
           ->toArray();
    }

    protected static function getSave($arr)
    {
        return Admin::where('admin_id',trim($arr['admin_id']))
            ->update([
                'compellation'=>trim($arr['compellation']),
                'phone'=>trim($arr['phone']),
                'job'=>trim($arr['job']),
                'password'=>md5(trim($arr['password'])),
                'update_time'=>date('Y-m-d H:i:s',time())
            ]);
    }

    protected static function putCreateAdmin($arr)
    {
//        return Admin::save($arr);
        $admin= new Admin();
        $admin->username=trim($arr['username']);
        $admin->compellation=trim($arr['compellation']);
        $admin->password=md5(trim($arr['password']));
        $admin->job=trim($arr['job']);
        $admin->phone=trim($arr['phone']);
        $admin->create_time=date('Y-m-d H:i:s',time());
        $info=$admin->save();
        return $info;
    }

    protected static function getDelete($arr)
    {
        return Admin::where('admin_id',$arr['id'])->delete();
    }

}