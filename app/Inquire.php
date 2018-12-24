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
class Inquire extends Model
{
    protected static function getList($arr)
    {
        $take = isset($arr['pageSize']) ? $arr['pageSize'] : 10;
        $skip = isset($arr['page']) ? ($arr['page'] - 1) * $take : 0;
        $sql=DB::table('reply_comment as rc')
            ->leftJoin('comment as ct','rc.comment_id','=','ct.comment_id')
            ->leftJoin('comment_list as cl','ct.comment_id','=','cl.comment_id')
            ->leftJoin('member as mr','cl.return_member_id','=','mr.member_id')
            ->leftJoin('member as mr2','rc.member_id','=','mr2.member_id')
            ->leftJoin('order as oo','cl.order_id','=','oo.order_id')
            ->leftJoin('picture as ps','ct.comment_id','=','ps.comment_id')
            ->leftJoin('picture as ps2','rc.reply_id','=','ps2.reply_id')
            ->select('cl.order_id','mr.face','mr.username','cl.inquire_money','ct.title','mr2.username as returnName',
                'ct.create_time','oo.create_time as orderTime','ct.content','rc.content as replyContent',
                DB::raw('GROUP_CONCAT(DISTINCT ps.picture) as commentPic'),
                DB::raw('GROUP_CONCAT(DISTINCT ps2.picture) as replyPic'))
            ->where('ct.type_id','=','1')
            ->where('ct.cat_id','=','3')
            ->where('ct.is_pay','=','1')
            ->where('ct.is_inquire','=','1');
        if (!empty($arr['search'])){
            $sql=$sql->orWhere('ct.title', 'like','%'.$arr['search'].'%');
        }
        $sql=$sql->having('cl.order_id','!=','null')
            ->groupBy('cl.order_id')
            ->orderBy('cl.order_id','asc')
            ->take($take)
            ->skip($skip)
            ->get();

        return $sql;
    }

    protected static function pageCount($arr)
    {

        $sql=DB::table('reply_comment as rc')
            ->leftJoin('comment as ct','rc.comment_id','=','ct.comment_id')
            ->leftJoin('comment_list as cl','ct.comment_id','=','cl.comment_id')
            ->leftJoin('member as mr','cl.return_member_id','=','mr.member_id')
            ->leftJoin('member as mr2','rc.member_id','=','mr2.member_id')
            ->leftJoin('order as oo','cl.order_id','=','oo.order_id')
            ->leftJoin('picture as ps','ct.comment_id','=','ps.comment_id')
            ->leftJoin('picture as ps2','rc.reply_id','=','ps2.reply_id')
            ->select('cl.order_id','mr.face','mr.username','cl.inquire_money','ct.title','mr2.username as returnName',
                'ct.create_time','oo.create_time as orderTime',DB::raw('GROUP_CONCAT(DISTINCT ps.picture) as commentPic'),
                DB::raw('GROUP_CONCAT(DISTINCT ps2.picture) as replyPic'),'ct.content','rc.content as replyContent')
            ->where('ct.type_id','=','1')
            ->where('ct.cat_id','=','3')
            ->where('ct.is_pay','=','1')
            ->where('ct.is_inquire','=','1');
        if (!empty($arr['search'])){
            $sql=$sql->orWhere('ct.title', 'like','%'.$arr['search'].'%');
        }
        $sql=$sql->having('cl.order_id','!=','null')
            ->groupBy('cl.order_id')
            ->orderBy('cl.order_id','asc')
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