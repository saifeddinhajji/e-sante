<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    public function sendmailcontactform(Request $request){
        
            $to_name ='saif eddine hajji';
            $to_email = 'saifeddinhajji@gmail.com';
            $data = array('name'=> $request->input('name'),'email'=>$request->input('email'),'msg'=>$request->input('message'),'sujet'=>$request->input('subject'));
            Mail::send('emails.contactmail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('contact form');
            $message->from('saifeddinhajji@gmail.com','Test Mail');
        });
        return back()->withInput();
    }
}
