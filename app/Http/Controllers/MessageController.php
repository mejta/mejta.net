<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Message;
use App\Mail\SendMessage;

class MessageController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'max:255',
            'message' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'budget' => 'nullable',
            'recaptcha' => 'required|recaptcha',
        ]);

        $message = new Message;
        $message->name = $request->name;
        $message->message = $request->message;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->budget = $request->budget;
        $message->save();

        Mail::to('daniel@mejta.net')
            ->send(new SendMessage($message));

        return response()->json($message, 201);
    }
}
