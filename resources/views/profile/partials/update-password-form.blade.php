<section>

    <header class="mb-6">

        <p class="text-gray-500 mt-1">
            Gunakan password yang kuat untuk menjaga keamanan akun Anda.
        </p>

    </header>

    <form
        method="POST"
        action="{{ route('password.update') }}"
        class="space-y-6"
    >

        @csrf
        @method('PUT')


        {{-- PASSWORD LAMA --}}
        <div>

            <x-input-label
                for="update_password_current_password"
                :value="__('Password Lama')"
                class="text-purple-700 font-semibold"
            />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-2 block w-full rounded-xl border-purple-300 focus:border-purple-500 focus:ring-purple-500"
                autocomplete="current-password"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('current_password')"
            />

        </div>



        {{-- PASSWORD BARU --}}
        <div>

            <x-input-label
                for="update_password_password"
                :value="__('Password Baru')"
                class="text-purple-700 font-semibold"
            />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-2 block w-full rounded-xl border-purple-300 focus:border-purple-500 focus:ring-purple-500"
                autocomplete="new-password"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('password')"
            />

        </div>



        {{-- KONFIRMASI PASSWORD --}}
        <div>

            <x-input-label
                for="update_password_password_confirmation"
                :value="__('Konfirmasi Password Baru')"
                class="text-purple-700 font-semibold"
            />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-2 block w-full rounded-xl border-purple-300 focus:border-purple-500 focus:ring-purple-500"
                autocomplete="new-password"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('password_confirmation')"
            />

        </div>



        {{-- TOMBOL --}}
        <div>

            <button
                type="submit"
                class="
                w-full
                py-3
                rounded-xl
                text-white
                font-semibold
                bg-gradient-to-r
                from-fuchsia-600
                to-violet-700
                hover:opacity-90
                transition
                shadow-lg
                "
            >
                Ubah Password
            </button>

        </div>



        @if(session('status') === 'password-updated')

            <p class="text-center text-purple-700 font-semibold">

                ✔ Password berhasil diperbarui.

            </p>

        @endif

    </form>

</section>