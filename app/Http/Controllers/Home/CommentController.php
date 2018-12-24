<?php

namespace App\Http\Controllers\Home;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function Garden(Request $request)
    {
        $list='1,2,3,4,5';
        $res=Comment::where('type_id','1')
            ->where('cat_id','1')
            ->whereIn('garden_id',[1,2,3,4])
            ->get();
        dd($res);
//        return response()->json($res);
    }

}
