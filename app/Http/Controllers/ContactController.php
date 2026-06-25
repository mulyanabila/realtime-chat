<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

public function index()
{
return view(
'dashboard',
[
'contacts'=>
\App\Models\User::where(
'id',
'!=',
auth::id()
)->get()
]
);
}

public function add(
Request $request
){

$user=
User::where(
'phone',
$request->phone
)
->first();

if(
!$user
){

return back();

}

Contact::create([

'user_id'=>
Auth::id(),

'contact_id'=>
$user->id

]);

return back();

}

}