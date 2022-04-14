<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class MessageController extends Controller
{
    public function SendMessageView(){
        $messages= Message::where('sender_name','admin')->get();
        return view('super_admin.messages.send', compact('messages'));
    }

    public function InboxMessageView(){
        $messages= Message::where('sender_name', '!=', 'admin')->get();
        return view('super_admin.messages.inbox', compact('messages'));
    }

    public function ShowSingleSentMessage($id){
        $message= Message::find($id);
        return response()->json(compact('message'));
    }

    public function SendMessageStore(Request $request){
        $validator = Validator::make($request->all(), [
            //'sendto'=> 'required|max:191',
            'subject'=> 'required|max:191',
            'message'=> 'required',
        ],[
            //'sendto.required' => 'Send To name is required',
            'subject.required' => 'Subject name is required',
            'message.required' => 'Message details is required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else
        {
            $message = new Message;

            if(Auth::guard('admin')->check()){
                $sender_name = "admin";
            }elseif(Auth::guard('super_admin')->check()){
                $sender_name = "super-admin";
            }elseif(Auth::guard('employee')->check()){
                $sender_name = "employee";
            }else{
                $sender_name = "doctor";
            }
             //dd( $sender_name);
            $message->send_to = $request->input('sendto');
            $message->subject = $request->input('subject');
            $message->message = strip_tags($request->input('message'));
            $message->sender_name = $sender_name;
            $message->date = Carbon::now()->format('d-m-Y h:i:s a');
            $message->save();
            return response()->json([
                'status'=>200,
                'message'=>'Message Send Successfully',
            ]);
        }
    }


    public function SendMessageDelete($id){
        $message = Message::findOrFail($id);
      Message::findOrFail($id)->delete();
      return redirect()->back();
    }

}

// $sender_name=Auth::user();
// $sender_name=Auth::guard('user')->check();
