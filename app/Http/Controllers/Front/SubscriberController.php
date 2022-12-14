<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use App\Helper\Helpers;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        Helpers::read_json();

        $validator = \Validator::make($request->all(),[
            'email' => 'required|email'
        ],[
            'email.required' => ERROR_EMAIL_REQUIRED,
            'email.email' => ERROR_EMAIL_VALID,
        ]);
        if(!$validator->passes())
        {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }
        else
        {
            $token = hash('sha256', time());
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->token = $token;
            $subscriber->status = 'Pending';
            $subscriber->save();

            // Send email
            $subject = 'Subscriber Email Verify';

            $verification_link = url('subscriber/verify/'.$token.'/'.$request->email);

            $message = 'Please click on the following link in order to verify as subscriber<br>';
            $message .= '<a href="'.$verification_link.'">';
            $message .= $verification_link;
            $message .= '</a>';

            \Mail::to($request->email)->send(new Websitemail($subject,$message));

            return response()->json(['code'=>1,'success_message'=>SUCCESS_SUBSCRIBER]);
        }
    }

    public function verify($token,$email)
    {
        Helpers::read_json();
        
        $subscriber_data = Subscriber::where('token',$token)->where('email',$email)->first();
        if($subscriber_data) 
        {
            $subscriber_data->token = '';
            $subscriber_data->status = 'Active';
            $subscriber_data->update();

            return redirect()->back()->with('success', SUCCESS_SUBSCRIBER_CONFIRM);
        } 
        else 
        {
            return redirect()->route('home');
        }
    }
}
