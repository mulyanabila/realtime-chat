<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

public function index($id)
{

$user=
User::findOrFail($id);

$messages=
Message::where(function($q) use ($id){

$q
->where(
'user_id',
Auth::id()
)

->where(
'receiver_id',
$id
);

})

->orWhere(function($q) use ($id){

$q
->where(
'user_id',
$id
)

->where(
'receiver_id',
Auth::id()
);

})

->orderBy(
'created_at'
)

->get();

Message::where(
'receiver_id',
Auth::id()
)

->where(
'user_id',
$id
)

->update([

'is_read'=>true

]);

return view(
'chat',
compact(
'user',
'messages'
)
);

}


public function send(
Request $request
){

Message::create([

'user_id'=>
Auth::id(),

'receiver_id'=>
$request->receiver_id,

'message'=>
$request->message,

'is_read'=>
false

]);

return back();

}

}