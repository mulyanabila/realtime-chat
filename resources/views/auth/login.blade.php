<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-purple-50 py-10">

    <div class="bg-white rounded-3xl border border-gray-200 shadow-lg p-10 w-full max-w-lg">

        <h1 class="text-4xl font-bold text-center text-purple-700">
            Chat App
        </h1>

        <p class="text-center text-gray-500 mt-2 mb-8">
            Selamat Datang Kembali
        </p>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-purple-500"
                >

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />

            </div>


            {{-- Password --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">
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


            {{-- Remember --}}
            <div class="flex items-center justify-between mb-6">

                <label class="flex items-center">

                    <input
                        type="checkbox"
                        name="remember"
                        class="mr-2"
                    >

                    Ingat Saya

                </label>

                @if(Route::has('password.request'))

                    <a
                        href="{{ route('password.request') }}"
                        class="text-purple-600 hover:underline text-sm"
                    >
                        Lupa Password?
                    </a>

                @endif

            </div>


            <button
                type="submit"
                class="w-full bg-gradient-to-r from-purple-600 to-fuchsia-600 text-white py-3 rounded-xl font-bold hover:opacity-90"
            >
                Login
            </button>

            <p class="text-center mt-6 text-gray-600">

                Belum punya akun?

                <a
                    href="{{ route('register') }}"
                    class="text-purple-700 font-semibold hover:underline"
                >
                    Daftar
                </a>

            </p>

        </form>

    </div>

</div>

</x-guest-layout>