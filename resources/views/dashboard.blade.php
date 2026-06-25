<x-app-layout>

<div class="min-h-screen bg-white">

<div class="max-w-5xl mx-auto py-6">

{{-- HEADER --}}
<div
class="
bg-white
border-b
px-8
py-5
flex
justify-between
items-center
"
>

<h1
class="
text-3xl
font-bold
text-green-600
"
>
Chat App
</h1>


<div
class="
flex
gap-10
text-gray-700
font-medium
items-center
"
>

<button class="hover:text-green-600">
Chat
</button>

<button class="hover:text-green-600">
Kontak
</button>

<a
href="/profile"
class="hover:text-green-600"
>
Profil
</a>

<form
method="POST"
action="{{ route('logout') }}"
>

@csrf

<button
class="hover:text-red-500"
>
Logout
</button>

</form>

</div>

</div>



{{-- SEARCH --}}
<div
class="
bg-white
px-5
py-4
"
>

<input
type="text"
placeholder="Cari chat..."

class="
w-full
rounded-full
bg-gray-100
text-black
px-5
py-3
outline-none
focus:ring-2
focus:ring-green-500
"
/>

</div>



{{-- LIST CHAT --}}
<div
class="
bg-white
rounded-xl
overflow-hidden
shadow
"
>

@foreach($contacts as $contact)

@php

$lastMessage=

\App\Models\Message::

where(function($q)
use($contact){

$q
->where(
'user_id',
auth()->id()
)

->where(
'receiver_id',
$contact->id
);

})

->orWhere(function($q)
use($contact){

$q
->where(
'user_id',
$contact->id
)

->where(
'receiver_id',
auth()->id()
);

})

->latest()

->first();


$unread=

\App\Models\Message::

where(
'user_id',
$contact->id
)

->where(
'receiver_id',
auth()->id()
)

->where(
'is_read',
false
)

->count();

@endphp



<a
href="/chat/{{ $contact->id }}"

class="
flex
items-center
gap-4
p-5
border-b
hover:bg-gray-100
transition
block
"
>


{{-- FOTO --}}
<div
class="
w-14
h-14
rounded-full
bg-green-500
flex
items-center
justify-center
text-white
font-bold
text-xl
"
>

{{ strtoupper(substr($contact->name,0,1)) }}

</div>



{{-- INFO --}}
<div class="flex-1">

<div
class="
flex
justify-between
items-start
"
>


<div>

<div
class="
font-semibold
text-black
text-lg
"
>

{{ $contact->name }}

</div>

<div
class="
text-gray-500
text-sm
mt-1
"
>

{{ $contact->phone }}

</div>

</div>



{{-- KANAN --}}
<div
class="
flex
flex-col
items-end
gap-2
"
>

<div
class="
text-sm
text-gray-400
"
>

@if($lastMessage)

@if(
$lastMessage
->created_at
->isToday()
)

{{

$lastMessage
->created_at
->format('H.i')

}}

@elseif(

$lastMessage
->created_at
->isYesterday()

)

Kemarin

@else

{{

$lastMessage
->created_at
->format('d/m/y')

}}

@endif

@endif

</div>



@if($unread>0)

<div
class="
w-6
h-6
rounded-full
bg-green-500
text-white
text-xs
flex
items-center
justify-center
"
>

{{ $unread }}

</div>

@endif


</div>

</div>

</div>

</a>

@endforeach

</div>

</div>

</div>

</x-app-layout>