<x-app-layout>

<div class="max-w-2xl mx-auto bg-white min-h-screen">

    {{-- Header --}}
    <div class="flex items-center gap-4 p-5 border-b">

        <a href="/dashboard">
            ←
        </a>

        <h1 class="text-3xl font-semibold">
            Profil
        </h1>

    </div>

    {{-- FOTO PROFIL --}}
{{-- FOTO PROFIL --}}
<div class="flex flex-col items-center py-8">

    @if($user->photo)

        <img
            src="{{ asset('storage/'.$user->photo) }}"
            alt="Foto Profil"
            style="
                width:130px;
                height:130px;
                border-radius:50%;
                object-fit:cover;
            "
        >

    @else

        <div
            class="w-[130px] h-[130px] rounded-full bg-green-500 flex items-center justify-center text-white text-5xl font-bold"
        >
            {{ strtoupper(substr($user->name,0,1)) }}
        </div>

    @endif

    <a
        href="{{ route('profile.edit') }}"
        class="mt-4 text-green-600 font-semibold hover:underline"
    >
        Edit
    </a>

</div>


    {{-- Informasi --}}

    <div class="px-8 mt-2 space-y-8">

        {{-- Nama --}}
        <div class="flex gap-5">

            <div class="text-3xl">
                👤
            </div>

            <div>

                <div class="text-2xl">
                    Nama
                </div>

                <div class="text-gray-500">
                    {{ $user->name }}
                </div>

            </div>

        </div>



        {{-- Tentang --}}
        <div class="flex gap-5">

            <div class="text-3xl">
                ℹ️
            </div>

            <div>

                <div class="text-2xl">
                    Tentang
                </div>

                <div class="text-gray-500">

                    {{ $user->status ?? '-' }}

                </div>

            </div>

        </div>



        {{-- Nomor HP --}}
        <div class="flex gap-5">

            <div class="text-3xl">
                📞
            </div>

            <div>

                <div class="text-2xl">
                    Telepon
                </div>

                <div class="text-gray-500">
                    {{ $user->phone }}
                </div>

            </div>

        </div>



        {{-- Email --}}
        <div class="flex gap-5">

            <div class="text-3xl">
                ✉️
            </div>

            <div>

                <div class="text-2xl">
                    Email
                </div>

                <div class="text-gray-500">
                    {{ $user->email }}
                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>