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
class Garden extends Model
{
    protected static function getList($arr)
    {
        $take = isset($arr['pageSize']) ? $arr['pageSize'] : 10;
        $skip = isset($arr['page']) ? ($arr['page'] - 1) * $take : 0;
        $sql=DB::table('member as mr')
            ->leftJoin('garden_inventory as gi','mr.member_id','=','gi.member_id')
            ->leftJoin('garden as gn','gi.garden_id','=','gn.garden_id')
            ->select('gn.garden_id','gn.garden_name',
                DB::raw('COUNT(DISTINCT mr.member_id) as gardenNum '))
            ->where('mr.statu','=',1)
            ->where('gn.statu','=',1)
            ->where('gi.statu','=',1);
        if ($arr){
            $sql=$sql->orWhere('gn.garden_name', 'like','%'.$arr['search'].'%');
        }
        $sql=$sql->groupBy('gn.garden_id')
            ->orderBy('gn.garden_id','asc')
            ->take($take)
            ->skip($skip)
            ->get();

        return $sql;
    }

    protected static function pageCount($arr)
    {
        $sql=DB::table('member as mr')
            ->leftJoin('garden_inventory as gi','mr.member_id','=','gi.member_id')
            ->leftJoin('garden as gn','gi.garden_id','=','gn.garden_id')
            ->select('gn.garden_id','gn.garden_name',
                DB::raw('COUNT(DISTINCT mr.member_id) as gardenNum '))
            ->where('mr.statu','=',1)
            ->where('gn.statu','=',1)
            ->where('gi.statu','=',1);
        if ($arr){
            $sql=$sql->orWhere('gn.garden_name', 'like','%'.$arr['search'].'%');
        }
        $sql=$sql->groupBy('gn.garden_id')
            ->get();
        return count($sql);
    }

    protected static function putDeleteOne($arr)
    {
        return DB::table('garden')
            ->where('garden_id','=',$arr['findId'])
            ->delete();
    }

}