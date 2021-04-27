<?php

namespace App\Http\Controllers\ClientMessage;

use App\ClientMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $data['title'] = 'Message List';
       $msg = ClientMessage::where('user_id',Auth::user()->id)->get();
        //dd($data);
        return view('client.message.index',compact('msg'));
    }

    public function adminmessage()
    {
       // $data['title'] = 'Message List';
       $msg = ClientMessage::join('users','users.id','=','client_messages.user_id')
       ->select('client_messages.id as cid','client_messages.*','users.*')
       ->get();

        //dd($data);
        return view('admin.client.message',compact('msg'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Client Message';
        return view('client.message.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_sub' => 'required',
            'client_message' => 'required'
        ]);

        $message = new ClientMessage();

        $message->subject = $request->client_sub;
        $message->message = $request->client_message;
        $message->user_id = Auth::user()->id;

        $message->save();
        return redirect()->route('client.message');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


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
        $msg = ClientMessage::find($id);
        $msg->delete();

        return redirect()->route('client.message');

    }

    public function delete($id)
    {
        $msg = ClientMessage::find($id);
        $msg->delete();

        return redirect()->route('admin.message');

    }
}
