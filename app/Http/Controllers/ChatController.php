<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ChatController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::where('id','=',Auth()->id())->get();
        $users = User::all();
        return view('chat.index')->with(compact('users'));
    }

    //this is a conversation function to create
    public function conversation($user_id)
    {
      $users = User::where('id','=',Auth()->id())->get();
      $friendInfo = User::findOrFail($user_id);
      $myInfo = User::find(auth()->id());
      $this->data['users'] = $users;
      $this->data['friendInfo'] = $friendInfo;
      $this->data['myInfo'] = $myInfo;
      $this->data['user_id'] = $user_id;

      return view('chat.conversation',$this->data);
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
    public function show($user_id)
    {
        $users = User::where('id','=',Auth()->id())->get();
        $friendInfo = User::findOrFail($user_id);
        $myInfo = User::find(auth()->id());
        $this->data['users'] = $users;
        $this->data['friendInfo'] = $friendInfo;
        $this->data['myInfo'] = $myInfo;
        $this->data['user_id'] = $user_id;
        // $topBarTitle = 'Chat Show';
        // $topBarPrevUrl = 'chat';
        return view('chat.show')->with($this->data);
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
