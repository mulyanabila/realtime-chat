<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat', [
            'messages' => Message::with('user')->get()
        ]);
    }

    public function send(Request $request)
    {
        $msg = Message::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($msg));

        return response()->json($msg);
    }
}