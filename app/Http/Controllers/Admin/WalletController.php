<?php

namespace App\Http\Controllers\Admin;
use App\Report;
use App\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        return 1;
//        return view('admin.wallet.dcl');
        $index=$request->input();
        switch ($index){
            case $index['statu']=='1':
                return view('admin.wallet.dcl');
                break;
            case $index['statu']=='2':
                return view('admin.wallet.ddk');
                break;
            case $index['statu']=='3':
                return view('admin.wallet.ydk');
                break;
            case $index['statu']=='4':
                return view('admin.wallet.yjj');
                break;

        }
//        return view('admin.topic.index');
    }

    public function setWallet(Request $request)
    {
        return view('admin.wallet.setwallet');
//        echo json_encode(Wallet::changeSet($request->input()));
    }

    public function getSetWallet(Request $request)
    {
        echo json_encode(Wallet::changeSet($request->input()));
    }
    public function getUpdateOne(Request $request)
    {
        echo json_encode(Wallet::putUpdateOne($request->input()));
    }
    public function getDeleteOne(Request $request)
    {
        echo json_encode(Wallet::putDeleteOne($request->input()));
    }

    public function getWalletList(Request $request)
    {
//        dd($_REQUEST);
        echo json_encode(Wallet::getList($request->input()));
    }

    public function getWalletCount(Request $request)
    {
        echo json_encode(Wallet::pageCount($request->input()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
