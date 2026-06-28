<section>

    <header class="mb-6">

        <p class="text-gray-500 mt-1">
            Perbarui informasi akun Anda.
        </p>

    </header>

    <form
        id="send-verification"
        method="POST"
        action="{{ route('verification.send') }}"
    >
        @csrf
    </form>


    <form
        method="POST"
        action="{{ route('profile.update') }}"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf
        @method('PATCH')


        {{-- FOTO PROFIL --}}
        <div>

            <x-input-label
                for="photo"
                :value="__('Foto Profil')"
                class="text-purple-700 font-semibold"
            />

            <div class="mt-3 mb-4">

                @if($user->photo)

                    <img
                        src="{{ asset('storage/'.$user->photo) }}"
                        class="w-28 h-28 rounded-full object-cover border-2 border-purple-300 shadow"
                    >

                @else

                    <div
                        class="w-28 h-28 rounded-full bg-gradient-to-r from-fuchsia-600 to-violet-700 flex items-center justify-center text-white text-4xl font-bold shadow"
                    >
                        {{ strtoupper(substr($user->name,0,1)) }}
                    </div>

                @endif

            </div>

            <input
                type="file"
                name="photo"
                id="photo"
                class="block w-full rounded-xl border border-purple-300 p-3 focus:border-purple-500 focus:ring-purple-500"
            >

            <x-input-error
                class="mt-2"
                :messages="$errors->get('photo')"
            />

        </div>



        {{-- NAMA --}}
        <div>

            <x-input-label
                for="name"
                :value="__('Nama')"
                class="text-purple-700 font-semibold"
            />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-2 block w-full rounded-xl border-purple-300 focus:border-purple-500 focus:ring-purple-500"
                :value="old('name',$user->name)"
                required
                autofocus
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')"
            />

        </div>



        {{-- TENTANG --}}
        <div>

            <x-input-label
                for="status"
                :value="__('Tentang')"
                class="text-purple-700 font-semibold"
            />

            <x-text-input
                id="status"
                name="status"
                type="text"
                class="mt-2 block w-full rounded-xl border-purple-300 focus:border-purple-500 focus:ring-purple-500"
                :value="old('status',$user->status)"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('status')"
            />

        </div>



        {{-- TELEPON --}}
        <div>

            <x-input-label
                for="phone"
                :value="__('Telepon')"
                class="text-purple-700 font-semibold"
            />

            <x-text-input
                id="phone"
                name="phone"
                type="text"
                class="mt-2 block w-full rounded-xl border-purple-300 focus:border-purple-500 focus:ring-purple-500"
                :value="old('phone',$user->phone)"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('phone')"
            />

        </div>



        {{-- EMAIL --}}
        <div>

            <x-input-label
                for="email"
                :value="__('Email')"
                class="text-purple-700 font-semibold"
            />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-2 block w-full rounded-xl border-purple-300 focus:border-purple-500 focus:ring-purple-500"
                :value="old('email',$user->email)"
                required
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')"
            />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div class="mt-3">

                    <p class="text-sm text-gray-600">

                        Email belum diverifikasi.

                        <button
                            form="send-verification"
                            class="text-purple-600 hover:text-purple-800 underline font-medium"
                        >
                            Kirim ulang verifikasi
                        </button>

                    </p>

                </div>

            @endif

        </div>



        {{-- TOMBOL SIMPAN --}}
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

                Simpan Profil

            </button>

        </div>



        @if(session('status')=='profile-updated')

            <p class="text-center text-purple-700 font-semibold">

                ✔ Profil berhasil diperbarui.

            </p>

        @endif

    </form>

</section>