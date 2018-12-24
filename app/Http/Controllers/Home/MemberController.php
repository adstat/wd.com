<?php

namespace App\Http\Controllers\Home;

use App\Garden;
use App\Job;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    //
    public function login(Request $request)
    {
        if ($request->input('flag') =='1'){//微信
            $info=Member::where('open_id',$request->input('open_id'))->first();
            if ($info){//有微信号
                config('member.SUCCESS');
            }else{//有微信号
                config('member.ERROR');
            }
        }else{//非微信
            $info=Member::where(['username',$request->input('username'),'password',md5($request->input('password'))])
                ->first()
                ->toArray();
            if ($info){
                config('member.SUCCESS');
            }else{
                config('member.ERROR');
            }
        }
    }

    public function chkMember(Request $request)
    {
        $find=Member::where('nickname',$request->input('username'))->first();
//        dd($find);
        if ($find){
            return config('member.WARNING');
        }else{
            return config('member.SUCCESS');
        }
    }

    public function register(Request $request)
    {
        $arr=[
            'nickname'=>$request->input('nickname'),
            'username'=>$request->input('username'),
            'password'=>md5($request->input('password')),
            'face'=>md5($request->input('face')),
            'describe'=>md5($request->input('describe')),
            'sex'=>md5($request->input('sex')),
            'card'=>md5($request->input('card')),
            'phone'=>md5($request->input('phone')),
            'account'=>md5($request->input('account')),
            'create_time'=>date('Y:m:d H:i:s',time()),
        ];
        $id=Member::getInsertId($arr);
        if ($id){
            for ($i=0;$i<count($request->input('garden'));$i++){
                Garden::create([
                    'garden_name'=>$request->input('garden_name')[$i],
                    'member_id'=>$id,
                    'create_time'=>date('Y:m:d H:i:s',time()),
                ]);
            }

            for ($i=0;$i<count($request->input('job'));$i++){
                Job::create([
                    'company'=>$request->input('company')[$i],
                    'position'=>$request->input('position')[$i],
                    'member_id'=>$id,
                    'create_time'=>date('Y:m:d H:i:s',time()),
                ]);
            }
            config('member.SUCCESS');
        }else{
            config('member.ERROR');
        }
    }
}
