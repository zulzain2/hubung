<?php

namespace App\Http\Controllers;

use App\Models\Scheduler;
use App\Models\MeetingLog;
use App\Models\Notification;
use Illuminate\Http\Request;

class MeetController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index' , 'indexpublic');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topBarTitle = 'Meet';

        // $meetinglogs = MeetingLog::where([
		// 	['id_users', '=' , auth()->user()->id]
		// ])->orderByDesc('datetime')->get();

        return view('meet.index')->with(compact('topBarTitle'));
    }

    public function indexpublic()
    {
        return view('meet.public.index');
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

    public function meetingLog()
    {
       
        $meetinglog = MeetingLog::where([
			['id_users', '=' , auth()->user()->id],
            ['status', '=' , 'P']
		])->orderByDesc('datetime')->get();

        return json_encode($meetinglog);
    }

    public function scheduleLog()
    {
       
        $meetinglog = MeetingLog::where([
			['id_users', '=' , auth()->user()->id],
            ['status', '=' , 'S']
		])->orderByDesc('datetime')->get();

        return json_encode($meetinglog);
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
        $add->status = 'P';
        $add->save();
       
        $meetinglog = MeetingLog::where([
			['id_users', '=' , auth()->user()->id]
		])->orderByDesc('datetime')->get();

        return json_encode($meetinglog);
    }

    public function storeMeetingSchedule(Request $request){
        $request->validate([
            'meeting_name' 	    => 'required',
            'meeting_date' 		=> 'required',
            'meeting_start' 	=> 'required',
            'meeting_end' 		=> 'required'
        ]);

        $add1 = New MeetingLog;
        $add1->id_users = auth()->user()->id;
        $add1->room_name = $request->meeting_name;
        $add1->display_name = auth()->user()->name;
        $add1->datetime = date('Y-m-d H:i:s' , strtotime(''.$request->meeting_date.' '.$request->meeting_start.''));
        $add1->end_datetime = date('Y-m-d H:i:s' , strtotime(''.$request->meeting_date.' '.$request->meeting_end.''));
        $add1->status = 'S';
        $add1->save();

        //NOTIFICATION FCM SCHEDULE
        $noti = new Notification;
        $noti->to_user =  auth()->user()->id;
        $noti->tiny_img_url = '';
        $noti->title = 'Meeting ['.$request->meeting_name.']';
        $noti->desc =  ''.$request->meeting_name.' - You have meeting scheduled on '.date('j F Y' , strtotime($request->meeting_date)).' at '.date('j F Y' , strtotime($request->meeting_start)).' and will end on '.date('j F Y' , strtotime($request->meeting_end)).'';
        $noti->type = 'I';
        $noti->click_url = '/meet?roomName='.$request->meeting_name.'';
        $noti->send_status = 'P';
        $noti->status = '';
        $noti->module = 'meet';
        $noti->id_module = $add1->id;
        $noti->created_by = auth()->user()->id;
        $json_noti = json_encode($noti);

        $add2 = New Scheduler;
        $add2->trigger_datetime = date('Y-m-d H:i:s' , strtotime(''.$request->meeting_date.' '.$request->meeting_start.''));
        $add2->url_to_call = 'triggeredNotification';
        $add2->params = $json_noti;
        $add2->is_triggered = 0;
        $add2->created_by = auth()->user()->id;
        $add2->save();

        $data = ['status' => '200', 'message' => 'Successfully scheduled meeting.'];
        return json_encode($data);
    }
}
