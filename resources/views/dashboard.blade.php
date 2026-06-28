<x-app-layout>

<div class="min-h-screen bg-violet-50">

<div class="max-w-5xl mx-auto py-6">


{{-- HEADER --}}
<div
class="
bg-white
border-b
border-fuchsia-200
shadow-sm
px-8
py-5
flex
justify-between
items-center
rounded-t-3xl
"
>

<h1
class="
text-3xl
font-bold
text-fuchsia-700
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

<a
href="/dashboard"
class="hover:text-fuchsia-600 transition"
>
Chat
</a>


<a
href="/contacts"
class="hover:text-fuchsia-600 transition"
>
Kontak
</a>


<a
href="/profile"
class="hover:text-fuchsia-600 transition"
>
Profil
</a>


<form
method="POST"
action="{{ route('logout') }}"
>

@csrf

<button
class="hover:text-fuchsia-600 transition"
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
bg-white
border
border-fuchsia-200
text-black
px-5
py-3
outline-none
focus:ring-2
focus:ring-fuchsia-500
focus:border-fuchsia-500
"
/>

</div>



{{-- LIST CHAT --}}
<div
class="
bg-white
rounded-b-3xl
overflow-hidden
shadow-md
border
border-fuchsia-100
"
>

@foreach($contacts as $contact)

@php

$lastMessage =
$contact->lastMessage;

$unread =
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
border-fuchsia-100
hover:bg-fuchsia-50
hover:scale-[1.01]
transition
duration-300
block
"
>


{{-- FOTO --}}
<div>

@if($contact->photo)

<img
src="{{ asset('storage/'.$contact->photo) }}"
class="
w-14
h-14
rounded-full
object-cover
border-2
border-fuchsia-300
">

@else

<div
class="
w-14
h-14
rounded-full
bg-gradient-to-r
from-fuchsia-500
to-violet-600
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

@endif

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


{{-- KIRI --}}
<div>

<div
class="
font-semibold
text-gray-800
text-lg
"
>

{{ $contact->name }}

</div>


<div
class="
text-gray-600
text-sm
truncate
max-w-[500px]
mt-1
"
>

@if($lastMessage)

{{ $lastMessage->message }}

@else

Belum ada pesan

@endif

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
text-fuchsia-500
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

@else

&nbsp;

@endif

</div>



@if($unread>0)

<div
class="
w-6
h-6
rounded-full
bg-fuchsia-600
text-white
text-xs
flex
items-center
justify-center
shadow
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