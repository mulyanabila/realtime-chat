<x-app-layout>

<div class="h-screen flex flex-col bg-[#efeae2]">

{{-- HEADER --}}
<div class="bg-[#075E54] text-white px-5 py-3 flex items-center">

<a href="/dashboard"
class="mr-4 text-2xl">
←
</a>

<div
class="w-10 h-10 rounded-full bg-white text-[#075E54]
flex items-center justify-center font-bold"
>

{{ strtoupper(substr($user->name,0,1)) }}

</div>

<div class="ml-3">

<div class="font-semibold">

{{ $user->name }}

</div>

<div
class="text-sm text-green-200"
>

Online

</div>

</div>

</div>


{{-- CHAT AREA --}}
<div
class="flex-1 overflow-y-auto p-4 space-y-3"
>

@foreach($messages as $msg)

<div
class="flex
{{ $msg->user_id == auth()->id()
? 'justify-end'
: 'justify-start'
}}"
>

<div
class="
max-w-[70%]
rounded-xl
px-4
py-2
shadow

{{ $msg->user_id==auth()->id()

? 'bg-[#d9fdd3]'

: 'bg-white'

}}
"
>

<div>

{{ $msg->message }}

</div>

<div
class="
text-xs
text-gray-500
mt-1
flex
justify-end
gap-1
"
>

{{ $msg->created_at->timezone('Asia/Jakarta')->format('H:i') }}

@if($msg->user_id==auth()->id())

<span>

✓✓

</span>

@endif

</div>

</div>

</div>

@endforeach

</div>


{{-- INPUT --}}
<form
method="POST"
action="/chat/send"
class="
bg-[#f0f2f5]
p-3
flex
gap-2
"
>

@csrf

<input
type="hidden"
name="receiver_id"
value="{{ $user->id }}"
>

<input
type="text"
name="message"
placeholder="Ketik pesan"

class="
flex-1
rounded-full
border
px-5
py-3
outline-none
"
/>

<button
class="
bg-[#25D366]
text-white
rounded-full
px-6
"
>

➤

</button>

</form>

</div>

</x-app-layout>