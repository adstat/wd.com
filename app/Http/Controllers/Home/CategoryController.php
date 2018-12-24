<?php

namespace App\Http\Controllers\Home;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function Garden(Request $request)
    {
        $res=Comment::where('type_id','1')
            ->where('cat_id','1')
            ->get();
        dd($res);
//        return response()->json($res);
    }

}
