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
class Consult extends Model
{
    protected static function getList($arr)
    {
        $take = isset($arr['pageSize']) ? $arr['pageSize'] : 10;
        $skip = isset($arr['page']) ? ($arr['page'] - 1) * $take : 0;
        $sql=DB::table('reply_comment as rc')
            ->leftJoin('comment as ct','rc.reply_id','=','ct.reply_id')
            ->leftJoin('order as or','ct.comment_id','=','or.comment_id')
            ->leftJoin('member as mr','ct.member_id','=','mr.member_id')
            ->leftJoin('member as mr2','rc.member_id','=','mr2.member_id')
            ->leftJoin('picture as pe','ct.comment_id','=','pe.comment_id')
            ->leftJoin('picture as pe2','rc.reply_id','=','pe2.reply_id')
            ->select('or.order_id','rc.reply_id','mr.face','mr.username','or.money','ct.title','mr2.username as returnName',
                'ct.create_time as commentTime','or.create_time as orderTime',
                DB::raw('GROUP_CONCAT(DISTINCT pe.picture) as commentPic'), DB::raw('GROUP_CONCAT(DISTINCT pe2.picture) as replyPic'),
                'ct.content','rc.content as returnContent','rc.create_time as replyTime')
            ->where('ct.statu','=','1')
            ->where('ct.type_id','=','1')
            ->where('ct.cat_id','=','3')
            ->where('ct.is_pay','=','1');

        if (!empty($arr['search'])){
            $sql=$sql->orWhere('mr.username', 'like','%'.$arr['search'].'%')
                ->orWhere('ct.title', 'like','%'.$arr['search'].'%');
        }
        $sql=$sql->having('reply_id','>','0')
            ->groupBy('or.order_id')
            ->orderBy('or.order_id','asc')
            ->take($take)
            ->skip($skip)
            ->get();

        return $sql;
    }

    protected static function pageCount($arr)
    {
        $sql=DB::table('reply_comment as rc')
            ->leftJoin('comment as ct','rc.reply_id','=','ct.reply_id')
            ->leftJoin('order as or','ct.comment_id','=','or.comment_id')
            ->leftJoin('member as mr','ct.member_id','=','mr.member_id')
            ->leftJoin('member as mr2','rc.member_id','=','mr2.member_id')
            ->select('or.order_id','rc.reply_id','mr.face','mr.username','or.money','ct.title','mr2.username as returnName','ct.create_time as commentTime','or.create_time as orderTime')
            ->where('ct.statu','=','1')
            ->where('ct.type_id','=','1')
            ->where('ct.cat_id','=','3')
            ->where('ct.is_pay','=','1');

        if (!empty($arr['search'])){
            $sql=$sql->orWhere('mr.username', 'like','%'.$arr['search'].'%')
                ->orWhere('ct.title', 'like','%'.$arr['search'].'%');
        }
        $sql=$sql->having('reply_id','>','0')
            ->groupBy('or.order_id')
            ->orderBy('or.order_id','asc')
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