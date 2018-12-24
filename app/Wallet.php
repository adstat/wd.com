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
class Wallet extends Model
{
    protected static function getList($arr)
    {
        $take = isset($arr['pageSize']) ? $arr['pageSize'] : 10;
        $skip = isset($arr['page']) ? ($arr['page'] - 1) * $take : 0;
        $sql=DB::table('wallet_inventory as wi')
            ->leftJoin('wallet as wt','wi.wallet_id','=','wt.wallet_id')
            ->leftJoin('member as mr','wi.member_id','=','wi.member_id')
            ->select('wi.wallet_id','mr.face','mr.nickname','mr.phone','mr.balance','wt.deposit','mr.account','mr.username',
                DB::raw('GROUP_CONCAT(distinct wi.create_time) as time'),'wt.member_id','wi.wallet_inv')
            ->where('wi.wallet_statu_id','=',$arr['statu'])
            ->where('wi.statu','<>','0');
        if ($arr['search']){
            $sql=$sql->orWhere('mr.nickname', 'like','%'.$arr['search'].'%');
        }
        $sql=$sql->groupBy('wt.wallet_id')
            ->get();
        return $sql;
    }
    protected static function pageCount($arr)
    {
        $sql=DB::table('wallet as wt')
            ->leftJoin('wallet_inventory as wi','wt.wallet_id','=','wi.wallet_id')
            ->leftJoin('member as mr','wi.member_id','=','wi.member_id')
            ->where('wi.wallet_statu_id','=',$arr['statu']);
        if ($arr['search']){
            $sql=$sql->orWhere('mr.nickname', 'like','%'.$arr['search'].'%');
        }
        $sql=$sql->groupBy('wt.wallet_id')
            ->get();
        return count($sql);
    }

    protected static function putUpdateOne($arr)
    {
//        dd($arr);
        switch ($arr){
            case $arr['walletStatu']=='1'&&$arr['statu']=='1';
                return self::updateWallet($arr,2);
                break;
            case $arr['walletStatu']=='1'&&$arr['statu']=='0';
                return self::updateWallet($arr,4);
            case $arr['walletStatu']=='2'&&$arr['statu']=='1';
                return self::updateWallet($arr,3);
                break;
            case $arr['walletStatu']=='2'&&$arr['statu']=='0';
                return self::updateWallet($arr,4);
        }
    }

    private static function updateWallet($arr, $wallet)
    {
         DB::table('wallet_inventory')->insertGetId([
            'wallet_id'=>$arr['wallet_id'],
            'member_id'=>$arr['member_id'],
            'deposit'=>$arr['deposit'],
            'wallet_statu_id'=>$wallet,
            'create_time'=>date("Y-m-d H:i:s",time()),

        ]);
        return DB::table('wallet_inventory')
            ->where('wallet_id','=',$arr['wallet_id'])
            ->where('wallet_statu_id','=',$arr['walletStatu'])
            ->update(['statu'=>0]);
    }

    protected static function putDeleteOne($arr)
    {
        return DB::table('wallet_inventory')
            ->where('wallet_inv','=',$arr['wallet_inv'])
            ->delete();
    }

    protected static function changeSet($arr)
    {
        return DB::table('member')
            ->where('member_id','=',$arr['member_id'])
            ->update(['last_balance'=>$arr['money']]);

    }

}