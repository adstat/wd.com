<?php

namespace App\Http\Controllers\Admin;

use App\Privilege;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivilegeController extends Controller
{

    public function index()
    {
        return view('admin.privilege.index');
    }

    public function getPrivilegeCount(Request $request)
    {
        echo json_encode(Privilege::pageCount($request->input()));
    }
    public function getPrivilegeList(Request $request)
    {
        echo json_encode(Privilege::getList($request->input()));
    }

    public function updateOne(Request $request)
    {
        $info=Privilege::getUpdateOne($request->input());
        return view('admin.privilege.edit',['data'=>$info]);
    }

    public function save(Request $request)
    {
        $info= Privilege::getSave($request->input());
        return redirect('admin/privilege/index');
    }

    public function create(Request $request)
    {
        return view('admin.privilege.create');
    }

    public function createPrivilege(Request $request)
    {
        echo json_encode(Privilege::putCreatePrivilege($request->input()));
    }

    public function deleteOne(Request $request)
    {

        echo json_encode(Privilege::getDelete($request->input()));
    }

}
