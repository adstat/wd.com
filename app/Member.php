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
class Member extends Model
{
    public $timestamps = false;
    protected $table = 'member';
    protected static function getList($arr)
    {
        $take = isset($arr['pageSize']) ? $arr['pageSize'] : 10;
//        $take=3;
        $skip = isset($arr['page']) ? ($arr['page'] - 1) * $take : 0;
        $sql= DB::table('comment_inventory as ci')
            ->leftJoin('member as mr','ci.member_id','=','mr.member_id')
            ->leftJoin('job as jb','jb.job_id','=','mr.job_id')
            ->leftJoin('education as en','mr.education_id','=','en.education_id')
            ->leftJoin('garden as gn','mr.member_id','=','gn.member_id')
            ->select(DB::raw('GROUP_CONCAT(DISTINCT CONCAT(en.school,\' \',en.specialty,\' \',en.ducation,\' \',en.start_time,\'：\',en.end_time)) as schoolName'),
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT(jb.company,\' \',jb.position,\' \',jb.start_time,\'：\',jb.end_time)) as job'),
                'mr.nickname','mr.username','mr.sex','mr.member_id','mr.is_consult','mr.consult_price',
                DB::raw('CONCAT(jb.company,\' /\',jb.position) AS jobing'),
                'ci.comment_num','ci.return_comment_num','ci.theme_num','ci.discussion_num','ci.idea_num','mr.create_time','ci.consult_num','ci.live_num','mr.phone','mr.email','mr.describe',
                DB::raw('GROUP_CONCAT(DISTINCT gn.garden_name) as garden')
            );
        if (isset($arr['searchName'])){
            $sql = $sql->where('mr.status','<>','0')->orWhere('mr.nickname', 'like', '%'. $arr['searchName'] .'%')->orWhere('jb.company', 'like', '%'. $arr['searchName'] .'%')
                ->orWhere('jb.position', 'like', '%'. $arr['searchName'] .'%');
        }
            $sql=$sql->groupBy('mr.member_id')
            ->orderBy('mr.member_id')
            ->take($take)
            ->skip($skip)
            ->get();
        return $sql;
    }

    protected static function pageCount($key)
    {
        $sql= DB::table('comment_inventory as ci')
            ->leftJoin('member as mr','ci.member_id','=','mr.member_id')
            ->leftJoin('job as jb','jb.job_id','=','mr.job_id')
            ->leftJoin('education as en','mr.education_id','=','en.education_id')
            ->leftJoin('garden as gn','mr.member_id','=','gn.member_id')
            ->select('mr.member_id');
        if ($key){
            $sql=$sql->orWhere('mr.nickname', 'like','%'.$key.'%')
                ->orWhere('jb.company', 'like', '%'. $key .'%')
                ->orWhere('jb.position', 'like', '%'. $key.'%');
        }
        $sql=$sql->groupBy('mr.member_id')->count();
        return $sql;
    }

    protected static function upMemberOne($arr)
    {
        return DB::table('member')->where('member_id','=',$arr['flag'])->update(['status'=>0]);
    }

}