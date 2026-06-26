<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

// DASHBOARD (list chat)
public function index()
{

$contacts =

User::where(
'id',
'!=',
Auth::id()
)

->with([

'lastMessage'=>function($q){

$q->latest();

}

])

->get();

return view(

'dashboard',

compact('contacts')

);

}


// HALAMAN KONTAK
public function contacts()
{
    $contacts =
    Contact::where(
        'user_id',
        Auth::id()
    )
    ->with('contact')
    ->get();

    return view(
        'contacts',
        compact('contacts')
    );
}


// TAMBAH KONTAK
public function add(
Request $request
){

    $request->validate([

        'name' => 'required',
        'phone'=>'required'

    ]);


    $user =
    User::where(
        'phone',
        $request->phone
    )->first();


    if(!$user){

        return back()
        ->with(
            'error',
            'Nomor tidak ditemukan'
        );

    }


    Contact::firstOrCreate(

[
    'user_id' => Auth::id(),
    'contact_id' => $user->id
],

[
    'name' => $request->name
]

);

    return back()
    ->with(
        'success',
        'Kontak berhasil ditambahkan'
    );

}

}