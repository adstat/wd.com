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
class Report extends Model
{
    protected static function getList($arr)
    {
        $take = isset($arr['pageSize']) ? $arr['pageSize'] : 10;
        $skip = isset($arr['page']) ? ($arr['page'] - 1) * $take : 0;
        $sql=DB::table('comment as ct')
            ->leftJoin('type as te','ct.type_id','=','te.type_id')
            ->leftJoin('category as cy','ct.cat_id','=','cy.cat_id')
            ->leftJoin('report as rt','ct.comment_id','=','rt.comment_id')
            ->leftJoin('member as mr','mr.member_id','=','ct.member_id')
            ->leftJoin('member as mr2','rt.return_member_id','=','mr2.member_id')
            ->select('rt.report_id','mr.face','mr2.username as returnName','te.type_name','cy.cat_name','mr.username','ct.content','rt.report_content','rt.create_time')
            ->where('ct.statu','=','1')
            ->where('ct.is_report','=','1')
            ->where('mr.statu','=','1')
            ->where('rt.statu','=','1');

        if (!empty($arr['search'])){
            $sql=$sql->orWhere('mr.username', 'like','%'.$arr['search'].'%')
                ->orWhere('mr2.username', 'like','%'.$arr['search'].'%')
                ->orWhere('ct.content', 'like','%'.$arr['search'].'%');
        }
        $sql=$sql->groupBy('rt.report_id')
            ->orderBy('rt.report_id','asc')
            ->take($take)
            ->skip($skip)
            ->get();
        return $sql;
    }

    protected static function pageCount($arr)
    {

        $sql=DB::table('report as rt')
            ->leftJoin('comment as ct','rt.comment_id','=','ct.comment_id')
            ->leftJoin('type as te','ct.type_id','=','te.type_id')
            ->leftJoin('category as cy','ct.cat_id','=','cy.cat_id')
            ->leftJoin('member as mr','mr.member_id','=','ct.member_id')
            ->leftJoin('member as mr2','rt.return_member_id','=','mr2.member_id')
            ->select('rt.report_id','mr.face','mr2.username as returnName','te.type_name','cy.cat_name','mr.username','ct.content','rt.report_content','rt.create_time')
            ->where('ct.statu','=','1')
            ->where('ct.is_report','=','1')
            ->where('mr.statu','=','1')
            ->where('rt.statu','=','1');

        if (!empty($arr['search'])){
            $sql=$sql->orWhere('mr.username', 'like','%'.$arr['search'].'%')
                ->orWhere('mr2.username', 'like','%'.$arr['search'].'%')
                ->orWhere('ct.content', 'like','%'.$arr['search'].'%');
        }
        $sql=$sql->groupBy('rt.report_id')
            ->orderBy('rt.report_id','asc')
            ->get();
        return count($sql);
    }

    protected static function putDeleteOne($arr)
    {
        return DB::table('report')
            ->where('report_id','=',$arr['findId'])
            ->delete();
    }

    protected static function putUpdateOne($arr)
    {
        return DB::table('report')
            ->where('report_id','=',$arr['findId'])
            ->update(['statu'=>'0']);
    }

}