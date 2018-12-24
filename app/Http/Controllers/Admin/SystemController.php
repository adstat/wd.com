<?php

namespace App\Http\Controllers\Admin;
use App\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.topic.index');
    }

    public function sensitivity()
    {
        return view('admin.system.mgcsz');
    }

    public function setuser()
    {
        return view('admin.system.zhsz');
    }

    public function jurisdiction()
    {
        return view('admin.system.zhsz_bj');
    }


    public function getDeleteOne(Request $request)
    {
        echo json_encode(Topic::putDeleteOne($request->input()));
    }

    public function getTopicList(Request $request)
    {
        echo json_encode(Topic::getList($request->input()));
    }

    public function getTopicCount(Request $request)
    {

        echo json_encode(Topic::pageCount($request->input()));
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
