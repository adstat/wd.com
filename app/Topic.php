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
header('Contenty-type:text/html;charset=utf8');
class Topic extends Model
{
    protected static function getList($arr)
    {
        $take = isset($arr['pageSize']) ? $arr['pageSize'] : 10;
        $skip = isset($arr['page']) ? ($arr['page'] - 1) * $take : 0;
        $sql=DB::table('comment as ct')
            ->leftJoin('comment_list as cl','ct.comment_id','=','cl.comment_id')
            ->select('ct.comment_id','ct.title',DB::raw('COUNT(DISTINCT cl.return_comment_num) as returnNum'))
            ->where('ct.type_id','=',2)
            ->where('ct.cat_id','=',3)
            ->where('ct.statu','=',1)
            ->where('cl.statu','=',1);
        if (!empty($arr['search'])){
            $sql=$sql->orWhere('ct.title', 'like','%'.$arr['search'].'%');
        }
        $sql=$sql->groupBy('ct.comment_id')
            ->orderBy('ct.comment_id','asc')
            ->take($take)
            ->skip($skip)
            ->get();

        return $sql;
    }

    protected static function pageCount($arr)
    {
        $sql=DB::table('comment as ct')
            ->leftJoin('comment_list as cl','ct.comment_id','=','cl.comment_id')
            ->select('ct.comment_id','ct.title',DB::raw('COUNT(DISTINCT cl.return_member_id) as returnNum'))
            ->where('ct.type_id','=',2)
            ->where('ct.cat_id','=',3)
            ->where('ct.statu','=',1)
            ->where('cl.statu','=',1);
        if (!empty($arr['search'])){
            $sql=$sql->orWhere('ct.title', 'like','%'.$arr['search'].'%');
        }
        $sql=$sql->groupBy('ct.comment_id')
            ->orderBy('ct.comment_id','asc')->get();
        return count($sql);
    }

    protected static function putDeleteOne($arr)
    {
        return DB::table('garden')
            ->where('garden_id','=',$arr['findId'])
            ->delete();
    }

}