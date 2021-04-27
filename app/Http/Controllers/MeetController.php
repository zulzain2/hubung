<?php

namespace App\Http\Controllers;

use App\Models\MeetingLog;
use Illuminate\Http\Request;

class MeetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topBarTitle = 'Meet';

        $meetinglogs = MeetingLog::where([
			['id_users', '=' , auth()->user()->id]
		])->orderByDesc('datetime')->get();

        return view('meet.index')->with(compact('topBarTitle' , 'meetinglogs'));
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


    public function storeMeetingLog(Request $request)
    {
        $request->validate([
            'room_name' 	=> 'required',
            'display_name' 		=> 'required',
            'datetime' 			=> 'required',
        ]);

        $add = New MeetingLog;
        $add->id_users = auth()->user()->id;
        $add->room_name = $request->room_name;
        $add->display_name = $request->display_name;
        $add->datetime = date('Y-m-d H:i:s' , strtotime($request->datetime));
        $add->save();
       
        $meetinglog = MeetingLog::where([
			['id_users', '=' , auth()->user()->id]
		])->orderByDesc('datetime')->get();

        return json_encode($meetinglog);
    }
}
