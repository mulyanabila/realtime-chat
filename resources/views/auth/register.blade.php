<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-purple-50 py-10">

    <div class="bg-white rounded-3xl border border-gray-200 shadow-lg p-10 w-full max-w-lg">

        <h1 class="text-4xl font-bold text-center text-purple-700">
            Chat App
        </h1>

        <p class="text-center text-gray-500 mt-2 mb-8">
            Buat akun baru untuk mulai chatting
        </p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nama --}}
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-purple-500"
                >

                <x-input-error
                    :messages="$errors->get('name')"
                    class="mt-2"
                />

            </div>


            {{-- Nomor HP --}}
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Nomor HP
                </label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone') }}"
                    required
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-purple-500"
                >

                <x-input-error
                    :messages="$errors->get('phone')"
                    class="mt-2"
                />

            </div>


            {{-- Email --}}
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-purple-500"
                >

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />

            </div>


            {{-- Password --}}
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-purple-500"
                >

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"
                />

            </div>


            {{-- Konfirmasi Password --}}
            <div class="mb-6">

                <label class="block font-semibold mb-2">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    required
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-purple-500"
                >

                <x-input-error
                    :messages="$errors->get('password_confirmation')"
                    class="mt-2"
                />

            </div>


            {{-- Tombol Daftar --}}
            <button
                type="submit"
                class="w-full bg-gradient-to-r from-purple-600 to-fuchsia-600 text-white py-3 rounded-xl font-bold hover:opacity-90 transition"
            >
                Daftar
            </button>


            {{-- Link Login --}}
            <p class="text-center mt-6 text-gray-600">

                Sudah punya akun?

                <a
                    href="{{ route('login') }}"
                    class="text-purple-700 font-semibold hover:underline"
                >
                    Login
                </a>

            </p>

        </form>

    </div>

</div>

</x-guest-layout>