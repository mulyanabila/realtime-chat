<x-app-layout>

<div class="h-screen flex flex-col bg-violet-50">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-fuchsia-600 to-violet-700 text-white px-5 py-4 flex items-center shadow">

        <a
            href="/dashboard"
            class="mr-4 text-2xl hover:opacity-80"
        >
            ←
        </a>

        <div
            class="w-11 h-11 rounded-full bg-white flex items-center justify-center font-bold overflow-hidden text-fuchsia-700"
        >

            @if($user->photo)

                <img
                    src="{{ asset('storage/'.$user->photo) }}"
                    class="w-11 h-11 rounded-full object-cover"
                >

            @else

                {{ strtoupper(substr($user->name,0,1)) }}

            @endif

        </div>

        <div class="ml-3">

            <div class="font-semibold text-lg">
                {{ $user->name }}
            </div>

            <div class="text-sm text-fuchsia-100">
                Online
            </div>

        </div>

    </div>



    {{-- CHAT AREA --}}
    <div
        class="flex-1 overflow-y-auto p-5 space-y-4"
    >

        @foreach($messages as $msg)

            <div
                class="flex {{ $msg->user_id == auth()->id() ? 'justify-end' : 'justify-start' }}"
            >

                <div
                    class="
                    max-w-[70%]
                    rounded-2xl
                    px-4
                    py-3
                    shadow

                    {{ $msg->user_id == auth()->id()
                        ? 'bg-gradient-to-r from-fuchsia-500 to-violet-600 text-white'
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
                        mt-2
                        flex
                        justify-end
                        gap-1

                        {{ $msg->user_id == auth()->id()
                            ? 'text-fuchsia-100'
                            : 'text-gray-500'
                        }}
                        "
                    >

                        {{ $msg->created_at->timezone('Asia/Jakarta')->format('H:i') }}

                        @if($msg->user_id == auth()->id())

                            <span>
                                ✓✓
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        @endforeach

    </div>



    {{-- INPUT CHAT --}}
    <form
        method="POST"
        action="/chat/send"
        class="
        bg-white
        border-t
        border-fuchsia-200
        p-4
        flex
        gap-3
        shadow
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
            placeholder="Ketik pesan..."
            required

            class="
            flex-1
            rounded-full
            border
            border-fuchsia-300
            px-5
            py-3
            outline-none
            focus:ring-2
            focus:ring-fuchsia-500
            "
        >

        <button
            type="submit"

            class="
            bg-gradient-to-r
            from-fuchsia-600
            to-violet-700
            text-white
            rounded-full
            px-8
            hover:opacity-90
            transition
            "
        >

            Kirim

        </button>

    </form>

</div>

</x-app-layout>