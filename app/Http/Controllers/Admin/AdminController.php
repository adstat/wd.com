<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class AdminController  extends Controller
{
    //首页
    public function login()
    {
        return view('admin.admin.login');
    }

    public function checkLogins(Request $request)
    {
        $info=Admin::chkLogin($request->input());
        if (!is_null($info)){
            Redis::set('username',$info->username);
            Redis::set('id',$info->admin_id);
        }
        echo json_encode($info);

    }

    public function logout()
    {
        Redis::del('id');
        Redis::del('username');
        return view('admin.admin.login');
    }

    public function index()
    {
        return view('admin.admin.index');
    }

    public function getAdminCount(Request $request)
    {
        echo json_encode(Admin::pageCount($request->input()));
    }
    public function getAdminList(Request $request)
    {
        echo json_encode(Admin::getList($request->input()));
    }

    public function updateOne(Request $request)
    {
        $info=Admin::getUpdateOne($request->input());
//        echo '<pre>';print_r($info);die;
        return view('admin.admin.edit',['data'=>$info]);
    }

    public function save(Request $request)
    {
        $info= Admin::getSave($request->input());
        return redirect('admin/admin/index')->with('提示', '修改成功了!');
    }

    public function create(Request $request)
    {
//        $info=Admin::getCreate($request->input());
        return view('admin.admin.create');
    }

    public function createAdmin(Request $request)
    {
        echo json_encode(Admin::putCreateAdmin($request->input()));
    }
    public function deleteOne(Request $request)
    {
        echo json_encode(Admin::getDelete($request->input()));
    }

}
