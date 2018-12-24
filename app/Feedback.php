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
class Feedback extends Model
{
    protected static function getList($arr)
    {
        $take = trim(isset($arr['pageSize']) ? $arr['pageSize'] : 10);
        $skip = trim(isset($arr['page']) ? ($arr['page'] - 1) * $take : 0);
        $list=Feedback::where('feedback_statu_id',$arr['status'])
            ->take($take)
            ->skip($skip)
            ->get();
        return $list;
    }
    protected static function pageCount($arr)
    {
        $list=Feedback::where('feedback_statu_id',$arr['status'])->all();
        return count($list);
    }
}