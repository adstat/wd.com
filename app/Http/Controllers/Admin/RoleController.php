<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController  extends Controller
{

    public function index()
    {
        return view('admin.role.index');
    }

    public function getRoleCount(Request $request)
    {
        echo json_encode(Role::pageCount($request->input()));
    }
    public function getRoleList(Request $request)
    {
        echo json_encode(Role::getList($request->input()));
    }

    public function updateOne(Request $request)
    {
        $info=Role::getUpdateOne($request->input());
//        echo '<pre>';print_r($info);die;
        return view('admin.role.edit',['data'=>$info]);
    }

    public function save(Request $request)
    {
        $info= Role::getSave($request->input());
        return redirect('admin/role/index')->with('提示', '修改成功了!');
    }

    public function create(Request $request)
    {
//        $info=Admin::getCreate($request->input());
        return view('admin.role.create');
    }

    public function createRole(Request $request)
    {
        echo json_encode(Role::putCreateRole($request->input()));
    }

    public function deleteOne(Request $request)
    {
        echo json_encode(Role::getDelete($request->input()));
    }

}
