<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
//TODO decide for phone
//            'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'=>'required',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        Mail::send('contact.mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
//            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('zodynoadministratorius@pastas.lt', 'Admin')->subject($request->get('subject'));
        });

        return back()->with('success', 'Pranešimas išsiųstas. Netrukus su jumis susisieksime!');
    }
}
