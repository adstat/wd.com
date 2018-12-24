<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //首页
    public function index()
    {
        $username=\Redis::get('username');
        return view('admin.index.index',['username'=>$username]);
    }

    public function body()
    {
        return view('admin.index.body');
    }

    public function icon()
    {
        return view('admin.index.icon');
    }
}
