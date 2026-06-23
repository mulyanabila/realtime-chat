<!DOCTYPE html>
<html>

<head>
<title>Realtime Chat</title>

<meta name="csrf-token"
content="{{ csrf_token() }}">

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

<div class="max-w-2xl mx-auto p-5">

<h1 class="text-3xl mb-4">
Realtime Chat
</h1>

<div
id="chat-box"
class="bg-white h-96 overflow-auto p-3 rounded">

@foreach($messages as $msg)

<div class="mb-2">

<b>
{{ $msg->user->name }}
</b>

:

{{ $msg->message }}

</div>

@endforeach

</div>

<div class="mt-3">

<input
id="message"
class="border p-2 w-full"
placeholder="ketik pesan">

<button
onclick="send()"
class="bg-blue-500 text-white p-2 mt-2">

Kirim

</button>

</div>

</div>

<script>

async function send(){

let msg=
document
.getElementById(
'message'
).value;

await fetch(
'/chat/send',
{
method:'POST',

headers:{

'Content-Type':
'application/json',

'X-CSRF-TOKEN':
document
.querySelector(
'meta[name=csrf-token]'
)
.content

},

body:
JSON.stringify({
message:msg
})

});

document.getElementById('message').value = '';

}


document.addEventListener('DOMContentLoaded', () => {

    if(window.Echo){

        window.Echo.channel('chat')
        .listen('.message.sent', (e) => {
            console.log('EVENT MASUK', e);

            let box =
            document.getElementById('chat-box');

            box.innerHTML += `
                <div class="mb-2">
                    <b>${e.message.user.name}</b> :
                    ${e.message.message}
                </div>
            `;

        });

    }

});

</script>

@vite(['resources/js/app.js'])

</body>

</html>