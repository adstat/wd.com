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
class Idea extends Model
{
    protected static function getList($arr)
    {
        $take = trim(isset($arr['pageSize']) ? $arr['pageSize'] : 10);
        $skip = trim(isset($arr['page']) ? ($arr['page'] - 1) * $take : 0);
        $key = trim(isset($arr['search']) ? $arr['search'] : '');
//        DB::connection()->enableQueryLog();  // 开启QueryLog
        $list=DB::table('comment as ct')
            ->leftJoin('reply_comment as rc','ct.comment_id','=','rc.comment_id')
            ->leftJoin('member as mr','ct.member_id','=','mr.member_id')
            ->leftJoin('picture as pe','ct.comment_id','=','pe.comment_id')
            ->leftJoin('type as te','ct.type_id','=','te.type_id')
            ->leftJoin('category as cy','ct.cat_id','=','cy.cat_id')
            ->select(
                DB::raw('GROUP_CONCAT(DISTINCT pe.picture) as picture'),
                DB::raw('COUNT( DISTINCT rc.reply_id ) as returnNum'),
                'mr.member_id','mr.username','ct.title','ct.content','ct.create_time','ct.comment_id'
            )
            ->where('ct.statu','<>','0')
            ->where('te.type_id','=','2')
            ->where('ct.cat_id','=','3');
        if (!empty($key)){
            $list=$list->orWhere('mr.nickname', 'like','%'.$key.'%');
//                ->orWhere('jb.company', 'like', '%'. $key .'%')
//                ->orWhere('jb.position', 'like', '%'. $key.'%');
        }
        $list=$list->groupBy('ct.comment_id')
            ->skip($skip)
            ->take($take)
            ->get();
//        dump(DB::getQueryLog());
        return $list;
    }

    protected static function pageCount($arr)
    {

        $key=trim(isset($arr['search'])?$arr['search']:'');
        $list=DB::table('comment as ct')
            ->leftJoin('reply_comment as rc','ct.comment_id','=','rc.comment_id')
            ->leftJoin('member as mr','ct.member_id','=','mr.member_id')
            ->leftJoin('picture as pe','ct.comment_id','=','pe.comment_id')
            ->select(
                DB::raw('GROUP_CONCAT(DISTINCT pe.picture) as picture'),
                DB::raw('COUNT( DISTINCT rc.reply_id ) as returnNum'),
                'mr.member_id','mr.username','ct.title','ct.content','ct.create_time'
            )
            ->where('ct.statu','<>','0')
            ->where('ct.type_id','=','2')
            ->where('ct.cat_id','=','3');
        if ($key){
            $list=$list->orWhere('mr.nickname', 'like','%'.$key.'%');
        }
        $list=$list->groupBy('ct.comment_id')
            ->get();
        $list=count($list);
        return $list;
    }

    protected static function upMemberOne($arr)
    {
        return DB::table('member')->where('member_id','=',$arr['flag'])->update(['status'=>0]);
    }

}